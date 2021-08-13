<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FrontendLayout extends Component
{
    public $title;
    public $description;

    public function __construct($title = null, $description = null)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('layouts.front');
    }
}
