<?php

namespace Acme\DemoBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BatteriesPackTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/statistic');

        $this->assertEquals(2, $crawler->filter('tr')->count());

    }
}
