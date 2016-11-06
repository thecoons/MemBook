<?php

namespace BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testCreatepost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createPost');
    }

    public function testShowpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showPost');
    }

    public function testDeletepost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletePost');
    }

    public function testListpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listPost');
    }

}
