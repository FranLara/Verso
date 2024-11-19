<?php

declare(strict_types=1);

namespace App\Tests\Unit\Controller;

use App\Controller\ApiController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiControllerTest extends ControllerTestCase
{
    public function testTest(): void
    {
        $controller = new ApiController();
        $controller->setContainer(new ContainerBuilder());

        $response = $controller->test(10, 3, 5, $this->getMockedResultGenerator());

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertSame('[1,2,"Fizz",4,"Buzz","Fizz",7,8,"Fizz","Buzz"]', $response->getContent());
    }
}
