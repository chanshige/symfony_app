<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\EventListener;

use Chanshige\HalJsonResponseBundle\Contracts\HalJsonResponseInterface;
use Chanshige\HalJsonResponseBundle\Contracts\HalLinkInterface;
use Nocarrier\Hal;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Traversable;

use function assert;

final class ViewListener
{
    public function __construct(
        private HalLinkInterface $link
    ) {
    }

    public function onKernelView(ViewEvent $event): void
    {
        $request = $event->getRequest();
        $result = $event->getControllerResult();
        assert($result instanceof HalJsonResponseInterface);

        $hal = $this->getHal(
            $result->getContent(),
            $request->attributes->get(AttributeListener::HAL_JSON_RESPONSE_LINK_ATTRIBUTES),
            $request->getPathInfo(),
            $request->getQueryString()
        );

        $event->setResponse(
            JsonResponse::fromJsonString(
                $hal->asJson(true),
                $result->getCode(),
                $result->getHeaders()
            )
        );
    }

    private function getHal(array $content, Traversable $attributes, string $path, ?string $query): Hal
    {
        $qs = $query !== null ? '?' . $query : '';
        $hal = new Hal($path . $qs, $content);

        return $this->link->add($content, $attributes, $hal);
    }
}
