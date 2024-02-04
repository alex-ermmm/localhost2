<?php

namespace Core;

abstract class AbstractController
{
    protected function redirect(string $url)
    {
    throw new RedirectException($url);
    }
}