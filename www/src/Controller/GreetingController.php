<?php

namespace App\Controller;

use App\Domain\Greeting\Input;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GreetingController
{
    #[Route(path: '/greeting', methods: ['GET', 'HEAD'])]
    public function __invoke(ValidatorInterface $validator)
    {
        $validator->validate(new Input('abc'));
    }
}
