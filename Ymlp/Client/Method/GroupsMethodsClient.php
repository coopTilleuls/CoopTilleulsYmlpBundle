<?php
namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\YmlpAPIClient;

class GroupsMethodsClient extends YmlpAPIClient
{
    public function getList()
    {
        return $this->call("Groups.GetList");
    }

    public function add($name = '')
    {
        $params = array();
        $params["GroupName"] = $name;
        
        return $this->call("Groups.Add", $params);
    }

    public function delete($id = '')
    {
        $params = array();
        $params["GroupId"] = $id;
        
        return $this->call("Groups.Delete", $params);
    }

    public function update($id = '', $name = '')
    {
        $params = array();
        $params["GroupId"] = $id;
        $params["GroupName"] = $name;
        
        return $this->call("Groups.Update", $params);
    }

    public function clear($id = '')
    {
        $params = array();
        $params["GroupId"] = $id;
        
        return $this->call("Groups.Empty", $params);
    }
}
