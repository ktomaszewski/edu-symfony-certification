<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use Random\RandomException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

use function random_int;
use function sprintf;

#[Route('/lucky-number', name: 'scApp_luckyNumber')]
final readonly class LuckyNumberController
{
    public function __invoke(): Response
    {
        try {
            $luckyNumber = $this->generateLuckyNumber();
        } catch (Throwable $exception) {
            return new Response(sprintf('Error: %s', $exception->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new Response(sprintf('Lucky number: %d', $luckyNumber));
    }

    /** @throws RandomException */
    private function generateLuckyNumber(): int
    {
        return random_int(0, 100);
    }
}
