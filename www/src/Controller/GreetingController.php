<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GreetingController
{
    #[Route(path: '/greeting')]
    public function index(LoggerInterface $logger)
    {
        $logger->info('autowired !!!!!!!!');

        return new JsonResponse(['greeting' => sprintf('Hi! %s Hello.', 'test')]);
    }
}
