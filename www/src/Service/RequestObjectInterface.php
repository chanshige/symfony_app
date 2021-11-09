<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

interface RequestObjectInterface
{
    // TODO: Requestに依存してるので、ここをResolveの方でhydrateする
    public function __construct(Request $request);
}
