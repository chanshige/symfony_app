<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\Extend;

final class UriTemplate
{
    public static function expand(string $template, array $variables): string
    {
        static $uriTemplate;

        if (! $uriTemplate) {
            $uriTemplate = new \Rize\UriTemplate();
        }

        return $uriTemplate->expand($template, $variables);
    }
}
