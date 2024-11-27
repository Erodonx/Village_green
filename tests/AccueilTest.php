<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AccueilTest extends WebTestCase
{
    public function testAccueilPage()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    public function testh1LoginPage(): void
    {
        $client = static::createClient();
        $client->request('GET','/login');
        $this->assertSelectorTextContains('h1','Veuillez vous connecter');

    }

   // public function test
}
