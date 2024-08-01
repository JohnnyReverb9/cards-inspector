<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerCardManagement extends Controller
{
    public function createCardPage()
    {
        return view("create_card/create_card");
    }

    public function createCard(Request $request)
    {
        $validated_data = $request->validate([
            "full_name" => "required|string|min:4|max:100",
            "flat_num" => "required|numeric|min:0|max:561",
            "phone" => "required|string|min:18|max:18",
            "alias" => "required|string|min:4|max:100",
            "expiration" => "nullable|date",
            "passport" => "string|min:6|max:10"
        ]);

        $additional_data = [
            "staff_add" => Auth::user()->id
        ];

        $res = array_merge($validated_data, $additional_data);

        $card = Card::create($res);

        return redirect('/view_cards')->with('success', 'Карта успешно создана');
    }

    public function viewCards()
    {
        $card_list = Card::all();

        // dd($card_list);
        return view("view_cards/view_card_list", ["card_list" => $card_list]);
    }
}
