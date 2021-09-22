<?php

declare(strict_types=1);

namespace Flextype\Plugin\Jquery;

$_admin_js = (flextype('registry')->has('assets.admin.js')) ? flextype('registry')->get('assets.admin.js') : [];
$_site_js  = (flextype('registry')->has('assets.site.js')) ? flextype('registry')->get('assets.site.js') : [];

if (flextype('registry')->get('plugins.jquery.settings.load_on_admin')) {
    flextype('registry')->set('assets.admin.js',
                           array_merge($_admin_js, ['project/plugins/jquery/assets/dist/js/jquery.min.js']));
}

if (flextype('registry')->get('plugins.jquery.settings.load_on_site')) {
    flextype('registry')->set('assets.site.js',
                          array_merge($_site_js, ['project/plugins/jquery/assets/dist/js/jquery.min.js']));
}
