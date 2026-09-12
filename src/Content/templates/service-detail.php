<?php

declare(strict_types=1);

$c = include 'service-detail/' . $slug . '.php';

return (empty($c) ? array() : $c);
