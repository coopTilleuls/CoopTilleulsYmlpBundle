<?php

/*
 * This file is part of the CoopTilleulsYmlpBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CoopTilleuls\Bundle\YmlpBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * CoopTilleulsYmlpExtension Spec.
 *
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class CoopTilleulsYmlpExtensionSpec extends ObjectBehavior
{
    const API_URL = 'https://www.ymlp.com/api/';
    const API_KEY = 'YOURSECRETAPIKEY1234';
    const API_USERNAME = 'tilleuls';
    const CLIENT_CLASS = 'CoopTilleuls\Bundle\YmlpBundle\Ymlp\YmlpClient';

    public function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\Bundle\YmlpBundle\DependencyInjection\CoopTilleulsYmlpExtension');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ConfigurationExtensionInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ExtensionInterface');
    }

    public function it_loads(ContainerBuilder $container, ParameterBagInterface $parameterBag)
    {
        $parameterBag->add(['coop_tilleuls_ymlp.client.class' => self::CLIENT_CLASS])->shouldBeCalled();

        $container->getParameterBag()->willReturn($parameterBag)->shouldBeCalled();
        $container->setParameter('coop_tilleuls_ymlp.api_url', self::API_URL)->shouldBeCalled();
        $container->setParameter('coop_tilleuls_ymlp.api_key', self::API_KEY)->shouldBeCalled();
        $container->setParameter('coop_tilleuls_ymlp.api_username', self::API_USERNAME)->shouldBeCalled();
        $container->hasExtension('http://symfony.com/schema/dic/services')->shouldBeCalled();
        $container->addResource(Argument::type('Symfony\Component\Config\Resource\FileResource'))->shouldBeCalled();
        $container->setDefinition('coop_tilleuls_ymlp.client', Argument::type('Symfony\Component\DependencyInjection\Definition'))->shouldBeCalled();

        $configs = [
            [
                'api_url' => self::API_URL,
                'api_key' => self::API_KEY,
                'api_username' => self::API_USERNAME,
            ],
        ];

        $this->load($configs, $container);
    }
}
