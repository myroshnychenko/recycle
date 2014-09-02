<?php

namespace Acme\DemoBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BatteriesPackTest extends WebTestCase
{
    public function testIndex()
    {
        //todo: Look to the link, remember, and try to write a test without copy-paste. https://github.com/strannik-06/recycle/blob/master/src/Stas/RecycleBundle/Tests/Controller/BatterypackControllerTest.php
        $client = static::createClient();

        $crawler = $client->request('GET', '/statistic');

        $this->assertEquals(2, $crawler->filter('tr')->count());

    }
}
