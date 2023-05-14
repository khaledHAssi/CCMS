<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

class TestAPI extends Controller
{
    public function posts_api()
    {
        // $data = Http::get('https://jsonplaceholder.typicode.com/posts');
        $data = Http::get('http://jsonplaceholder.typicode.com/posts');
        dd($data->json());
    }
    }
