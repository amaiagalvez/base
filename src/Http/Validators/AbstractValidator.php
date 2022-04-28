<?php

namespace Amaia\Base\Http\Validators;

use Illuminate\Support\MessageBag;
use Request;
use Validator;

/**
 * Class AbstractValidator
 * @package Amaia\Base\Validators
 */
abstract class AbstractValidator
{
    /**
     * The input data of the current request.
     *
     * @var array
     */
    protected $inputData;

    /**
     * The validation rules to validate the input data against.
     *
     * @var array
     */
    protected $update_rules = [];

    /**
     * @var array
     */
    protected $store_rules = [];

    /**
     * @var array
     */
    protected $delete_rules = [];
    /**
     * The validator instance.
     *
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    /**
     * Array of custom validation messages.
     *
     * @var array
     */
    protected $messages = [];


    /**
     * Create a new Form instance.
     *
     */
    public function __construct()
    {
        $this->inputData = Request::all();
    }

    /**
     * Returns whether the input data is valid.
     *
     * @param $action
     * @return bool
     */
    public function isValid($action)
    {
        $this->validator = Validator::make(
            $this->getInputData(),
            $this->getPreparedRules($action),
            $this->getMessages()
        );

        return $this->validator->passes();
    }

    /**
     * Get the prepared input data.
     *
     * @return array
     */
    public function getInputData()
    {
        return $this->inputData;
    }

    /**
     * @param array $data
     */
    public function setInputData(array $data)
    {
        $this->inputData = $data;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param $repo
     */
    public function setRepo($repo)
    {
        $this->repo = $repo;
    }

    /**
     * Get the prepared validation rules.
     *
     * @param $action
     * @return array
     */
    protected function getPreparedRules($action)
    {
        return $this->{$action}();
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    protected function getMessages()
    {
        return $this->messages;
    }

    /**
     * Get the validation errors off of the Validator instance.
     *
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->validator->errors();
    }

    /**
     * @return array
     */
    public function getErrorsForJson()
    {
        return $this->validator->errors()
            ->toArray();
    }

    /**
     * @return array
     */
    protected function store()
    {
        return $this->store_rules;
    }

    /**
     * @return array
     */
    protected function update()
    {
        return $this->update_rules;
    }

    /**
     * @return array
     */
    protected function delete()
    {
        return $this->delete_rules;
    }
}
