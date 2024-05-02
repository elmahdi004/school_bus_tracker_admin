<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class parents extends Component
{ 
    public $parents;

    public function __construct($parents)
    {
        $this->parents = $parents;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.parents');
    }
}
