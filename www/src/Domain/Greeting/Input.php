<?php

namespace App\Domain\Greeting;

use App\Service\RequestObjectInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

final class Input implements RequestObjectInterface
{
    #[Assert\Length(min: 8, max: 40)]
    private string $username;

    public function __construct(Request $request)
    {
        $this->username = $request->get('username', '');
    }

    public function username(): string
    {
        return $this->username;
    }
}
