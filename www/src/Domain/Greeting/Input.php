<?php

namespace App\Domain\Greeting;

use Symfony\Component\Validator\Constraints as Assert;

final class Input
{
    public function __construct(
        #[Assert\Length(min: 8, max: 40)] private string $username
    ) {
    }

    public function username(): string
    {
        return $this->username;
    }
}
