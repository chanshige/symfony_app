<?php

namespace App\Controller;

use App\Domain\Greeting\Input;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GreetingController
{
    #[Route(path: '/greeting', methods: ['GET', 'HEAD'])]
    public function __invoke(Request $request)
    {
        $input = new Input($request->get('username', ''));

        return new JsonResponse(['greeting' => sprintf('Hi! %s Hello.', $input->username())]);
    }
}
