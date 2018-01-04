<?php

namespace App\Http\Controllers;


class WooController extends Controller
{
    public function index() {
        $bar = 'barz!';
        return view('woo/index', ['foo' => $bar]);
    }
}
