<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dns;
use App\Models\Site;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DnsController extends Controller
{
    private $cloudflare;
    private $headers;
    private $client;

    public function __construct()
    {
        $this->cloudflare = json_decode($this->cloudflare);
        if ($this->cloudflare != null){
            $this->headers = [
                'X-Auth-Email' => $this->cloudflare->email,
                'X-Auth-Key' => $this->cloudflare->key,
                'Content-Type' => 'application/json',
            ];
            $this->client = new Client([
                'headers' => $this->headers
            ]);
        } else {
            $this->headers = null;
            $this->client = null;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dns = Dns::all();
        return view('pages.admin.dns.index', compact('dns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function show(Dns $dns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function edit(Dns $dns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dns $dns)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function destroy(DNS $dns)
    {
        if($this->client != null){
            $response = $this->client->delete('https://api.cloudflare.com/client/v4/zones/' . $this->cloudflare->zone_id . '/dns_records/' . $dns->domain);
            if ($response->getStatusCode() == 200) {
                $dns->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'DNS record deleted successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to delete DNS record'
                ]);
            }
        } else {
            return redirect()->route('admin.dns.index')->with('error', 'DNS record could not be deleted');
        }
    }
}
