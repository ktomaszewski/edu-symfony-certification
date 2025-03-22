<?php

declare(strict_types=1);

namespace SymfonyCertification\App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/my-browser', 'sc_app_myBrowser_')]
final readonly class MyBrowserController
{
    #[Route(path: '', name: 'some', methods: [Request::METHOD_GET],)]
    public function some(): Response
    {
        return new Response('You are using some browser!');
    }

    #[Route(
        path: '/firefox',
        name: 'firefox',
        methods: [Request::METHOD_GET],
        condition: "request.headers.get('User-Agent') matches '/firefox/i'",
    )]
    public function firefox(): Response
    {
        return new Response('You are using Firefox!');
    }

    #[Route(
        path: '/chrome',
        name: 'chrome',
        methods: [Request::METHOD_GET],
        condition: "request.headers.get('User-Agent') matches '/chrome/i'",
    )]
    public function chrome(): Response
    {
        return new Response('You are using Chrome!');
    }

    #[Route(
        path: '/firefox-or-chrome',
        name: 'firefoxOrChrome',
        methods: [Request::METHOD_GET],
        condition: "service('SymfonyCertification\\\App\\\Controller\\\Checker\\\BrowserChecker').firefoxOrChrome(request)",
    )]
    public function firefoxOrChrome(): Response
    {
        return new Response('You are using Firefox or Chrome!');
    }
}
