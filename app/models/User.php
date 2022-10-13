<?php

namespace App\Models;

class User extends Model
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
    public $imagePath;

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

    public function name()
    {
        $name = [];

        if ($this->firstName) {
            $name[] = $this->firstName;
        }

        if ($this->lastName) {
            $name[] = $this->lastName;
        }

        return implode(' ', $name);
    }

    public function customer()
    {
        return $this->query()->where('role', 'customer');
    }

    public function trainer()
    {
        return $this->query()->where('role', 'trainer');
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'image_path' => $this->imagePath,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
