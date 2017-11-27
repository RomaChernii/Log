<?php

namespace Smile\Login\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Smile\Login\Api\Data\UserInterface;

class Users  extends AbstractModel implements UserInterface, IdentityInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    const CACHE_TAG = 'login_users';

    protected $_cacheTag = 'login_users';

    protected $_eventPrefix = 'login_users';

    protected function _construct()
    {
        $this->_init('Smile\Login\Model\ResourceModel\Users');
    }

    public function checkUrlKey($url_key)
    {
        return $this->_getResource()->checkUrlKey($url_key);
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData(self::USER_ID);
    }

    public function getLastname()
    {
        return $this->getData(self::LASTNAME);
    }

    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    public function getPassword()
    {
        return $this->getData(self::PASSWORD);
    }

    public function getAuthTime()
    {
        return $this->getData(self::AUTH_TIME);
    }

    public function setId($id)
    {
        return $this->setData(self::USER_ID, $id);
    }

    public function setLastname($lastname)
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }


    public function setPassword($password)
    {
        return $this->setData(self::PASSWORD, $password);
    }

    public function setAuthTime($authTime)
    {
        return $this->setData(self::AUTH_TIME, $authTime);
    }

}