<?php

namespace Webkul\Hello\Model;

use Smile\Login\Api\RepositoryInterface;
use Smile\Login\Api\Data\UserInterface;

class RepositoryModel implements RepositoryInterface
{

    public function save(UserInterface $user)
    {
    //your code
    }

    public function getById($id)
    {
    //your code
    }

    public function delete(UserInterface  $user)
    {
    //your code
    }

    public function deleteById($id)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $user = $objectManager->create('Smile\Login\Model\User');
        $user->load($id)->delete();
    }
}