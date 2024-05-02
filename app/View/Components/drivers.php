<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class drivers extends Component
{
   public $drivers;
    public function __construct($drivers)
    {
        $this->drivers = $drivers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.drivers');
    }
}
