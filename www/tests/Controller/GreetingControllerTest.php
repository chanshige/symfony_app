<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GreetingControllerTest extends WebTestCase
{
    public function testGreet(): void
    {
        $client = static::createClient();
        $client->setServerParameter('HTTP_ACCEPT', 'application/json');

        $client->request('GET', '/greeting', ['name' => 'chanshige']);

        $this->assertResponseStatusCodeSame(200);
        $this->assertSame('{"greeting":"Hello chanshige"}', $client->getResponse()->getContent());
    }

    public function testGreetFail(): void
    {
        $client = static::createClient();
        $client->setServerParameter('HTTP_ACCEPT', 'application/json');

        $client->request('GET', '/greeting', ['name' => null]);
        $this->assertResponseStatusCodeSame(404);
    }
}
