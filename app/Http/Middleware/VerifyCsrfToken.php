<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/user-registration',
        '/user-login',
        '/user-profile',
        '/logout',
        '/user-update',
        '/create-education',
        '/education-list',
        '/education-delete',
        '/education-update',
        '/create-blog',
        '/blog-list',
        '/blog-delete',
        '/blog-update',
        '/create-project',
        '/project-list',
        '/project-delete',
        '/project-update',
        '/create-skill',
        '/skill-list',
        '/skill-delete',
        '/skill-update',
        '/create-experience',
        '/experience-list',
        '/experience-delete',
        '/experience-update',
        '/create-contact',
        '/contact-list',
        'contact-delete',
        '/contact-update',
        '/create-social',
        '/social-list',
        '/social-delete',
        '/social-update',
        '/create-experience',
        '/experience-list',
        '/experience-delete',
        '/experience-update',



    ];
}
