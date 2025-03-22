<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller\Checker;

use Symfony\Bundle\FrameworkBundle\Routing\Attribute\AsRoutingConditionService;
use Symfony\Component\HttpFoundation\Request;

use function preg_match;

#[AsRoutingConditionService]
final readonly class BrowserChecker
{
    public function firefoxOrChrome(Request $request): bool
    {
        return (bool) preg_match(
            '/(firefox)|(chrome)/i',
            $request->headers->get('User-Agent')
        );
    }
}
