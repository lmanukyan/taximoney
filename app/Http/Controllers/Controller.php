<?php

namespace App\Http\Controllers;

use App\Models\Taxi;
use App\Models\Color;
use App\Services\TaxiService;
use App\Http\Requests\BuyRequest;
use App\Http\Requests\ChangeColorRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use App\Exceptions\NotEnoughCreditException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        $taxis = Taxi::all();

        return view('taxi_list', [
            'taxis' => $taxis
        ]);
    }

    public function list()
    {
        return view('taxi_purchased', [
            'userTaxis' => Auth::user()->taxis,
            'colors' => Color::get()
        ]);
    }

    public function buy(BuyRequest $request, Taxi $taxi)
    {
        try {
            TaxiService::buy(Auth::user(), $taxi);
        } catch(NotEnoughCreditException $e) {
            return redirect()->route('app')->with('error', $e->getMessage());
        }

        return redirect()->route('app')->with('success', 'Вы приобрели машину');
    }

    public function changeColor(ChangeColorRequest $request)
    {
        $data = $request->validated();

        try {
            TaxiService::changeColor(Auth::user(), $data);
        } catch(NotEnoughCreditException $e) {
            return redirect()->route('taxi.list')->with('error', $e->getMessage());
        }

        return redirect()->route('taxi.list')->with('success', 'Вы перекрасили машину');
    }
}
