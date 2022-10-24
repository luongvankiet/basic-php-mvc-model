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

    /** @var string */
    public $lat;

    /** @var string */
    public $lng;

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

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone_contact' => $this->phoneContact,
            'email_contact' => $this->emailContact,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
