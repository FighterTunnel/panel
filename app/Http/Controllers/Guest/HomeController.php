<?php

namespace App\Http\Controllers\Guest;

use App\Models\Category;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $announcements = Announcement::all();
        $categories = Category::all();
        return view('pages.guest.home.index', compact('announcements', 'categories'));
    }
}
