<?php

namespace Wame\DatePicker;

use Laravel\Nova\Card;

class DatePicker extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'date-picker';
    }

    public function userDisable($value) {
        return $this->withMeta([
            'userDisable' => $value,
        ]);
    }

    public function addParameter($value) {
        return $this->withMeta([
            'addParameter' => $value,
        ]);
    }

    public function getDateRange() {
        return $this->withMeta([
            'getDateRange' => config('wame-datepicker.date'),
        ]);
    }

}
