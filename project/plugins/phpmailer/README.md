<h1 align="center">PHP Mailer plugin for <a href="https://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/phpmailer/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/phpmailer.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/phpmailer"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/phpmailer"><img src="https://img.shields.io/github/downloads/flextype-plugins/phpmailer/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.16-green.svg" alt="Flextype"></a> <a href=""><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

## Features

* The world's most popular code for sending email from PHP!
* Integrated SMTP support - send without a local mail server
* Send emails with multiple To, CC, BCC and Reply-to addresses
* Multipart/alternative emails for mail clients that do not read HTML email
* Add attachments, including inline
* Support for UTF-8 content and 8bit, base64, binary, and quoted-printable encodings
* SMTP authentication with LOGIN, PLAIN, CRAM-MD5, and XOAUTH2 mechanisms over SSL and SMTP+STARTTLS transports
* Validates email addresses automatically
* Protect against header injection attacks
* Error messages in over 50 languages!
* DKIM and S/MIME signing support
* Compatible with PHP 5.5 and later
* Namespaced to prevent name clashes
* Much more!

## Dependencies

The following dependencies need to be downloaded and installed for PHP Mailer Plugin.

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.16 | [download](https://github.com/flextype/flextype/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/phpmailer`
3. Download PHP Mailer Plugin and unzip plugin content to the folder `/project/plugins/phpmailer`

## Documentation

### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 100 | phpmailer plugin priority |

[Official PHP Mailer documentation](https://github.com/PHPMailer/PHPMailer)

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/phpmailer/blob/master/LICENSE.txt)
Copyright (c) 2021 [Sergey Romanenko](https://github.com/Awilum)
