<?php
namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\YmlpAPIClient;

class ArchiveMethodsClient extends YmlpAPIClient
{
    public function getFroms()
    {
        return $this->call("Newsletter.GetFroms");
    }

    public function addFrom($fromEmail = '', $fromName = '')
    {
        $params = array();
        $params["FromEmail"] = $fromEmail;
        $params["FromName"] = $fromName;
		
        return $this->call("Newsletter.AddFrom", $params);
    }
	
    public function deleteFrom($fromId = '')
    {
        $params = array();
        $params["FromID"] = $fromId;
		
        return $this->call("Newsletter.DeleteFrom", $params);
    }
	
    public function send($subject = '', $html = '', $text = '', $deliveryTime = '', $fromId = '', $trackOpens = '', $trackClicks = '', $testMessage = '', $groupId = '', $filterId = '', $combineFilters = '')
    {
        $params = array();
        $params["Subject"] = $subject;
        $params["HTML"] = $html;
        $params["Text"] = $text;
        $params["DeliveryTime"] = $deliveryTime;
        $params["FromID"] = $fromId;
        $params["TrackOpens"] = $trackOpens;
        $params["TrackClicks"] = $trackClicks;
        $params["TestMessage"] = $testMessage;
        $params["GroupID"] = $groupId;
        $params["FilterID"] = $filterId;
        $params["CombineFilters"] = $combineFilters;
        
        return $this->call("Newsletter.Send", $params);
    }
}