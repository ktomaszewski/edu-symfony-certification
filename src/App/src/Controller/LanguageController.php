<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function sprintf;

#[Route(
    path: [
        'pl' => '/jezyk',
        'en' => '/language',
    ],
    name: 'sc_app_language',
    methods: [Request::METHOD_GET]
)]
final readonly class LanguageController
{
    public function __invoke(Request $request): Response
    {
        return new Response(sprintf('You are using "%s" locale!', $request->getLocale()));
    }
}
