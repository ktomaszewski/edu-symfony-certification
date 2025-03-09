<?php

declare(strict_types=1);

final readonly class HelloWorldController
{
    public function __invoke(): string
    {
        return 'Hello World!';
    }
}
