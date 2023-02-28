<?php

namespace App\Traits;

trait ToolsFormat
{
    public function formatIpLookup($details)
    {
        $data = '
            <ul class="list-unstyled">
            <li class="list-group-item d-flex justify-content-between align-items-center">IP <b>' . $details['ip'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Country <b>' . $details['country'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Region <b>' . $details['region'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">City <b>' . $details['city'] . '</b></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Timezone <b>' . $details['timezone'] . '</b></li>
            </ul>
            ';

        return $data;
    }

    public function formatHostToIp($details)
    {
        $data = '
            <p class="text-center">IP Address from domain<br/> <b>' . $details['host'] . '</b> is <b>' . $details['ip'] . '</b></p>
        ';

        return $data;
    }
}
