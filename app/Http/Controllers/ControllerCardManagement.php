<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerCardManagement extends Controller
{
    public function createCardPage()
    {
        return view("create_card/create_card");
    }

    public function createCard(Request $request)
    {
        dd(123);
    }

    public function viewCards()
    {
        // ...
    }
}
