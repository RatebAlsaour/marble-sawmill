<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $id;

    public $name;

    public $label;

    public $required;

    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $name, $placeholder = null, $required = true)
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
