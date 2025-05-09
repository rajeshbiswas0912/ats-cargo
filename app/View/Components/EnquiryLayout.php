<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class EnquiryLayout extends Component
{
    public $title;

    public function __construct($title = 'Default Title')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.enquiry');
    }
}