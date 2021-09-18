<?php

namespace App\View\Components\Front;

use App\Models\Category;
use Illuminate\View\Component;

class Nav extends Component
{
    public $categories;
    public function __construct()
    {
        $this->categories = Category::whereNull('category_id')
                                        ->get();
    }

    public function render()
    {
        return view('components.front.nav');
    }
}
