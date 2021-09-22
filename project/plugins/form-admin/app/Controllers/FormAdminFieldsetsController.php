<?php

declare(strict_types=1);

namespace Flextype\Plugin\FormAdmin\Controllers;

use Flextype\Component\Arrays\Arrays;
use function date;
use function Flextype\Component\I18n\__;

class FormAdminFieldsetsController
{
    public function index($request, $response)
    {
        return flextype('twig')->render(
            $response,
            'plugins/form-admin/templates/extends/fieldsets/index.html',
            [
                'menu_item' => 'fieldsets',
                'fieldsets_list' => flextype('fieldsets')->fetchCollection(),
                'links' =>  [
                    'fieldsets' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.index'),
                        'title' => __('form_admin_fieldsets'),
                        'active' => true
                    ],
                ],
                'buttons' => [
                    'fieldsets_add' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.add'),
                        'title' => __('form_admin_create_new_fieldset')
                    ]
                ],
            ]
        );
    }

    public function add($request, $response)
    {
        return flextype('twig')->render(
            $response,
            'plugins/form-admin/templates/extends/fieldsets/add.html',
            [
                'menu_item' => 'fieldsets',
                'fieldsets_list' => flextype('fieldsets')->fetchCollection(),
                'links' =>  [
                    'fieldsets' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.index'),
                        'title' => __('form_admin_fieldsets'),
                    ],
                    'fieldsets_add' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.add'),
                        'title' => __('form_admin_create_new_fieldset'),
                        'active' => true
                    ],
                ],
            ]
        );
    }

    public function addProcess($request, $response)
    {
        // Get data from POST
        $post_data = $request->getParsedBody();

        Arrays::delete($post_data, 'csrf_name');
        Arrays::delete($post_data, 'csrf_value');

        $id   = flextype('slugify')->slugify($post_data['id']);
        $data = [
            'title' => $post_data['title'],
            'default_field' => 'title',
            'icon' => ['name' => $post_data['icon_name'],
                       'set' => $post_data['icon_set']],
            'hide' => (bool) $post_data['hide'],
            'form' => [
                'tabs' => [
                    'main' => [
                        'title' => 'admin_main',
                        'form' => [
                            'fields' => [
                                'title' => [
                                    'title' => 'admin_title',
                                    'type' => 'text',
                                    'size' => '12',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        if (flextype('fieldsets')->create($id, $data)) {
            flextype('flash')->addMessage('success', __('form_admin_message_fieldset_created'));
        } else {
            flextype('flash')->addMessage('error', __('form_admin_message_fieldset_was_not_created'));
        }

        if (isset($post_data['create-and-edit'])) {
            return $response->withRedirect(flextype('router')->pathFor('admin.fieldsets.edit') . '?id=' . $id);
        }

        return $response->withRedirect(flextype('router')->pathFor('admin.fieldsets.index'));
    }

    public function edit($request, $response)
    {
        return flextype('twig')->render(
            $response,
            'plugins/form-admin/templates/extends/fieldsets/edit.html',
            [
                'menu_item' => 'fieldsets',
                'id' => $request->getQueryParams()['id'],
                'data' => flextype('serializers')->yaml()->encode(flextype('fieldsets')->fetchSingle($request->getQueryParams()['id'])),
                'links' =>  [
                    'fieldsets' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.index'),
                        'title' => __('form_admin_fieldsets'),
                    ],
                    'fieldsets_editor' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.edit') . '?id=' . $request->getQueryParams()['id'],
                        'title' => __('form_admin_editor'),
                        'active' => true
                    ],
                ],
                'buttons' => [
                    'save_entry' => [
                        'type' => 'action',
                        'link' => 'javascript:;',
                        'title' => __('form_admin_save')
                    ],
                ],
            ]
        );
    }

    public function editProcess($request, $response)
    {
        $id   = $request->getParsedBody()['id'];
        $data = $request->getParsedBody()['data'];

        if (flextype('fieldsets')->update($request->getParsedBody()['id'], flextype('serializers')->yaml()->decode($data))) {
            flextype('flash')->addMessage('success', __('form_admin_message_fieldset_saved'));
        } else {
            flextype('flash')->addMessage('error', __('form_admin_message_fieldset_was_not_saved'));
        }

        return $response->withRedirect(flextype('router')->pathFor('admin.fieldsets.edit') . '?id=' . $id);
    }

    public function rename($request, $response)
    {
        return flextype('twig')->render(
            $response,
            'plugins/form-admin/templates/extends/fieldsets/rename.html',
            [
                'menu_item' => 'fieldsets',
                'id' => $request->getQueryParams()['id'],
                'links' =>  [
                    'fieldsets' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.index'),
                        'title' => __('form_admin_fieldsets'),
                    ],
                    'fieldsets_rename' => [
                        'link' => flextype('router')->pathFor('admin.fieldsets.rename') . '?id=' . $request->getQueryParams()['id'],
                        'title' => __('form_admin_rename'),
                        'active' => true
                    ],
                ],
            ]
        );
    }

    public function renameProcess($request, $response)
    {
        if (flextype('fieldsets')->rename($request->getParsedBody()['fieldset-id-current'], $request->getParsedBody()['id'])) {
            flextype('flash')->addMessage('success', __('form_admin_message_fieldset_renamed'));
        } else {
            flextype('flash')->addMessage('error', __('form_admin_message_fieldset_was_not_renamed'));
        }

        return $response->withRedirect(flextype('router')->pathFor('admin.fieldsets.index'));
    }

    public function deleteProcess($request, $response)
    {
        if (flextype('fieldsets')->delete($request->getParsedBody()['fieldset-id'])) {
            flextype('flash')->addMessage('success', __('form_admin_message_fieldset_deleted'));
        } else {
            flextype('flash')->addMessage('error', __('form_admin_message_fieldset_was_not_deleted'));
        }

        return $response->withRedirect(flextype('router')->pathFor('admin.fieldsets.index'));
    }

    public function duplicateProcess($request, $response)
    {
        if (flextype('fieldsets')->copy($request->getParsedBody()['fieldset-id'], $request->getParsedBody()['fieldset-id'] . '-duplicate-' . date('Ymd_His'))) {
            flextype('flash')->addMessage('success', __('form_admin_message_fieldset_duplicated'));
        } else {
            flextype('flash')->addMessage('error', __('form_admin_message_fieldset_was_not_duplicated'));
        }

        return $response->withRedirect(flextype('router')->pathFor('admin.fieldsets.index'));
    }
}
