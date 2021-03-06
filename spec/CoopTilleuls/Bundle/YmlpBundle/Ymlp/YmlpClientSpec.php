<?php

/*
 * This file is part of the CoopTilleulsYmlpBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CoopTilleuls\Bundle\YmlpBundle\Ymlp;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * YmlpClient Spec.
 *
 * @author Kévin Dunglas <kevin@les-tilleuls.coop>
 */
class YmlpClientSpec extends ObjectBehavior
{
    const API_URL = 'http://example.com';
    const API_KEY = 'S3CR3TK3Y';
    const API_USERNAME = 'username';

    public function let(ClientInterface $client, ResponseInterface $response)
    {
        $client->post(Argument::type('string'), Argument::type('array'))->will(function ($args) use ($response) {
            if ('Error' === $args[0]) {
                $response->json()->willReturn(['Code' => 1, 'Output' => 'error']);
            } else {
                $response->json()->willReturn(['Code' => 0]);
            }

            return $response;
        });

        $this->beConstructedWith(self::API_URL, self::API_KEY, self::API_USERNAME, $client);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\Bundle\YmlpBundle\Ymlp\YmlpClient');
    }

    public function it_sends_commands()
    {
        $this->call('Ping')->shouldBe(['Code' => 0]);
    }

    public function it_throws_error()
    {
        $this->shouldThrow('\CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException')->duringCall('Error');
    }
}
