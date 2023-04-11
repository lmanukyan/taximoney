<?php

namespace App\View\Components;

use App\Models\Taxi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaxiCard extends Component
{

    public function __construct(public Taxi $taxi)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.taxi-card', ['taxi' => $this->taxi]);
    }
}
