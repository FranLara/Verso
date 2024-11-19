<?php

declare(strict_types=1);

namespace App\Tests\Unit\Controller;

use App\Controller\WebController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class WebControllerTest extends ControllerTestCase
{
    public function testTest(): void
    {
        $container = new ContainerBuilder();
        $container->set('twig', $this->createConfiguredMock(Environment::class, ['render' => 'Rendered Template']));

        $controller = new WebController();
        $controller->setContainer($container);

        $response = $controller->test(10, 3, 5, $this->getMockedResultGenerator());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame('Rendered Template', $response->getContent());
    }
}
