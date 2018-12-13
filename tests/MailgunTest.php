<?php

use Bulldog\Mailgun;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class MailgunTest extends PHPUnitTestCase
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
