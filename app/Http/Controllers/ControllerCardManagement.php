<?php

namespace App\Http\Controllers;

use App\classes\user\ManagementUsers;
use App\Models\Admin;
use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ControllerCardManagement extends Controller
{
    public function createCardPage()
    {
        return view("create_card/create_card");
    }

    public function createCard(Request $request)
    {
        try {
            $validated_data = $request->validate([
                "full_name" => "required|string|min:4|max:100",
                "flat_num" => "required|numeric|min:1|max:561",
                "phone" => "required|string|min:18|max:18",
                "alias" => "required|string|min:4|max:100",
                "passport" => "string|min:6|max:10"
            ]);

            if ($request->has("expiration") && $request->get("expiration") != "")
            {
                $validated_data["expiration"] = Carbon::createFromFormat("d.m.Y", $request->input("expiration"))->format("Y-m-d");
            }

            $additional_data = [
                "staff_add" => Auth::user()->id
            ];

            $res = array_merge($validated_data, $additional_data);

            $card = Card::create($res);

            return redirect("/view_cards")->with("success", "Карта №" . $card->id . " успешно создана.");
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->withInput()->withErrors(["error" => "Ошибка базы данных: " . $e->getMessage()]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withInput()->withErrors(["error" => "Произошла ошибка: " . $e->getMessage()]);
        }
    }

    public function viewCardList()
    {
        $card_list = Card::all();
        $users = ManagementUsers::getArrayMapUsers();

        return view("view_cards/view_card_list", ["card_list" => $card_list, "users" => $users]);
    }

    public function viewCard(Request $request)
    {
        echo $request->id;
    }
}
