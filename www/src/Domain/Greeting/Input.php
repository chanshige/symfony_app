<?php

namespace App\Domain\Greeting;

use App\Service\RequestObjectInterface;
use Symfony\Component\Validator\Constraints as Assert;

final class Input implements RequestObjectInterface
{
    public function __construct(
        #[Assert\Length(min: 8, max: 40)] private ?string $name
    ) {
    }

    public function name(): ?string
    {
        return $this->name;
    }
}
