<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final readonly class HealthCheckController
{
    #[Route(path: '/healthcheck', name: 'sc_app_healtheck', methods: ['GET'], stateless: true)]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['ok' => true]);
    }
}
