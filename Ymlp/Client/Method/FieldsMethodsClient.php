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
 * FieldsMethodsClient
 * 
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class FieldsMethodsClient extends YmlpAPIClient
{
    /**
     * Lists the fields in your account along with the field ID, the alias, the default value and the "Correct Uppercase" value for each field.
     * 
     * @return mixed
     */
    public function getList()
    {
        return $this->call('Fields.GetList');
    }
    
    /**
     * Creates a new field.
     * 
     * @param string $name Label to use for the new field
     * @param string $alias Alias for the new field, defaults to the field name
     * @param string $defaultValue (optional)
     * @param string $correctUppercase "0" or "1" (optional, default to 0)
     * @return mixed
     */
    public function add($name = '', $alias = '', $defaultValue = '', $correctUppercase = '')
    {
        $params = array();
        $params['FieldName'] = $name;
        $params['Alias'] = $alias;
        $params['DefaultValue'] = $defaultValue;
        $params['CorrectUppercase'] = $correctUppercase;
        
        return $this->call('Fields.Add', $params);
    }
    
    /**
     * Removes a field based on a given field ID.
     * 
     * @param string $id ID of the field
     * @return mixed
     */
    public function delete($id = '')
    {
        $params = array();
        $params['FieldId'] = $id;
        
        return $this->call('Fields.Delete', $params);
    }

    /**
     * Is used to update the properties of a field.
     * 
     * @param string $id ID of the field
     * @param string $name New label to use for this field (optional)
     * @param string $alias New alias to use for this field (optional)
     * @param string $defaultValue New default value to use for this field (optional)
     * @param string $correctUppercase New "Correct Uppercase" value to use for this field ("0" or "1", optional)
     * @return mixed
     */
    public function update($id = '', $name = '', $alias = '', $defaultValue = '', $correctUppercase = '')
    {
        $params = array();
        $params['FieldId'] = $id;
        $params['FieldName'] = $name;
        $params['Alias'] = $alias;
        $params['DefaultValue'] = $defaultValue;
        $params['CorrectUppercase'] = $correctUppercase;
        
        return $this->call('Fields.Update', $params);
    }
}
