<?php

namespace App\View\Components;

use Illuminate\View\Component;

class confirmationModal extends Component
{
    public $hash;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.confirmation-modal');
    }
}
