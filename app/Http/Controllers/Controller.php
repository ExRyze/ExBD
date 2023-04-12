<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getUrl($url) {
        $url = substr($url, 7);
        $url = explode('/', $url);
        unset($url[0]);
        foreach ($url as $iur => $ur) {
            $url[$iur] = ucfirst($ur);
        }
        return ["arr" => $url, "path" => ""];
    }
}
