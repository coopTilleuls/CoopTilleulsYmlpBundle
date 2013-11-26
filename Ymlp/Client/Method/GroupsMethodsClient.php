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
 * GroupsMethodsClient
 * 
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class GroupsMethodsClient extends YmlpAPIClient
{  
    /**
     * Lists the groups in your account, along with their group IDs and the number of contacts in each group.
     * 
     * @return mixed
     */
    public function getList()
    {
        return $this->call('Groups.GetList');
    }
    
    /**
     * Creates a new group.
     * 
     * @param string $name Label to use for the new group
     * @return mixed
     */
    public function add($name = '')
    {
        $params = array();
        $params['GroupName'] = $name;
        
        return $this->call('Groups.Add', $params);
    }

    /**
     * Removes a group based on a given group ID.
     * 
     * @param string $id ID of the group
     * @return mixed
     */
    public function delete($id = '')
    {
        $params = array();
        $params['GroupId'] = $id;
        
        return $this->call('Groups.Delete', $params);
    }

    /**
     * Is used to update the properties of a group.
     * 
     * @param string $id ID of the group
     * @param string $name New label to use for this group
     * @return mixed
     */
    public function update($id = '', $name = '')
    {
        $params = array();
        $params['GroupId'] = $id;
        $params['GroupName'] = $name;
        
        return $this->call('Groups.Update', $params);
    }
    
    /**
     * Is used to remove all contacts in a group.
     * 
     * @param string $id ID of the group
     * @return mixed
     */
    public function clear($id = '')
    {
        $params = array();
        $params['GroupId'] = $id;
        
        return $this->call('Groups.Empty', $params);
    }
}
