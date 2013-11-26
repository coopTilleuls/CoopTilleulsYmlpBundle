<?php

/*
 * This file is part of the CoopTilleulsYmlpBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\YmlpAPIClient;

/**
 * FiltersMethodsClient
 * 
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class FiltersMethodsClient extends YmlpAPIClient
{
    /**
     * Lists the filters in your account along with the filter ID, the filter name, the criterion description and the field-operand-value combination for each filter.
     * 
     * @param string $overruleDeleted Whether or not to include deleted filters in the output (optional): 0 (default) or 1
     * @return mixed
     */
    public function getList($overruleDeleted = '')
    {
        $params['OverruleDeleted'] = $overruleDeleted;
        
        return $this->call('Filters.GetList', $params);
    }

    /**
     * Creates a new filter.
     * 
     * @param string $name Label to use for the new filter
     * @param string $field FieldX where X is the ID of the field, one of the built-in fields (IP,Browser,OperatingSystem,Date) or Contact
     * @param string $operand Equals, DoesNotEqual, Contains, DoesNotContain, StartsWith, EndsWith, IsEmpty, IsNotEmpty, SmallerThen, GreaterThen, Before, After, IsIn, IsNotIn (Before & After can only be used in combination with Date as field; IsIn & IsNotIn can only be used in combination with Contact as field)
     * @param string $value Some characters or a word (ex: 'tilleuls' to create a filter that selects Tilleuls email addresses), a date (YYYY-MM-DD, e.g.: 2020-05-31) in combination with Date as field & Before/Afer as operand, or a GroupId in combination with Contact as field and IsIn/IsNotIn as operand
     * @return mixed
     */
    public function add($name = '', $field = '', $operand = '', $value = '')
    {
        $params = array();
        $params['FilterName'] = $name;
        $params['Field'] = $field;
        $params['Operand'] = $operand;
        $params['Value'] = $value;
        
        return $this->call('Filters.Add', $params);
    }
    
    /**
     * Removes a filter based on a given filter ID.
     * 
     * @param string $filterId ID of the filter
     * @return mixed
     */
    public function delete($filterId = '')
    {
        $params = array();
        $params['FilterId'] = $filterId;
        
        return $this->call('Filters.Delete', $params);
    }
}