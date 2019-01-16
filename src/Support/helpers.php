<?php

namespace App\Support;

/**
 * Returns the fully qualified path to the project root
 */
if (!function_exists('basePath')) {
    function basePath(): string
    {
        return __DIR__ . '/../../';
    }
}