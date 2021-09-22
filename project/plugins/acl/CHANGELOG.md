<a name="1.10.0"></a>
# [1.10.0](https://github.com/flextype-plugins/acl) (2021-01-14)

### Features

* **core** update code base for new Flextype 0.9.16

<a name="1.9.0"></a>
# [1.9.0](https://github.com/flextype-plugins/acl) (2021-01-07)

### Features

* **core** update code base for new Icon 2.0.0

<a name="1.8.0"></a>
# [1.8.0](https://github.com/flextype-plugins/acl) (2021-01-03)

### Features

* **core** update code base for new Flextype 0.9.15

<a name="1.7.1"></a>
# [1.7.1](https://github.com/flextype-plugins/acl) (2020-12-29)

### Bug Fixes

* **composer** fix dependencies

<a name="1.7.0"></a>
# [1.7.0](https://github.com/flextype-plugins/acl) (2020-12-29)

### Features

* **core** update code base for new Flextype 0.9.14
* **core** Moving to PHP 7.4
* **core** use new TWIG Plugin 1.7.0

<a name="1.6.0"></a>
# [1.6.0](https://github.com/flextype-plugins/acl) (2020-12-20)

### Features

* **core** update code base for new Flextype 0.9.13

<a name="1.5.0"></a>
# [1.5.0](https://github.com/flextype-plugins/acl) (2020-12-06)

### Features

* **core** update code base for new Flextype 0.9.12

<a name="1.4.0"></a>
# [1.4.0](https://github.com/flextype-plugins/acl) (2020-08-25)

### Features

* **core** update code base for new Flextype 0.9.11

<a name="1.3.0"></a>
# [1.3.0](https://github.com/flextype-plugins/acl) (2020-08-19)

### Features

* **core** update code base for new Flextype 0.9.10

<a name="1.2.1"></a>
# [1.2.1](https://github.com/flextype-plugins/acl) (2020-08-05)

### Features

* **core** fixes for new Twig 3

<a name="1.2.0"></a>
# [1.2.0](https://github.com/flextype-plugins/acl) (2020-08-05)

### Features

* **core** update code base for new Flextype 0.9.9

<a name="1.1.0"></a>
# [1.1.0](https://github.com/flextype-plugins/acl) (2020-06-23)

General code update and refactoring with a breaking changes

### Features

* **middlewares**: add new middleware AclIsUserLoggedInEmailInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInUuidtInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInRolesInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInEmailNotInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInUuidNotInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInRolesNotInMiddleware
* **middlewares**: add new middleware AclIsUserNotLoggedInMiddleware

* **acl**: add new method isUserLoggedInRolesIn()
* **acl**: add new method isUserLoggedInEmailIn()
* **acl**: add new method isUserLoggedInUuidIn()
* **acl**: add new method getUserLoggedInEmail()
* **acl**: add new method getUserLoggedInRoles()
* **acl**: add new method getUserLoggedInUuid()
* **acl**: add new method setUserLoggedIn(bool $logged_in)
* **acl**: add new method setUserLoggedInUuid(string $uuid)
* **acl**: add new method setUserLoggedInEmail(string $email)
* **acl**: add new method setUserLoggedInRoles(string $roles)

and a lot of more, read README.MD with a new doc

<a name="1.0.0"></a>
# [1.0.0](https://github.com/flextype-plugins/acl) (2020-06-21)
* Initial Release
