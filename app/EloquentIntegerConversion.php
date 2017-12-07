<?php

namespace App;

class EloquentIntegerConversion implements IntegerConversionInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     *  constructor.
     *
     * @param IntegerConversion $model
     */
    public function __construct(IntegerConversion $model)
    {
        $this->model = $model;
    }

    public function toRomanNumerals($number)
    {
        return $this->model->toRomanNumerals($number);
    }
}