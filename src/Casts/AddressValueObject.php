<?php

namespace Amaia\Base\Casts;

class AddressValueObject
{

    public $line1;
    public $line2;
    public $city;
    public $country;

    public function __construct($line1, $line2, $city, $country)
    {
        $this->line1  = $line1;
        $this->line2 = $line2;
        $this->city = $city;
        $this->country = $country;
    }

    public function getFullAddress()
    {
        return $this->line1 . '<br> ' . $this->line2 . '<br>' . $this->city . ' (' . $this->country . ')';
    }
}
