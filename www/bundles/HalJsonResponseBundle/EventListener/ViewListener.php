<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\EventListener;

use Chanshige\HalJsonResponseBundle\Contracts\HalJsonResponseInterface;
use Chanshige\HalJsonResponseBundle\Contracts\HalLinkInterface;
use Nocarrier\Hal;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
        $context = $event->getControllerResult();
        assert($context instanceof HalJsonResponseInterface);

        $hal = $this->getHal(
            $request,
            $request->attributes->get(AttributeListener::HAL_JSON_RESPONSE_LINK_ATTRIBUTES),
            $context->getContent()
        );

        $event->setResponse(
            JsonResponse::fromJsonString(
                $hal->asJson(true),
                $context->getCode(),
                $context->getHeaders()
            )
        );
    }

    /**
     * @param Traversable<int, object> $attributes
     * @param array                    $content
     */
    private function getHal(Request $request, Traversable $attributes, array $content): Hal
    {
        $qs = ($qs = $request->getQueryString()) !== null ? '?' . $qs : '';
        $hal = new Hal($request->getPathInfo() . $qs, $content);

        return $this->link->add($content, $attributes, $hal);
    }
}
