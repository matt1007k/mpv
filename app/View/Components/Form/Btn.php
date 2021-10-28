<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Btn extends Component
{
    public $color;
    public $size;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $color = 'default', string $size = 'default')
    {
        $this->color = $color;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.btn');
    }
}
