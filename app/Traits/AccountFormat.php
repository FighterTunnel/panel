<?php

namespace App\Traits;

use Carbon\Carbon;

trait AccountFormat
{
    public function formatSSHAccount($args, $server)
    {
        $data = '
            <ul class="list-unstyled">
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Host <b>' . $server->host . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Username <b>' . $args['username'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Password <b>' . $args['password'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Expired <b>' . Carbon::parse($args['expired'])->format('d M Y') . '</b></li>';

        $info = json_decode($server->ports);
        foreach ($info as $key => $port) {
            $data .= '<li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">' . $key . ' <b>' . $port . '</b></li>';
        }
        $data .= '
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Openvpn Config <b><a href="' . asset('config/' . $server->config_file) . '" target="_blank">Download</a></b></li>
            </ul>
            <b class="text-center">Payload CDN</b>
            <p>' . $args['payloadws']['payloadcdn'] . '</p>
            <b class="text-center">Payload With Path</b>
            <p>' . $args['payloadws']['payloadwithpath'] . '</p>
        ';
        return $data;
    }

    public function formatTrojanAccount($args, $server)
    {
        $data = '
            <ul class="list-unstyled">
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Host <b>' . $server->host . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Remarks <b>' . $args['username'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">UUID <b>' . $args['uuid'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Expired <b>' . Carbon::parse($args['expired'])->format('d M Y') . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Port TLS <b>' . $args['port']['tls'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Path <b>' . $args['path']['stn'] . '</b></li>
        ';
        // if $args['path']['multi'] exist
        if (isset($args['path']['multi'])) {
            $data .= '<li class="list-group-item d-flex justify-content-between align-items-center">Multipath <b>' . $args['path']['multi'] . '</b></li>';
        }
        $data .= '
            </ul>
            <b class="text-center">Link TLS</b>
            <p id="link_tls">' . $args['link']['tls'] . '</p>
            <button class="btn btn-teal btn-block" onclick="copyToClipboard(\'#link_tls\', \'Link TLS berhasil disalin\')">Copy Link TLS</button>
        ';
        return $data;
    }

    public function formatVmessAccount($args, $server)
    {
        $data = '
            <ul class="list-unstyled">
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Host <b>' . $server->host . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">UUID <b>' . $args['uuid'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Remarks <b>' . $args['username'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Expired <b>' . Carbon::parse($args['expired'])->format('d M Y') . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Port TLS <b>' . $args['port']['tls'] . '</b></li>
            ';
        // if $args['port']['none'] exist
        if (isset($args['port']['none'])) {
            $data .= '<li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Port None TLS <b>' . $args['port']['none'] . '</b></li>';
        }
        $data .= '
            <li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Path <b>' . $args['path']['stn'] . '</b></li>
        ';
        // if $args['path']['multi'] exist
        if (isset($args['path']['multi'])) {
            $data .= '<li class="list-group-item d-flex justify-content-between align-items-center text-break w-100">Multipath <b>' . $args['path']['multi'] . '</b></li>';
        }
        $data .= '
            </ul>
            <b class="text-center">Link TLS</b>
            <p id="link_tls">' . $args['link']['tls'] . '</p>
            <button class="btn btn-teal btn-block" onclick="copyToClipboard(\'#link_tls\', \'Link TLS berhasil disalin\')">Copy Link TLS</button>
            <br />
            <br />
        ';
        // if $args['link']['none'] exist
        if (isset($args['link']['none'])) {
            $data .= '
                <b class="text-center">Link None TLS</b>
                <p id="link_none">' . $args['link']['none'] . '</p>
                <button class="btn btn-teal btn-block" onclick="copyToClipboard(\'#link_none\', \'Link None TLS berhasil disalin\')">Copy Link None TLS</button>
            ';
        }
        return $data;
    }

    public function formatVlessAccount($args, $server)
    {
        $data = '
            <ul class="list-unstyled">
            <li class="list-group item d-flex justify-content-between align-items-center text-break w-100">Host <b>' . $server->host . '</b></li>
            <li class="list-group item d-flex justify-content-between align-items-center text-break w-100">UUID <b>' . $args['uuid'] . '</b></li>
            <li class="list-group item d-flex justify-content-between align-items-center text-break w-100">Remarks <b>' . $args['username'] . '</b></li>
            <li class="list-group item d-flex justify-content-between align-items-center text-break w-100">Expired <b>' . Carbon::parse($args['expired'])->format('d M Y') . '</b></li>
            <li class="list-group item d-flex justify-content-between align-items-center text-break w-100">Port TLS <b>' . $args['port']['tls'] . '</b></li>
            ';
        // if $args['port']['none'] exist
        if (isset($args['port']['none'])) {
            $data .= '<li class="list-group item d-flex justify-content-between align-items-center text-break w-100">Port None TLS <b>' . $args['port']['none'] . '</b></li>';
        }
        $data .= '
            <li class="list-group item d-flex justify-content-between align-items-center text-break w-100">Path <b>' . $args['path']['stn'] . '</b></li>
        ';
        // if $args['path']['multi'] exist
        if (isset($args['path']['multi'])) {
            $data .= '<li class="list-group item d-flex justify-content-between align-items-center text-break w-100">Multipath <b>' . $args['path']['multi'] . '</b></li>';
        }
        $data .= '
            </ul>
            <b class="text-center">Link TLS</b>
            <p id="link_tls">' . $args['link']['tls'] . '</p>
            <button class="btn btn-teal btn-block" onclick="copyToClipboard(\'#link_tls\', \'Link TLS berhasil disalin\')">Copy Link TLS</button>
            <br />
            <br />
        ';
        // if $args['link']['none'] exist
        if (isset($args['link']['none'])) {
            $data .= '
                <b class="text-center">Link None TLS</b>
                <p>' . $args['link']['none'] . '</p>
                <button class="btn btn-teal btn-block" onclick="copyToClipboard(\'#link_none\', \'Link None TLS berhasil disalin\')">Copy Link None TLS</button>
            ';
        }
        return $data;
    }
}
