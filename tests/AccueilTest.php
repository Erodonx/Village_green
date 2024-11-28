<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AccueilTest extends WebTestCase
{
    /*public function testAccueilPage()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }*/
    public function testh1LoginPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET','/login');
        $crawler = $client->submitForm('tests',[
            'email' => 'robert@afpa.fr',
            'password' => 'robert',
        ]);
        $crawler = $client->request('GET','/profil/');
        
        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('h1', 'Vos informations');
        
    }

   // public function test
}
