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
        $crawler = $client->request('GET','/login');
        $crawler = $client->submitForm('tests',[
            'email' => 'admin@afpa.fr',
            'password' => 'admin',
        ]);
        $crawler = $client->request('GET','/profil/');
        
        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('h1', 'Vos informations');
        
    }
    public function testNavigationDesRubriques(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $crawler = $client->clickLink('Instruments traditionnels');
        $crawler = $crawler->filter(".card");
        $this->assertEquals($crawler->count(),4);

    }

   // public function test
}
