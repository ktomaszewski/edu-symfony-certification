<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

use function sprintf;

#[Route(
    path: '/number/{number}',
    name: 'sc_app_number',
    requirements: ['number' => Requirement::DIGITS],
    methods: [Request::METHOD_GET]
)]
final readonly class NumberController
{
    public function __invoke(int $number = 1): Response
    {
        return new Response(sprintf('Your number: %d', $number));
    }
}
