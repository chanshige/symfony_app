<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\EventListener;

use Chanshige\HalJsonResponseBundle\Attributes\Link;
use Chanshige\HalJsonResponseBundle\Extend\AttributeReader;
use ReflectionException;
use ReflectionMethod;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

use function is_object;
use function method_exists;

final class AttributeListener
{
    public const HAL_JSON_RESPONSE_LINK_ATTRIBUTES = '_hal_json_response_link_attributes';

    public function __construct(
        private AttributeReader $reader,
    ) {
    }

    /**
     * @throws ReflectionException
     */
    public function onKernelController(ControllerEvent $event): void
    {
        $request = $event->getRequest();
        $reflection = $this->getReflectionMethod($event->getController());
        // TODO: Attributesが複数ある場合はResolver欲しい
        $linkAttr = $this->reader->getMethodAttributes($reflection, Link::class);

        $request->attributes->set(self::HAL_JSON_RESPONSE_LINK_ATTRIBUTES, $linkAttr);
    }

    /**
     * @throws ReflectionException
     */
    private function getReflectionMethod(callable $controller): ReflectionMethod
    {
        if (is_object($controller) && method_exists($controller, '__invoke')) {
            return new ReflectionMethod($controller, '__invoke');
        }

        return new ReflectionMethod($controller[0], $controller[1]);
    }
}
