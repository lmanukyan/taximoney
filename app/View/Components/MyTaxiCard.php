<?php

namespace App\View\Components;

use App\Models\UserTaxi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyTaxiCard extends Component
{
    public function __construct(public UserTaxi $taxi)
    {

    }

    public function render(): View|Closure|string
    {
        return view('components.my-taxi-card', ['taxi' => $this->taxi]);
    }
}
