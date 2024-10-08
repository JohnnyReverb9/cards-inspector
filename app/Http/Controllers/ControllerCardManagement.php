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

            if ($request->has("other_alias") && $request->get("other_alias") != "" && $request->get("alias") == "Другое")
            {
                $validated_data["alias"] = $request->get("other_alias");
            }

            $additional_data = [
                "staff_add" => Auth::user()->id
            ];

            $res = array_merge($validated_data, $additional_data);

            $card = Card::create($res);

            return redirect()->route("view_cards")->with("success", "Карта №" . $card->id . " успешно создана.");
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

    public function viewCardList(Request $request)
    {
        $query = $request->input('search');

        if ($query)
        {
            $card_list = Card::where('id', 'LIKE', "%$query%")
                ->orWhere('full_name', 'LIKE', "%$query%")
                ->orWhere('flat_num', 'LIKE', "%$query%")
                ->paginate(5);
        }
        else
        {
            $card_list = Card::paginate(5);
        }

        $users = ManagementUsers::getArrayMapUsers();

        if ($request->ajax())
        {
            return response()->json([
                "html" => view("view_cards/search/view_card_list_content", ["card_list" => $card_list, "users" => $users])->render()
            ]);
        }

        return view("view_cards/view_card_list", ["card_list" => $card_list, "users" => $users]);
    }

    public function viewCard(Request $request)
    {
        try
        {
            $card_id = $request->id;
            $card = Card::find($card_id);

            if (is_null($card))
            {
                return redirect()->route("view_cards")->withErrors(["error" => "Карта №" . $card_id . " не найдена"]);
            }

            $users = ManagementUsers::getArrayMapUsers();

            return view("view_cards/view_card", ["card" => $card, "users" => $users]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            return "Карта №" . $card_id . "не найдена";
        }
        catch (\Exception $e)
        {
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteCard(Request $request)
    {
        try
        {
            $card_id = $request->id;
            $card = Card::find($card_id);

            if (is_null($card))
            {
                return redirect()->route("view_cards")->withErrors(["error" => "Карта №" . $card_id . " не найдена"]);
            }

            $card->delete();

            return redirect()->route("view_cards")->with("success", "Карта №$card_id успешно удалена.");
        }
        catch (\Exception $e)
        {
            return redirect()->route("view_cards")->withErrors(["error" => "Произошла ошибка: " . $e->getMessage()]);
        }
    }
}
