<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        return view('client.services.index');
    }
}