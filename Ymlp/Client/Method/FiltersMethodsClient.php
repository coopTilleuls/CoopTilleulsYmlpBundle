<?php
namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\YmlpAPIClient;

class FiltersMethodsClient extends YmlpAPIClient
{
    public function getList()
    {
        return $this->call("Filters.GetList");
    }

    public function add($name = '', $field = '', $operand = '', $value = '')
    {
        $params = array();
        $params["FilterName"] = $name;
        $params["Field"] = $field;
        $params["Operand"] = $operand;
        $params["Value"] = $value;
        
        return $this->call("Filters.Add", $params);
    }

    public function delete($filterId = '')
    {
        $params = array();
        $params["FilterId"] = $filterId;
        
        return $this->call("Filters.Delete", $params);
    }
}