<?php

namespace App\Models;

class Course extends Model
{
    /** @var int */
    public $id;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $attributes = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    public static function getInstance(): self
    {
        return new self;
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        parent::save();
    }
}
