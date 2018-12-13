<?php

use Bulldog\Mailgun;

class MailgunTest extends \PHPUnit_Framework_TestCase
{
    public function testIsInstanceOf()
    {
        $mg = new Mailgun('mg.example.com', 'key-1234');
        $this->assertInstanceOf(Mailgun::class, $mg);
    }

    public function testAssertNullOnResponse()
    {
        $mg = new Mailgun('mg.example.com', 'key-1234');
        $mg->send('to', 'from', 'subject', 'text');
        $this->assertNull($mg->response());
    }
}
