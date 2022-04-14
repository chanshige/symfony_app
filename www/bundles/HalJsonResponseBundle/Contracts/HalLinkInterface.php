<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\Contracts;

use Nocarrier\Hal;
use Traversable;

interface HalLinkInterface
{
    /**
     * @param array<int, mixed>        $body
     * @param Traversable<int, object> $attributes
     */
    public function add(array $body, Traversable $attributes, Hal $hal): Hal;
}
