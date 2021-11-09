<?php

namespace App\Domain\Greeting;

use App\Service\RequestObjectInterface;
use Symfony\Component\Validator\Constraints as Assert;

final class Input implements RequestObjectInterface
{
    public function __construct(
        #[Assert\NotNull] private ?string $id,
        #[Assert\Length(min: 8, max: 40)] private string $username = ''
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function username(): string
    {
        return $this->username;
    }
}
