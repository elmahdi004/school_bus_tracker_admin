<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class vehicles extends Component
{
    /**
     * Create a new component instance.
     */
    public $vehicles;
    public function __construct($vehicles)
    {
        $this->vehicles = $vehicles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vehicles');
    }
}
