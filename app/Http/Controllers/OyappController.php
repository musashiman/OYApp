<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oyapp;

class OyappController extends Controller
{
    //
    public function index(Oyapp $oyapp)
    {
        return view("oyapps/index")->with(["oyapps"=>$oyapp->get()]);
    }
}
