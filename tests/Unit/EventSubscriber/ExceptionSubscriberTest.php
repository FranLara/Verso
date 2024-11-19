<?php

declare(strict_types=1);

namespace App\Tests\Unit\EventSubscriber;

use App\EventSubscriber\ExceptionSubscriber;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Throwable;

class ExceptionSubscriberTest extends TestCase
{
    /**
     * @dataProvider providerExceptions
     */
    public function testOnKernelException(Throwable $exception)
    {
        $event = new ExceptionEvent($this->createMock(HttpKernelInterface::class), $this->createMock(Request::class),
            HttpKernelInterface::MAIN_REQUEST, $exception);

        (new ExceptionSubscriber())->onKernelException($event);

        $response = $event->getResponse();

        if (!$exception instanceof NotFoundHttpException) {
            $this->assertNull($response);
        }
        if ($exception instanceof NotFoundHttpException) {
            $this->assertNotNull($response);
            $this->assertSame(Response::HTTP_NOT_FOUND, $response->getStatusCode());
            $this->assertSame(ExceptionSubscriber::WRONG_REQUEST, $response->getContent());
        }
    }

    public function testGetSubscribedEvents()
    {
        $expectedEvents = [KernelEvents::EXCEPTION => ['onKernelException']];

        $this->assertSame($expectedEvents, ExceptionSubscriber::getSubscribedEvents());
    }

    public static function providerExceptions(): array
    {
        return [[new NotFoundHttpException()], [new ResourceNotFoundException()]];
    }
}
