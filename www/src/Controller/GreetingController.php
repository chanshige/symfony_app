<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\Greeting\Input;
use Chanshige\HalJsonResponseBundle\Annotation\Link;
use Chanshige\HalJsonResponseBundle\Annotation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function sprintf;

class GreetingController
{
    #[Route(path: '/greeting', methods: ['HEAD', 'GET'])]
    #[Response(statusCode: 200)]
    #[Link(rel: 'users', href: '/users{?greeting}')]
    public function index(Input $input): array
    {
        return [
            'greeting' => sprintf('Hello %s', $input->name())
        ];
    }
}
