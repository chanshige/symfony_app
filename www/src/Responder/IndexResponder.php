<?php

declare(strict_types=1);

namespace App\Responder;

use Chanshige\HalJsonResponseBundle\Contracts\HalJsonResponseInterface;

final class IndexResponder
{
    public function __construct(
        private HalJsonResponseInterface $response
    ) {
    }

    public function emit(array $attributes): HalJsonResponseInterface
    {
        return $this->response->withStatusCode(200)
            ->withContent($attributes);
    }
}
