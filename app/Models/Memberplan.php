<?php

namespace App\Models;

class Memberplan extends Model
{
    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var int */
    public $duration;

    /** @var string */
    public $unit;

    /** @var int */
    public $classes;

    /** @var int */
    public $price;

    protected $table = 'member_plans';
    protected $primaryKey = 'id';

    protected $attributes = [
        'name',
        'description',
        'duration',
        'unit',
        'classes',
        'price'
    ];

    public static function getInstance(): self
    {
        return new self;
    }

    public function toArray()
    {
        return [];
    }
}
