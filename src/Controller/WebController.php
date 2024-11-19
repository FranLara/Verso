<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Test\ResultGenerator;
use App\Utils\GeneratedResultGetter as GeneratedResultGetterTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WebController extends AbstractController
{
    use GeneratedResultGetterTrait;

    public function test(int $amount, int $fizzValue, int $buzzValue, ResultGenerator $resultGenerator): Response
    {
        return $this->render('test/test.html.twig',
            ['output' => $this->getGeneratedResult($amount, $fizzValue, $buzzValue, $resultGenerator)]);
    }
}