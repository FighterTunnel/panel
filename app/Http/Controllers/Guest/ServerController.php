<?php

namespace App\Http\Controllers\Guest;

use App\Models\Server;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Services\Account\AccountService;
use Artesaos\SEOTools\Facades\OpenGraph;

class ServerController extends Controller
{
    protected $accountService;
    public function __construct()
    {
        SEOMeta::setTitleDefault(getSettings('site_name'));
        parent::__construct();
        $this->accountService = new AccountService();
    }

    private function setMeta(string $title)
    {
        SEOMeta::setTitle($title);
        OpenGraph::setTitle(SEOMeta::getTitle());
        JsonLd::setTitle(SEOMeta::getTitle());
        SEOMeta::setDescription(getSeoSettings('description'));
        SEOMeta::setKeywords(getSeoSettings('keywords'));
        OpenGraph::setDescription(SEOMeta::getDescription());
        JsonLd::setSite(SEOMeta::getCanonical());
        JsonLd::setDescription(SEOMeta::getDescription());
    }

    public function index($category)
    {
        $category = Category::where('slug', $category)->first();
        if (!$category) {
            return redirect()->route('home');
        }
        $this->setMeta($category->name . ' : Select Location');
        // get country list from database with category
        $countries = Country::whereHas('servers', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->get();
        return view('pages.guest.server.index', compact('countries', 'category'));
    }

    public function list($category, $country)
    {
        $category = Category::where('slug', $category)->first();
        $country = Country::where('code', $country)->first();
        if (!$category || !$country) {
            return redirect()->route('home');
        }
        $this->setMeta($category->name . ' : ' . $country->name . ' : Select Type');
        // get server list from database with category and country
        $servers = Server::where('category_id', $category->id)->where('country_id', $country->id)->orderBy('name', 'asc')->get();
        return view('pages.guest.server.list', compact('servers', 'category', 'country'));
    }

    public function create($category, $country, $slug)
    {
        $category = Category::where('slug', $category)->first();
        $country = Country::where('code', $country)->first();
        $this->setMeta('Create Account : ' . $slug);
        $server = Server::where('slug', $slug)->first();
        return view('pages.guest.server.input', compact('server', 'category', 'country'));
    }

    public function store(Request $request, $slug)
    {
        // get server by slug
        $server = Server::where('slug', $slug)->first();
        $category = $server->category;

        // get last 2 words from slug
        $categorySlug = explode('-', $category->slug);
        if (count($categorySlug) < 2) {
            $categorySlug = $categorySlug[count($categorySlug) - 1];
        } else {
            $categorySlug = $categorySlug[count($categorySlug) - 2];
        }
        // check category and create account
        if ($categorySlug == 'ssh') {
            $response = $this->accountService->createSSHAccount($server, $request);
        } elseif ($categorySlug == 'trojan') {
            $response = $this->accountService->createTrojanAccount($server, $request);
        } elseif ($categorySlug == 'vmess') {
            $response = $this->accountService->createVmessAccount($server, $request);
        } elseif ($categorySlug == 'vless') {
            $response = $this->accountService->createVlessAccount($server, $request);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.'
            );
        }

        return response()->json($response);
    }
}
