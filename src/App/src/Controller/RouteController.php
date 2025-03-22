<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use function sprintf;

final readonly class RouteController
{
    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    #[Route(path: 'route', name: 'sc_app_route', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        return new Response(sprintf(
            'This route URL: %s', $this->urlGenerator->generate('sc_app_route', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ));
    }
}
