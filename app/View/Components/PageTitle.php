<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageTitle extends Component
{
    public $title;
    public $current;
    public $subtitle;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $subtitle, $current)
    {
        $this->title = $title;
        $this->current = $current;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-title');
    }
}
