<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use Random\RandomException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;
use Twig\Environment;

use function random_int;

#[Route('/lucky-number', name: 'scApp_luckyNumber')]
final readonly class LuckyNumberController
{
    public function __construct(private Environment $twig)
    {
    }

    public function __invoke(): Response
    {
        try {
            $luckyNumber = $this->generateLuckyNumber();
        } catch (Throwable $exception) {
            return new Response($this->twig->render('@ScAppBundle/errors/general.html.twig', ['exception' => $exception]));
        }

        return new Response($this->twig->render('@ScAppBundle/pages/lucky_number.html.twig', ['number' => $luckyNumber]));
    }

    /** @throws RandomException */
    private function generateLuckyNumber(): int
    {
        return random_int(0, 100);
    }
}
