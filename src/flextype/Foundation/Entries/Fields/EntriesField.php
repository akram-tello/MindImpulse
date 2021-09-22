<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

use Atomastic\Arrays\Arrays;

if (flextype('registry')->get('flextype.settings.entries.fields.entries.fetch.enabled')) {
     flextype('emitter')->addListener('onEntriesFetchSingleHasResult', static function (): void {
         if (flextype('entries')->storage()->has('fetch.data.entries.fetch')) {
             // Get fetch.
             $original = flextype('entries')->storage()->get('fetch');
             $data = [];

             switch (flextype('registry')->get('flextype.settings.entries.fields.entries.fetch.result')) {
                 case 'toArray':
                     $resultTo = 'toArray';
                     break;

                 case 'toObject':
                 default:
                     $resultTo = 'copy';
                     break;
             }

             // Modify fetch.
             foreach (flextype('entries')->storage()->get('fetch.data.entries.fetch') as $field => $body) {

                 if (isset($body['options']['method']) &&
                     strpos($body['options']['method'], 'fetch') !== false &&
                     is_callable([flextype('entries'), $body['options']['method']])) {
                     $fetchFromCallbackMethod = $body['options']['method'];
                 } else {
                     $fetchFromCallbackMethod = 'fetch';
                 }

                 $result = isset($body['result']) && in_array($body['result'], ['toArray', 'toObject']) ? $body['result'] : $resultTo;

                 $data[$field] = flextype('entries')->{$fetchFromCallbackMethod}($body['id'],
                                                            isset($body['options']) ?
                                                                  $body['options'] :
                                                                  []);

                $data[$field] = ($data[$field] instanceof Arrays) ? $data[$field]->{$result}() : $data[$field];
             }

             // Save fetch.
             flextype('entries')->storage()->set('fetch.id', $original['id']);
             flextype('entries')->storage()->set('fetch.options', $original['options']);
             flextype('entries')->storage()->set('fetch.data', arrays($original['data'])->merge($data)->toArray());
         }
     });
}
