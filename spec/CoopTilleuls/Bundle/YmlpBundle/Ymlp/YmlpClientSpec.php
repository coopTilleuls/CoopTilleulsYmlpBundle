<?php

namespace spec\CoopTilleuls\Bundle\YmlpBundle\Ymlp;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\EntityEnclosingRequestInterface;
use Guzzle\Http\Message\Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class YmlpClientSpec extends ObjectBehavior
{
    function let(
        ClientInterface $client,
        EntityEnclosingRequestInterface $requestOk,
        Response $responseOk
    )
    {
        $apiUrl = 'http://example.com';
        $apiKey = 'KEY';
        $apiUsername = 'username';

        $responseOk->json()->willReturn(array ('Code' => 0));

        $requestOk->addPostFields(Argument::type('array'))->willReturn($requestOk);
        $requestOk->send()->willReturn($responseOk);

        $client->post(Argument::type('string'))->willReturn($requestOk);

        $this->beConstructedWith($apiUrl, $apiKey, $apiUsername, $client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\Bundle\YmlpBundle\Ymlp\YmlpClient');
    }

    function it_sends_commands()
    {
        $this->call('Ping')->shouldBe(array ('Code' => 0));
    }
}
