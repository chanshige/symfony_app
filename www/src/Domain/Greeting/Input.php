<?php

namespace App\Domain\Greeting;

final class Input
{
    public function __construct(
        private string $username = ''
    ) {
    }

    public function username(): string
    {
        return $this->username;
    }
}
