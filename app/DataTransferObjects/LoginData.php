<?php

namespace App\DataTransferObjects;

class LoginData extends DataTransferObject
{
    /** @var string */
    public $email;

    /** @var string */
    public $password;

    public function rules(): array
    {
        return $this->rules = [
            'email' => [self::REQUIRED, self::EMAIL],
            'password' => [self::REQUIRED],
        ];
    }
}
