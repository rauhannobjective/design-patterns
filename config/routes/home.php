<?php

declare(strict_types=1);

namespace DesignPatterns\Src\Routes;

use DesignPatterns\Src\Home;

$GLOBALS['app']->get('/', Home::class);
