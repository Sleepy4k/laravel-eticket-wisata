<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notifications extends Component
{
    /**
    * The priority of the alert, i.e., "info", or "warning"
    *
    * @var string
    */
    public $color;

    /**
    * The message or an array of messages to present to the user
    *
    * @var mixed
    */
    public $message;

    /**
    * Create a new component instance.
    *
    * @param  string  $color
    * @param  mixed   $message
    */
    public function __construct(string $color = 'success', $message = 'Text is empty')
    {
        $this->color   = $color;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications');
    }
}
