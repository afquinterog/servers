<?php

namespace App\Helpers;


class Metrics
{

    public function parseServerInformation($request)
    {

        $disk = $this->parseServerDisk($request['disk']);
        $memory = $this->parseServerMemory($request['mem']);

        $totalMemory = $this->parseServerMemoryTotal($request['mem']);
        $cacheMemory = isset($request['memc']) ? : 0;
        $cacheMemory = $this->parseServerMemoryCache($cacheMemory, $totalMemory);

        $cpu = isset($request['cpu']) ? $request['cpu'] : 0;
        $server = isset($request['server']) ? $request['server'] : 0;
        $connections = isset($request['con']) ? $request['con'] : 0;
        $connectedIps = isset($request['ip']) ? $request['ip'] : 0;

        $metrics = [
            ['metric_type_id' => '1', 'value' => $cpu ], 
            ['metric_type_id' => '2', 'value' => $memory ],
            ['metric_type_id' => '3', 'value' => $disk ], 
            ['metric_type_id' => '4', 'value' => $cacheMemory ],
            ['metric_type_id' => '5', 'value' => $connections ], 
            ['metric_type_id' => '6', 'value' => $connectedIps ], 
        ];

        return $metrics;
    }

    /**
     * Parse disk information
     */
    public function parseServerDisk($disk)
    {
        $disk = explode("|", $disk);
        $disk[0] = preg_replace('/[^A-Za-z0-9\-]/', '', $disk[0]);
        return $disk[0];
    }

    /**
     * Parse server memory
     */
    public function parseServerMemory($mem)
    {
        $memData = explode("|", $mem);
        return $memData[1];
    }

    /**
     * Parse total server memory
     */
    public function parseServerMemoryTotal($mem)
    {
        $memData = explode("|", $mem);
        $memTmp = $memData[0];
        $memTmp = explode("/", $memTmp);
        return $memTmp[1];
    }

    /**
     * Parse server cache memory
     */
    public function parseServerMemoryCache($memCache, $memTotal)
    {
        //Get memory without cache and buffers
        if ($memCache > 0 && $memTotal > 0) {
            $memCache = $memCache * 100 / $memTotal;
        }
        return $memCache;
    }


}