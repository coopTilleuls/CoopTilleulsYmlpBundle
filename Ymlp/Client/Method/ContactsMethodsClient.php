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
 * ContactsMethodsClient
 * 
 * @author Baptiste Meyer <baptiste@les-tilleuls.coop>
 */
class ContactsMethodsClient extends YmlpAPIClient
{
    /**
     * Adds a new contact to one or more groups in your database.
     * 
     * @param string $email
     * @param array $otherFields Data for any other field can be sent
     * @param string $groupId ID of the group or a comma-separated list of groups IDs
     * @param string $overruleUnsubscribedBounced "0" or "1" (optional, default is "0"); if "1", the email address will be added even if this person previously unsubscribed or if the email address previously was removed by bounce back handling
     * @return mixed
     */
    public function add($email = '', array $otherFields = array(), $groupId = '', $overruleUnsubscribedBounced = '')
    {
        $params = array();
        $params['Email'] = $email;

        foreach ($otherFields as $key => $value) {
            $params[$key] = $value;
        }
        
        $params['GroupID'] = $groupId;
        $params['OverruleUnsubscribedBounced']  = $overruleUnsubscribedBounced;
        
        return $this->call('Contacts.Add', $params);
    }
    
    /**
     * Removes a given email address from one or more groups.
     * 
     * @param string $email Email
     * @return mixed
     */
    public function unsubscribe($email = '')
    {
        $params = array();
        $params['Email'] = $email;
        
        return $this->call('Contacts.Unsubscribe', $params);
    }

    /**
     * Unsubscribes a given email address.
     * 
     * @param string $email Email
     * @param string $groupId ID of the group or a comma-separated list of groups IDs
     * @return mixed
     */
    public function delete($email = '', $groupId = '')
    {
        $params = array();
        $params['Email'] = $email;
        $params['GroupID'] = $groupId;
        
        return $this->call('Contacts.Delete', $params);
    }
    
    /**
     * Retrieves all available information regarding a contact.
     * 
     * @param string $email Email
     * @return mixed
     */
    public function getContact($email = '')
    {
        $params = array();
        $params['Email'] = $email;
        
        return $this->call('Contacts.GetContact', $params);
    }
    
    /**
     * Returns the list of contacts in a given list of groups.
     * 
     * @param string $groupId ID of the group or a comma-separated list of groups IDs
     * @param string $fieldId ID of the field or a comma-separated list of field IDs
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage number of contacts per result page (optional, default: 1,000)
     * @param string $startDate Only show contacts that were added after this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $stopDate Only show contacts that were added before this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getList($groupId = '', $fieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '', $sorting = '')
    {
        $params = array();
        $params['GroupID'] = $groupId;
        $params['FieldID'] = $fieldId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['StartDate'] = $startDate;
        $params['StopDate'] = $stopDate;
        $params['Sorting'] = $sorting;
        
        return $this->call('Contacts.GetList', $params);
    }

    /**
     * Returns the list of unsubscribed contacts in your account.
     * 
     * @param string $fieldId ID of the field or a comma-separated list of field IDs; use Field.GetList() to retrieve the ID for each field (optional; default: return only email addresses)
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage number of contacts per result page (optional, default: 1,000)
     * @param string $startDate Only show contacts that were removed after this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $stopDate Only show contacts that were removed before this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getUnsubscribed($fieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '', $sorting = '')
    {
        $params = array();
        $params['FieldID'] = $fieldId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['StartDate'] = $startDate;
        $params['StopDate'] = $stopDate;
        $params['Sorting'] = $sorting;
        
        return $this->call('Contacts.GetUnsubscribed', $params);
    }
    
    /**
     * Returns the list of manually removed contacts in your account.
     * 
     * @param string $fieldId ID of the field or a comma-separated list of field IDs
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of contacts per result page (optional, default: 1,000)
     * @param string $startDate Only show contacts that were removed after this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $stopDate Only show contacts that were removed before this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getDeleted($fieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '', $sorting = '')
    {
        $params = array();
        $params['FieldID'] = $fieldId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['StartDate'] = $startDate;
        $params['StopDate'] = $stopDate;
        $params['Sorting'] = $sorting;
        
        return $this->call('Contacts.GetDeleted', $params);
    }
    
    /**
     * Returns the list of contacts removed by bounce back handling in your account.
     * 
     * @param string $fieldId ID of the field or a comma-separated list of field IDs
     * @param string $page ID of the result page to show (optional, default: 1)
     * @param string $numberPerPage Number of contacts per result page (optional, default: 1,000)
     * @param string $startDate Only show contacts that were removed after this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $stopDate Only show contacts that were removed before this date (optional, format: YYYY-MM-DD, e.g.: 2020-05-31)
     * @param string $sorting Sorting order of the returned email addresses, either ascending ('a' first) or descending ('z' first) (optional): Ascending (default) or Descending
     * @return mixed
     */
    public function getBounced($fieldId = '', $page = '', $numberPerPage = '', $startDate = '', $stopDate = '', $sorting = '')
    {
        $params = array();
        $params['FieldID'] = $fieldId;
        $params['Page'] = $page;
        $params['NumberPerPage'] = $numberPerPage;
        $params['StartDate'] = $startDate;
        $params['StopDate'] = $stopDate;
        $params['Sorting'] = $sorting;
        
        return $this->call('Contacts.GetBounced', $params);
    }
}
