<?php

namespace App\View\Components;

use NumberFormatter;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class Currency extends Component
{
    public $amount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        $formatted_price = new NumberFormatter(App::currentLocale(), NumberFormatter::CURRENCY);
        $this->amount = $formatted_price->formatCurrency($amount, 'USD');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.currency');
    }
}
