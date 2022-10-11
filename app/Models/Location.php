<?php

namespace App\Models;

class Location extends Model
{
    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $address;

    /** @var string */
    public $phoneContact;

    /** @var string */
    public $emailContact;

    protected $table = 'locations';
    protected $primaryKey = 'id';

    protected $attributes = [
        'name',
        'address',
        'phone_contact',
        'email_contact'
    ];

    public static function getInstance(): self
    {
        return new self;
    }
}
