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
     * Returns the list of available sender addresses in the account.
     * 
     * @return mixed
     */
    public function getFroms()
    {
        return $this->call('Newsletter.GetFroms');
    }
    
    /**
     * Creates a new sender address.
     * 
     * @param string $fromEmail Email
     * @param string $fromName Name/description for the new sender address
     * @return mixed
     */
    public function addFrom($fromEmail = '', $fromName = '')
    {
        $params = array();
        $params['FromEmail'] = $fromEmail;
        $params['FromName'] = $fromName;
		
        return $this->call('Newsletter.AddFrom', $params);
    }
    
    /**
     * Removes a sender address based on a given From ID.
     * 
     * @param string $fromId ID of the sender address
     * @return mixed
     */
    public function deleteFrom($fromId = '')
    {
        $params = array();
        $params['FromID'] = $fromId;
		
        return $this->call('Newsletter.DeleteFrom', $params);
    }
    
    /**
     * Queues a message for delivery.
     * 
     * @param string $subject Subject for the message
     * @param string $html HTML code for the message (optional if a text part is specified)
     * @param string $text (Plain) text for the message (optional if a HTML part is specified)
     * @param string $deliveryTime Delivery time for the message (optional, format: YYYY-MM-DD HH:MM am/pm, e.g.: 2020-05-31 04:20 pm)
     * @param string $fromId ID of the sender address to use (optional; default: first sender address listed on the "Sending Newsletters" page).
     * @param string $trackOpens Whether or not to track opens for the message (only available if a HTML part was specified): 0 (default) or 1
     * @param string $trackClicks Whether or not to track clicks for the message (only available if a HTML part was specified): 0 (default) or 1
     * @param string $testMessage Whether it's a test message or a message to be sent to contacts in your database: 0 (default) or 1
     * @param string $groupId ID of the group or a comma-separated list of groups IDs to send to (ignored for test messages)
     * @param string $filterId ID of the filter or a comma-separated list of filter IDs to apply (ignored for test messages)
     * @param string $combineFilters Whether contacts must match all applied filters or just one (optional): 0 (=all filters, default) or 1 (=just one filter)
     * @return mixed
     */
    public function send($subject = '', $html = '', $text = '', $deliveryTime = '', $fromId = '', $trackOpens = '', $trackClicks = '', $testMessage = '', $groupId = '', $filterId = '', $combineFilters = '')
    {
        $params = array();
        $params['Subject'] = $subject;
        $params['HTML'] = $html;
        $params['Text'] = $text;
        $params['DeliveryTime'] = $deliveryTime;
        $params['FromID'] = $fromId;
        $params['TrackOpens'] = $trackOpens;
        $params['TrackClicks'] = $trackClicks;
        $params['TestMessage'] = $testMessage;
        $params['GroupID'] = $groupId;
        $params['FilterID'] = $filterId;
        $params['CombineFilters'] = $combineFilters;
        
        return $this->call('Newsletter.Send', $params);
    }
}