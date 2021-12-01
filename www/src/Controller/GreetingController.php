<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\Greeting\Input;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use function sprintf;

class GreetingController
{
    #[Route(path: '/greeting')]
    public function __invoke(Input $input): JsonResponse
    {
        return new JsonResponse(['greeting' => sprintf('Hello %s', $input->name())]);
    }
}
