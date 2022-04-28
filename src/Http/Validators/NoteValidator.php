<?php

namespace Amaia\Base\Http\Validators;


use Illuminate\Support\Arr;

/**
 * Class NoteValidator
 * @package Amaia\Base\Http\Validators
 */
class NoteValidator extends AbstractValidator
{

    protected $id = null;

    /** Get the prepared input data.
     *
     * @return array
     */
    public function getInputData()
    {
        return Arr::only(
            $this->inputData,
            [
                'name',
                'created_by',
                'active'
            ]
        );
    }

    /**
     * @var array
     */
    protected $store_rules = [
        'name' => 'required|string|max:255',
        'created_by' => 'required|exists:users,id',
        'active' => 'required|boolean'
    ];

    /**
     * @var array
     */
    protected $update_rules = [
        'name' => 'required|string|max:255',
        'created_by' => 'required|exists:users,id',
        'active' => 'required|boolean'
    ];

    /**
     * @var array
     */
    protected $delete_rules = [];
}
