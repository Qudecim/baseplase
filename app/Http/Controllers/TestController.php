<?php

namespace App\Http\Controllers;

use App\Baceplace\PubSub\Publishers\OrderCreated;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        OrderCreated::dispatch(['test']);
    }
}
