<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestObjectResolver implements ArgumentValueResolverInterface
{
    public function __construct(
      private ValidatorInterface $validator
    ) {
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return $argument->getType() === RequestObjectInterface::class ||
            is_subclass_of($argument->getType(), RequestObjectInterface::class);
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $class = $argument->getType();
        $dto = new $class($request);

        $errors = $this->validator->validate($dto);
        if ($errors->count() > 0) {
            throw new HttpException(404, (string) $errors);
        }

        yield $dto;
    }
}
