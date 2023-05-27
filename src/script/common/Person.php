<?php

class Person
{
    private int $id;
    private ?string $firstName;
    private ?string $lastName;

    public function __construct(int $id, ?string $firstName, ?string $lastName) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getName() : string {
        $firstName = $this->firstName ?? '';
        $lastName = $this->lastName ?? '';

        if (!$firstName && !$lastName) {
            return 'ID:' . $this->id;
        }

        $firstName = $firstName == '' ? 'UNKNOWN' : $firstName;
        $lastName = $lastName == '' ? 'UNKNOWN' : $lastName;

        return $firstName . ' ' . ($lastName ?? 'UNKNOWN') . PHP_EOL;
    }

    public function __toString() : string {
        return $this->getName();
    }
}

