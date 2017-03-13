<?php

/*
 * This file is part of the CoopTilleulsYmlpBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception;

use PhpSpec\ObjectBehavior;

/**
 * YmlpException Spec.
 *
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class YmlpExceptionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\Bundle\YmlpBundle\Ymlp\Exception\YmlpException');
        $this->shouldBeAnInstanceOf('\Exception');
    }
}
