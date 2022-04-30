<?php

namespace Amaia\Base\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $tags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tags = [])
    {
        //
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('base::components.card');
    }

    public function hasTags()
    {
        return count($this->tags);
    }
}
