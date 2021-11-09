<?php

namespace App\Controller;

use App\Domain\Greeting\Input;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GreetingController
{
    #[Route(path: '/greeting')]
    public function __invoke(Input $input, ValidatorInterface $validator, LoggerInterface $logger): JsonResponse
    {
        $logger->info('autowired !!!!!!!!');

        return new JsonResponse(['greeting' => sprintf('Hi! %s Hello.', $input->username())]);
    }
}
