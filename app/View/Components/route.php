<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class route extends Component
{
    /**
     * Create a new component instance.
     */
    public $routes;
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.route');
    }
}
