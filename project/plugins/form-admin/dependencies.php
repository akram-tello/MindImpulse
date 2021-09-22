<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\FormAdmin;

use Slim\Flash\Messages;
use Flextype\Component\I18n\I18n;
use function Flextype\Component\I18n\__;

// Add Admin Navigation
flextype('registry')->set('plugins.admin.settings.navigation.extends.fieldsets', ['title' => __('form_admin_fieldsets'), 'icon' => ['name' => 'list-alt', 'set' => 'fontawesome|solid'], 'link' => flextype('router')->pathFor('admin.fieldsets.index')]);
