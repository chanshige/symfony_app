<?php

declare(strict_types=1);

namespace App\Controller;

use App\Responder\IndexResponder;
use Chanshige\HalJsonResponseBundle\Attributes\Link;
use Symfony\Component\Routing\Annotation\Route;

final class IndexController
{
    public function __construct(
        private IndexResponder $responder
    ) {
    }

    #[Route(path: '/', name: 'index', methods: ['HEAD', 'GET'])]
    #[Link(rel: 'greeting', href: '/greeting/{test}')]
    public function __invoke()
    {
        return $this->responder->emit(['test' => 3]);
    }
}
