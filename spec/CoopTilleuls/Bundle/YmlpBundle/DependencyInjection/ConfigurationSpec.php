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

/**
 * Configuration Spec.
 *
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class ConfigurationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\Bundle\YmlpBundle\DependencyInjection\Configuration');
        $this->shouldImplement('Symfony\Component\Config\Definition\ConfigurationInterface');
    }

    public function it_creates_config_tree_builder()
    {
        $this->getConfigTreeBuilder()->shouldHaveType('Symfony\Component\Config\Definition\Builder\TreeBuilder');
    }
}
