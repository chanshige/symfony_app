<?php

declare(strict_types=1);

namespace App\Controller;

use Chanshige\HalJsonResponseBundle\Attributes\Link;
use Chanshige\HalJsonResponseBundle\Contracts\HalJsonResponseInterface;
use Symfony\Component\Routing\Annotation\Route;

class GreetingController
{
    public function __construct(
        private HalJsonResponseInterface $response
    ) {
    }

    #[Route(path: '/greeting', methods: ['HEAD', 'GET'])]
    #[Link(rel: 'link1', href: '/users{?greeting}')]
    #[Link(rel: 'link2', href: '/users{?greeting}')]
    public function index()
    {
        return $this->response->withContent(['greeting' => 'Hi! chanshige']);
    }
}
