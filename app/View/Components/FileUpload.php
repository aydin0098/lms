<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileUpload extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $type;
    public $placeholder;
    public function __construct($name,$type,$placeholder)
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-upload');
    }
}
