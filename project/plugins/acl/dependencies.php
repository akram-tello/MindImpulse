<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Acl;

use Flextype\Plugin\Acl\Models\Acl;
use Flextype\Plugin\Acl\Twig\AclTwigExtension;
use Flextype\Plugin\Twig\Twig\FlextypeTwig;
use Flextype\Foundation\Entries\Entries;
use Flextype\Plugin\Twig\Twig\FlextypeEntriesTwig;


/**
 * Add ACL Model to Flextype container
 */
flextype()->container()['acl'] = fn() => new Acl();


/**
 * Add ACL Model to Flextype Twig
 */
FlextypeTwig::macro('acl', fn() => flextype('acl'));
