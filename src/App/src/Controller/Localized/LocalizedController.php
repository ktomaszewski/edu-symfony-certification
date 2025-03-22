<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller\Localized;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function sprintf;

#[Route(
    path: '/localized',
    name: 'sc_app_localized',
    methods: [Request::METHOD_GET]
)]
final readonly class LocalizedController
{
    public function __invoke(Request $request): Response
    {
        return new Response(sprintf('You are using "%s" locale!', $request->getLocale()));
    }
}
