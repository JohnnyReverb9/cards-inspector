<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerProfile extends Controller
{
    public function index()
    {
        $current_user_id = Auth::user()->id;

        $user = User::find($current_user_id);

        return view("profile/view_profile", compact("user"));
    }

    public function userProfile(Request $request)
    {
        try
        {
            $id = $request->id;

            $user = User::find($id);

            return view("profile/view_profile", compact("user"));
        }
        catch (\Exception $e)
        {
            // TODO: добавить обработку
            echo $e->getMessage();
        }
    }
}
