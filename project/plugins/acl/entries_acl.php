<?php

namespace Flextype\Plugin\Acl;

flextype('emitter')->addListener('onEntriesFetchSingleHasResult', function() {

    // Get current entry
    $entry = flextype('entries')->storage()->get('fetch.data');

    // Set ACL rules based on accounts uuids
    if (isset($entry['acl']['accounts']['uuids'])) {
        if (!flextype('acl')->isUserLoggedInUuidsIn($entry['acl']['accounts']['uuids'])) {
            flextype('entries')->storage()->set('fetch.data', []);
        }
    }

    // Set ACL rules based on accounts emails
    if (isset($entry['acl']['accounts']['emails'])) {
        if (!flextype('acl')->isUserLoggedInEmailsIn($entry['acl']['accounts']['emails'])) {
            flextype('entries')->storage()->set('fetch.data', []);
        }
    }

    // Set ACL rules based on accounts roles
    if (isset($entry['acl']['accounts']['roles'])) {
        if (!flextype('acl')->isUserLoggedInRolesIn($entry['acl']['accounts']['roles'])) {
            flextype('entries')->storage()->set('fetch.data', []);
        }
    }
});
