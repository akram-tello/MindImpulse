<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */


if (flextype('registry')->get('flextype.settings.entries.fields.id.enabled')) {
    flextype('emitter')->addListener('onEntriesFetchSingleHasResult', static function (): void {
        if (flextype('entries')->storage()->get('fetch.data.id') !== null) {
            return;
        }

        flextype('entries')->storage()->set('fetch.data.id', (string) strings(flextype('entries')->storage()->get('fetch.id'))->trimSlashes());
    });
}
