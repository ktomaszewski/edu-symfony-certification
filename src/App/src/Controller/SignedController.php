<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\UriSigner;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final readonly class SignedController
{
    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private UriSigner $uriSigner
    ) {
    }

    #[Route(path: 'signed', name: 'sc_app_signed', methods: [Request::METHOD_GET])]
    public function __invoke(): Response
    {
        $url = $this->urlGenerator->generate('sc_app_luckyNumber', ['luckyNumber' => 18], UrlGeneratorInterface::ABSOLUTE_URL);
        $signedUrl = $this->uriSigner->sign($url);
        $signedUrlWithExpiration = $this->uriSigner->sign($url, new DateTimeImmutable('2050-01-1'));
        $isSignedUrlValid = $this->uriSigner->check($signedUrlWithExpiration);

        return new Response(<<<CONTENT
            <html>
                <body>
                    <p><h3>URL:</h3> $url</p>
                    <p><h3>Signed URL:</h3> $signedUrl</p>
                    <p><h3>Signed URL with expiration:</h3> $signedUrlWithExpiration</p>
                    <p><h3>Is signed URL valid:</h3> $isSignedUrlValid</p>
                </body>
            </html>
        CONTENT
        );
    }
}
