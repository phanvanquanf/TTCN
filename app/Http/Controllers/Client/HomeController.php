<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home.index');
    }

    public function about()
    {
        return view('client.home.about');
    }

    public function contact()
    {
        return view('client.home.contact');
    }


}
