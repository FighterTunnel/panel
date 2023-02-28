<?php

namespace App\Http\Controllers\Admin;

use App\Models\Server;
use GuzzleHttp\Client;
use App\Models\Country;
use App\Models\Category;
use App\Traits\UniqueSlug;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServerController extends Controller
{
    use UniqueSlug;
    private $client;
    private $header;
    private $url;

    public function __construct()
    {
        $this->header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => env('API_TOKEN')
        ];
        $this->client = new Client([
            'headers' => $this->header
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $servers = Server::all();
        return view('pages.admin.servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('pages.admin.servers.create', compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'category_id' => 'required',
                'country_id' => 'required',
                'name' => 'required',
                'ip' => 'required|ipv4',
                'host' => 'required',
                'type' => 'required',
                'limit' => 'required|integer|min:0',
                'ports_repeater.*.ports_name' => 'required',
                'ports_repeater.*.ports_number' => 'required',
                'config_file' => 'nullable|file|mimes:zip'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }
        $ports = [];
        foreach ($request->ports_repeater as $key => $value) {
            $ports[$value['ports_name']] = $value['ports_number'];
        }
        $this->url = 'http://' . $request->host . '/vps/detailport';
        try {
            $response = $this->client->get($this->url);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        if ($response->getStatusCode() != 200) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server tidak dapat dihubungi'
            ]);
        }

        if ($request->has('config_file')) {
            $config_file = $request->file('config_file');
            $name = $request->name . '-' . Str::random(4) . '.' . $config_file->getClientOriginalExtension();
            $config_file->move(public_path('config'), $name);
        }

        $slug = Str::slug($request->name);
        $server = new Server();
        $server->category_id = $request->category_id;
        $server->country_id = $request->country_id;
        $server->slug = $server->uniqueSlug($slug);
        $server->name = $request->name;
        $server->ip = $request->ip;
        $server->host = $request->host;
        $server->type = $request->type;
        $server->limit = $request->limit;
        $server->ports = json_encode($ports);
        $server->config_file = $name ?? null;
        $server->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Server berhasil ditambahkan',
            'redirect' => route('admin.servers.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('pages.admin.servers.edit', compact('server', 'categories', 'countries'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'category_id' => 'required',
                'country_id' => 'required',
                'name' => 'required',
                'ip' => 'required|ipv4',
                'host' => 'required',
                'type' => 'required',
                'limit' => 'required|integer|min:0',
                'ports_repeater.*.ports_name' => 'required',
                'ports_repeater.*.ports_number' => 'required',
                'config_file' => 'nullable|file|mimes:zip'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }
        $ports = [];
        foreach ($request->ports_repeater as $key => $value) {
            $ports[$value['ports_name']] = $value['ports_number'];
        }
        $this->url = 'http://' . $request->host . '/vps/detailport';
        try {
            $response = $this->client->get($this->url);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        if ($response->getStatusCode() != 200) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server tidak dapat dihubungi'
            ]);
        }

        if ($request->has('config_file')) {
            $config_file = $request->file('config_file');
            $name = $request->name . '-' . Str::random(4) . '.' . $config_file->getClientOriginalExtension();
            $config_file->move(public_path('config'), $name);
            $server->config_file = $name;
        }

        $server->category_id = $request->category_id;
        $server->country_id = $request->country_id;
        $server->name = $request->name;
        $server->ip = $request->ip;
        $server->host = $request->host;
        $server->type = $request->type;
        $server->limit = $request->limit;
        $server->ports = json_encode($ports);
        $server->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Server berhasil diubah',
            'redirect' => route('admin.servers.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        if ($server->config_file) {
            $path = public_path('config/' . $server->config_file);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $server->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Server berhasil dihapus'
        ]);
    }

    public function reset(Server $server)
    {
        $server->current = 0;
        $server->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Server berhasil direset'
        ]);
    }
}
