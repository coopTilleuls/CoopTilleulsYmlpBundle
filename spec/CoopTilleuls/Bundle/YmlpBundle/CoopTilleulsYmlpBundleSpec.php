<?php

/*
 * This file is part of the CoopTilleulsYmlpBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CoopTilleuls\Bundle\YmlpBundle;

use PhpSpec\ObjectBehavior;

/**
 * CoopTilleulsYmlpBundle Spec.
 *
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class CoopTilleulsYmlpBundleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\Bundle\YmlpBundle\CoopTilleulsYmlpBundle');
        $this->shouldImplement('Symfony\Component\HttpKernel\Bundle\BundleInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\ContainerAwareInterface');
    }
}
