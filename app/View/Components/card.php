<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $judul;
    public $subtitle;
    public $content;
    public $link1;
    public $link2;
    public $link3;

    public function __construct($judul, $subtitle, $content, $link1, $link2, $link3)
    {
        $this->judul = $judul;
        $this->subtitle = $subtitle;
        $this->content = $content;
        $this->link1 = $link1;
        $this->link2 = $link2;
        $this->link3 = $link3;
    }

    public function render()
    {
        return view('components.card');
    }
}
