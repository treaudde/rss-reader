<?php

namespace App\Domain\Frontend\Application\Http\Controllers;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('app');
    }

    public function viewMockups()
    {
        return view('mockups');
    }

}
