<?php

declare(strict_types=1);

use Flextype\Plugin\Acl\Middlewares\AclIsUserLoggedInMiddleware;
use Flextype\Plugin\Acl\Middlewares\AclIsUserLoggedInRolesInMiddleware;
use Flextype\Plugin\FormAdmin\Controllers\FormAdminFieldsetsController;

flextype()->group('/' . $admin_route, function () {
    flextype()->get('/fieldsets', FormAdminFieldsetsController::class . ':index')->setName('admin.fieldsets.index');
    flextype()->get('/fieldsets/add', FormAdminFieldsetsController::class . ':add')->setName('admin.fieldsets.add');
    flextype()->post('/fieldsets/add', FormAdminFieldsetsController::class . ':addProcess')->setName('admin.fieldsets.addProcess');
    flextype()->get('/fieldsets/edit', FormAdminFieldsetsController::class . ':edit')->setName('admin.fieldsets.edit');
    flextype()->post('/fieldsets/edit', FormAdminFieldsetsController::class . ':editProcess')->setName('admin.fieldsets.editProcess');
    flextype()->get('/fieldsets/rename', FormAdminFieldsetsController::class . ':rename')->setName('admin.fieldsets.rename');
    flextype()->post('/fieldsets/rename', FormAdminFieldsetsController::class . ':renameProcess')->setName('admin.fieldsets.renameProcess');
    flextype()->post('/fieldsets/duplicate', FormAdminFieldsetsController::class . ':duplicateProcess')->setName('admin.fieldsets.duplicateProcess');
    flextype()->post('/fieldsets/delete', FormAdminFieldsetsController::class . ':deleteProcess')->setName('admin.fieldsets.deleteProcess');

})->add(new AclIsUserLoggedInMiddleware(['redirect' => 'admin.accounts.login']))
  ->add(new AclIsUserLoggedInRolesInMiddleware(['redirect' => (flextype()->getContainer()->acl->isUserLoggedIn() ? 'admin.accounts.no-access' : 'admin.accounts.login'),
                                                'roles' => 'admin']))
  ->add('csrf');
