<?php

namespace Amaia\Base\View\Components;

use Illuminate\View\Component;

class ResponsiveNavLink extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('base::vendor.jetstream.components.responsive-nav-link');
    }
}
