<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\EventListener;

use ReflectionException;
use ReflectionMethod;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

use function is_object;
use function method_exists;

class AnnotationSubscriber implements EventSubscriberInterface
{
    public function onKernelController(ControllerEvent $event): void
    {
        // TODO：annotationを拾ってattributeに突っ込む
    }

    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::CONTROLLER => 'onKernelController'];
    }

    /**
     * @throws ReflectionException
     */
    private function getReflectionMethod(callable $controller): ReflectionMethod
    {
        return new ReflectionMethod(
            $controller[0] ?? $controller,
            is_object($controller) && method_exists($controller, '__invoke') ? '__invoke' : $controller[1]
        );
    }
}
