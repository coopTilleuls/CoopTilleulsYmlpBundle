<?php
namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\YmlpAPIClient;

class ContactsMethodsClient extends YmlpAPIClient
{
    public function add($email = '', array $otherFields = array(), $groupId = '', $overruleUnsubscribedBounced = '')
    {
        $params = array();
        $params["Email"] = $email;

        foreach ($otherFields as $key => $value) {
            $params[$key] = $value;
        }
        
        $params["GroupID"] = $groupId;
        $params["OverruleUnsubscribedBounced"]  = $overruleUnsubscribedBounced;
        
        return $this->call("Contacts.Add", $params);
    }

    public function unsubscribe($email = '')
    {
        $params = array();
        $params["Email"] = $email;
        
        return $this->call("Contacts.Unsubscribe", $params);
    }

    public function delete($email = '', $groupId = '')
    {
        $params = array();
        $params["Email"] = $email;
        $params["GroupID"] = $groupId;
        
        return $this->call("Contacts.Delete", $params);
    }

    public function getContact($email = '')
    {
        $params = array();
        $params["Email"] = $email;
        
        return $this->call("Contacts.GetContact", $params);
    }

    public function getList($groupId = '', $fieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '')
    {
        $params = array();
        $params["GroupID"] = $groupId;
        $params["FieldID"] = $fieldId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["StartDate"] = $startDate;
        $params["StopDate"] = $stopDate;
        
        return $this->call("Contacts.GetList", $params);
    }

    public function getUnsubscribed($fieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '')
    {
        $params = array();
        $params["FieldID"] = $fieldId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["StartDate"] = $startDate;
        $params["StopDate"] = $stopDate;
        
        return $this->call("Contacts.GetUnsubscribed", $params);
    }

    public function getDeleted($fieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '')
    {
        $params = array();
        $params["FieldID"] = $fieldId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["StartDate"] = $startDate;
        $params["StopDate"] = $stopDate;
        
        return $this->call("Contacts.GetDeleted", $params);
    }

    public function getBounced($dieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '')
    {
        $params = array();
        $params["FieldID"] = $fieldId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["StartDate"] = $startDate;
        $params["StopDate"] = $stopDate;
        
        return $this->call("Contacts.GetBounced", $params);
    }
}
