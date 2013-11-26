<?php
namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\YmlpAPIClient;

class FieldsMethodsClient extends YmlpAPIClient
{
    public function getList()
    {
        return $this->call("Fields.GetList");
    }

    public function add($name = '', $alias = '', $defaultValue = '', $correctUppercase = '')
    {
        $params = array();
        $params["FieldName"] = $name;
        $params["Alias"] = $alias;
        $params["DefaultValue"] = $defaultValue;
        $params["CorrectUppercase"] = $correctUppercase;
        
        return $this->call("Fields.Add", $params);
    }

    public function delete($id = '')
    {
        $params = array();
        $params["FieldId"] = $id;
        
        return $this->call("Fields.Delete", $params);
    }

    public function update($id = '', $name = '', $alias = '', $defaultValue = '', $correctUppercase = '')
    {
        $params = array();
        $params["FieldId"] = $id;
        $params["FieldName"] = $name;
        $params["Alias"] = $alias;
        $params["DefaultValue"] = $defaultValue;
        $params["CorrectUppercase"] = $correctUppercase;
        
        return $this->call("Fields.Update", $params);
    }
}
