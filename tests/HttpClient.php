<?php

namespace Tests;

trait HttpClient
{
    public function _exec(string $url, array $opt = []): array
    {
        $ch = curl_init($url);
        $optf = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_USERAGENT => "HttpClient"
        ];
        foreach ($opt as $k => &$v) {
            $optf[$k] = $v;
        }
        unset($opt, $k, $v);
        curl_setopt_array($ch, $optf);
        $out = curl_exec($ch);
        $info = curl_getinfo($ch);
        $err = curl_error($ch);
        $ern = curl_errno($ch);
        curl_close($ch);
        $ch = null;
        unset($ch);
        return [
            "out" => $out,
            "info" => $info,
            "error" => $err,
            "ern" => $ern
        ];
    }
}
