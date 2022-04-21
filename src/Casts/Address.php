<?php

namespace Amaia\Base\Casts;

use App\Casts\AddressValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Address implements CastsAttributes
{
    /**
     * Transform the attribute from the underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        //nola irakurri datubasetik
        return new AddressValueObject(
            $attributes['address_line_1'],
            $attributes['address_line_2'],
            $attributes['city'],
            $attributes['country']
        );
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        //zer gorde datubasean

        return [
            'address_line_1' => $value->line1,
            'address_line_2' => $value->line2,
            'city' => $value->city,
            'country' => $value->country,
        ];
    }
}
