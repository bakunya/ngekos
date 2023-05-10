<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $active_nav;
    public $active_subnav;
    public $for = 'admin';
    /**
     * Create a new component instance.
     */
    public function __construct($activeNav, $activeSubnav, $for = 'admin')
    {
        $this->for = $for;
        $this->active_nav = $activeNav;
        $this->active_subnav = $activeSubnav;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->for == 'admin') {
            return view('components.sidebar-admin');
        }
        return view('components.sidebar-user');
    }
}
