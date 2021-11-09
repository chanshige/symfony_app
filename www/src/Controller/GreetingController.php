<?php

namespace App\Controller;

use App\Domain\Greeting\Input;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GreetingController
{
    #[Route(path: '/greeting')]
    public function __invoke(Request $request, ValidatorInterface $validator, LoggerInterface $logger)
    {
        $logger->info('autowired !!!!!!!!');

        $input = new Input($request->get('username', 'sample_test'));

        $errors = $validator->validate($input);
        if ($errors->count()) {
            throw new HttpException(404, (string) $errors);
        }

        return new JsonResponse(['greeting' => sprintf('Hi! %s Hello.', $input->username())]);
    }
}
