<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;

// This class provides filter aliases for CodeIgniter's filter system.
// In CodeIgniter, the aliases are configured in Config/Filters.php.
// Keeping this file consistent prevents syntax/parse errors.
class Filter implements FilterInterface
{
    public array $aliases = [
        'role' => \App\Filters\RoleFilter::class,
    ];

    public function before(
        \CodeIgniter\HTTP\RequestInterface $request,
        $arguments = null
    ) {
        // Not used. Actual logic lives in RoleFilter.
    }

    public function after(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        $arguments = null
    ) {
        // Not used. Actual logic lives in RoleFilter.
    }
}

