<?php

namespace Bulldog;

interface MailerInterface
{
    public function send($to, $from, $subject, $text, $parameters = []);
}
