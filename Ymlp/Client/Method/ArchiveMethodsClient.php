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
 * ArchiveMethodsClient
 * 
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class ArchiveMethodsClient extends YmlpAPIClient
{
    /**
     * Returns a list of newsletters in the archives of your account.
     * 
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of newsletters per result page (optional, default: 10)
     * @param string $startDate Only return newsletters that were sent after this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $stopDate Only return newsletters that were sent before this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $sorting Sorting order of the returned newsletters, either ascending (oldest first) or descending (newest first) (optional): Ascending (default) or Descending
     * @param string $showTestMessages Whether or not to include test messages in the output (optional): 0 (default) or 1
     * @return mixed
     */
    public function getList($page = '', $numberPerPage = '', $startDate = '', $stopDate = '', $sorting = '', $showTestMessages = '')
    {
        $params = array();
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['StartDate'] = $startDate;
        $params['StopDate'] = $stopDate;
        $params['Sorting'] = $sorting;
        $params['ShowTestMessages'] = $showTestMessages;
                
        return $this->call('Archive.GetList', $params);
    }

    /**
     * Returns all available information regarding a newsletter, except for its content.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @return mixed
     */
    public function getSummary($newsletterId = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        
        return $this->call('Archive.GetSummary', $params);
    }

    /**
     * Returns the content of email was sent to.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @return mixed
     */
    public function getContent($newsletterId = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        
        return $this->call('Archive.GetContent', $params);
    }
    
    /**
     * Returns the list of email addresses a newsletter was sent to.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of email addresses per result page (optional, default: 100)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getRecipients($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['Sorting'] = $sorting;
        
        return $this->call('Archive.GetRecipients', $params);
    }
    
    /**
     * Returns the list of email addresses a newsletter was successfully delivered to.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of email addresses per result page (optional, default: 100)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getDelivered($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['Sorting'] = $sorting;
		
        return $this->call('Archive.GetDelivered', $params);
    }

    /**
     * Returns the bouncebacks for a newsletter.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @param string $showHardBounces Whether to include email addresses that returned a permanent error or "hard" bounceback (optional): 1 (default) or 0
     * @param string $showSoftBounces Whether to include email addresses that returned a temporary error or "soft" bounceback (optional): 1 (default) or 0
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of email addresses that returned a bounceback per result page (optional, default: 100)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getBounces($newsletterId = '', $showHardBounces = '', $showSoftBounces = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        $params['ShowHardBounces'] = $showHardBounces;
        $params['ShowSoftBounces'] = $showSoftBounces;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['Sorting'] = $sorting;
		
        return $this->call('Archive.GetBounces', $params);
    }
	
    /**
     * Returns the list of email addresses that opened a newsletter.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @param string $uniqueOpens Whether or not to list only the first open from an email address, if that email address opened multiple times (optional): 0 (default) or 1
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of email addresses per result page (optional, default: 100)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getOpens($newsletterId = '', $uniqueOpens = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        $params['UniqueOpens'] = $uniqueOpens;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['Sorting'] = $sorting;
		
        return $this->call('Archive.GetOpens', $params);
    }
	
    /**
     * Returns the list of email addresses that did not open a newsletter.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of email addresses per result page (optional, default: 100)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getUnopened($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['Sorting'] = $sorting;
		
        return $this->call('Archive.GetUnopened', $params);
    }
	
    /**
     * Returns the list of tracked links for a newsletter that was sent with click tracking.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @return mixed
     */
    public function getTrackedLinks($newsletterId = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
		
        return $this->call('Archive.GetTrackedLinks', $params);
    }
	
    /**
     * Returns the list of clicks for a newsletter that was sent with click tracking, either for all links in the newsletter or for a given link.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @param string $linkId ID of a link if you want to limit the results to the clicks on a particular link; use Archive.GetTrackedLinks() to retrieve the ID for each link in a newsletter (optional)
     * @param string $uniqueClicks Whether or not to list only the first click from an email address, if that email address clicked multiple times (optional): 0 (default) or 1
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of email addresses per result page (optional, default: 100)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getClicks($newsletterId = '', $linkId = '', $uniqueClicks = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        $params['LinkID'] = $linkId;
        $params['UniqueClicks'] = $uniqueClicks;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['Sorting'] = $sorting;
		
        return $this->call('Archive.GetClicks', $params);
    }
	
    /**
     * Returns the list of forwards for a newsletter.
     * 
     * @param string $newsletterId ID of the Newsletter
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of email addresses per result page (optional, default: 100)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getForwards($newsletterId = '', $page = '', $numberPerPage = '', $sorting = '')
    {
        $params = array();
        $params['NewsletterID'] = $newsletterId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['Sorting'] = $sorting;
		
        return $this->call('Archive.GetForwards', $params);
    }
}