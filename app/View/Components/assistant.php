<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class assistant extends Component
{
    /**
     * Create a new component instance.
     */
    public $assistants;
    public function __construct($assistants)
    {
        $this->assistants = $assistants;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.assistant');
    }
}
