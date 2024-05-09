<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class busMaintenance extends Component
{
    public $vehicle;
    public $busMaintenances;
    public $idNav;
    public $driver;
    public $routes;
    public function __construct($vehicle,$busMaintenances,$idNav,$driver,$routes)
    {
        $this->vehicle = $vehicle;
        $this->busMaintenances = $busMaintenances;
        $this->idNav = $idNav;
        $this->driver = $driver;
        $this->routes = $routes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bus-maintenance');
    }
}
