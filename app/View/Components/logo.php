<?php

namespace App\View\Components;

use Illuminate\View\Component;

class logo extends Component
{
    public $width;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width = 300)
    {
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo');
    }
}
