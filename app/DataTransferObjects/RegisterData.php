<?php

namespace App\DataTransferObjects;

use App\Models\User;

class RegisterData extends DataTransferObject
{
    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    /** @var string */
    public $passwordConfirmation;

    public function rules(): array
    {
        return $this->rules = [
            'first_name' => [self::REQUIRED],
            'last_name' => [self::REQUIRED],
            'email' => [self::REQUIRED, self::EMAIL, [self::UNIQUE, 'class' => User::class, 'attribute' => 'email']],
            'password' => [self::REQUIRED, [self::MIN, 'min' => 8]],
            'password_confirmation' => [self::REQUIRED, [self::MATCH, 'match' => 'password']]
        ];
    }

    public function toArray()
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->passwordConfirmation,
        ];
    }
}
