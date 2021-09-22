<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AclIsUserLoggedInUuidNotInMiddleware
{
    /**
     * Middleware Settings
     */
    protected $settings;

    /**
     * __construct
     */
    public function __construct($settings)
    {

        $this->settings  = $settings;
    }

    /**
     * __invoke
     *
     * @param Request  $request  PSR7 request
     * @param Response $response PSR7 response
     * @param callable $next     Next middleware
     */
    public function __invoke(Request $request, Response $response, callable $next) : Response
    {
        if (!flextype('acl')->isUserLoggedInUuidIn($this->settings['uuids'])) {
            $response = $next($request, $response);
        } else {
            $response = $response->withRedirect(flextype('router')->pathFor($this->settings['redirect']));
        }

        return $response;
    }
}
