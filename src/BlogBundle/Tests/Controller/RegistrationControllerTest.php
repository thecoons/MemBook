<?php

namespace BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testConfirmed()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/confirmed');
    }

}
