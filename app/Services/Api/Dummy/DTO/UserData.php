<?php

namespace App\Services\Api\Dummy\DTO;

class UserData
{
    public function __construct(
        public string $id,
        public string $firstName,
        public string $lastName,
        public string $maidenName,
        public string $gender,
        public string $email,
        // public string $username,
        // private string $password,
        // public int $age,
        // public string $birthDate,
        // public string $bloodGroup,
        // public int $height,
        // public float $weight,
        // public string $eyeColor,
        // public string $university,
        // public string $domain,
        // public string $ip,
        // public string $macAddress,
        // public ?array $hair = null,
        // public ?array $address = null,
        public ?array $bank = null,
        public ?array $company = null,
        // public string $ein,
        // public string $ssn
    ) {
    }
}
