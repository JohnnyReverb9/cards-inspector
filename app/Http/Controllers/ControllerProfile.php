<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerProfile extends Controller
{
    public function index()
    {
        return view("profile/view_profile");
    }
}
