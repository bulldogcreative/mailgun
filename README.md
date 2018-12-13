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

## Contributions

Always welcome! Just keep it simple, please. Open an issue for discussion, then
fork the repo, create a topic branch, and do a pull request. We can figure 
everything else out later.
