# Very Simple Mailgun PHP Client

[![Build Status](https://travis-ci.org/bulldogcreative/mailgun.svg?branch=master)](https://travis-ci.org/bulldogcreative/mailgun)
[![Stable Release](https://packagist.org/packages/bulldog/mailgun)](https://img.shields.io/packagist/v/bulldog/mailgun.svg)
[![Dev Release](https://packagist.org/packages/bulldog/mailgun)](https://img.shields.io/packagist/vpre/bulldog/mailgun.svg)
[![License](https://github.com/bulldogcreative/mailgun/blob/master/LICENSE.md)](https://img.shields.io/github/license/bulldogcreative/mailgun.svg)
![](https://img.shields.io/twitter/url/https/github.com/bulldogcreative/mailgun.svg?style=social)

While Mailgun does an excellent job at implementing the adapter pattern, coding
to an interface, using PSR, and other things, this package does not. The curl
extension is the only requirement for this package. It is very small right
now; it's only one class and it can only send email.

I often found myself needing a quick, simple solution for sending email when
using PHP. I love Mailgun, but always felt like their PHP client included
too many features for what I needed to do. So I wrote a very limited API
client that only sends email.

## Installation

```sh
composer require bulldog/mailgun
```

## Usage

### Basic Usage

```php
<?php
$mg = new Mailgun('mg.your-domain.com', 'key-tops3cretk3y');
$mg->send('to.someone@example.com', 'from.someone@example.com', 'Important Subject', 'Text version of your message.');
```

### Advanced Usage

The fifth param for the send method accepts an array. In that array you can
add any of the params listed in the [Mailgun docs](https://documentation.mailgun.com/en/latest/api-sending.html#sending).
So if you need to *cc* someone, you would:

```php
<?php
$mg = new Mailgun('mg.your-domain.com', 'key-tops3cretk3y');
$mg->send('to.someone@example.com', 'from.someone@example.com', 'Important Subject', 'Text version of your message.', [
    'cc' => 'copy.someone@example.com',
]);
```

Or if you wanted to send an email email, you could do the following:

```php
<?php
$mg = new Mailgun('mg.your-domain.com', 'key-tops3cretk3y');
$mg->send('to.someone@example.com', 'from.someone@example.com', 'Important Subject', 'Text version of your message.', [
    'html' => '<html><head></head><body><h1>Hi there</h1></body></html>',
]);
```

You can add as many additional params as you need.

```php
<?php
$mg = new Mailgun('mg.your-domain.com', 'key-tops3cretk3y');
$mg->send('to.someone@example.com', 'from.someone@example.com', 'Important Subject', 'Text version of your message.', [
    'cc' => 'copy.someone@example.com',
    'v:important' => 'true',
    'o:tag' => 'client_x_email',
]);
```

https://documentation.mailgun.com/en/latest/api-sending.html#sending

## Compatibility

This package will work with, and tested on the following PHP versions:

* 5.5
* 5.6
* 7.0
* 7.1
* 7.2
* 7.3

You must have the curl extension installed to use this package.

## Contributions

Always welcome! Just keep it simple, please. Open an issue for discussion, then
fork the repo, create a topic branch, and do a pull request. We can figure 
everything else out later.
