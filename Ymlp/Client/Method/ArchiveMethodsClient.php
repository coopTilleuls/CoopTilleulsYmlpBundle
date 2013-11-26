<?php
namespace CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\Method;

use CoopTilleuls\Bundle\YmlpBundle\Ymlp\Client\YmlpAPIClient;

class ArchiveMethodsClient extends YmlpAPIClient
{
    public function getList($page = '', $numberPerPage = '', $startDate = '', $stopDate = '', $sorting = '', $showTestMessages = '')
    {
        $params = array();
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["StartDate"] = $startDate;
        $params["StopDate"] = $stopDate;
        $params["Sorting"] = $sorting;
        $params["ShowTestMessages"] = $showTestMessages;
                
        return $this->call("Archive.GetList", $params);
    }

    public function getSummary($newsletterId = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        
        return $this->call("Archive.GetSummary", $params);
    }
	
    public function getContent($newsletterId = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        
        return $this->call("Archive.GetContent", $params);
    }
	
    public function getRecipients($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["Sorting"] = $sorting;
        
        return $this->call("Archive.GetRecipients", $params);
    }
	
    public function getDelivered($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["Sorting"] = $sorting;
		
        return $this->call("Archive.GetDelivered", $params);
    }
	
    public function getBounces($newsletterId = '', $showHardBounces = '', $showSoftBounces = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        $params["ShowHardBounces"] = $showHardBounces;
        $params["ShowSoftBounces"] = $showSoftBounces;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["Sorting"] = $sorting;
		
        return $this->call("Archive.GetBounces", $params);
    }
	
    public function getOpens($newsletterId = '', $uniqueOpens = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        $params["UniqueOpens"] = $uniqueOpens;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["Sorting"] = $sorting;
		
        return $this->call("Archive.GetOpens", $params);
    }
	
    public function getUnopened($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["Sorting"] = $sorting;
		
        return $this->call("Archive.GetUnopened", $params);
    }
	
    public function getTrackedLinks($newsletterId = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
		
        return $this->call("Archive.GetTrackedLinks", $params);
    }
	
    public function getClicks($newsletterId = '', $linkId = '', $uniqueClicks = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        $params["LinkID"] = $linkId;
        $params["UniqueClicks"] = $uniqueClicks;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["Sorting"] = $sorting;
		
        return $this->call("Archive.GetClicks", $params);
    }
	
    public function getForwards($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params["NewsletterID"] = $newsletterId;
        $params["Page"] = $page;
        $params["NumberPerPage"] = $numberPerPage;
        $params["Sorting"] = $sorting;
		
        return $this->call("Archive.GetForwards", $params);
    }
}