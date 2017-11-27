<?php

namespace Webkul\Hello\Model;

use Smile\Login\Api\RepositoryInterface;

class RepositoryModel implements RepositoryInterface
{

    public function save(\Smile\Login\Api\Data\UserInterface $user)
    {
    //your code
    }

    public function getById($id)
    {
    //your code
    }

    public function delete(\Smile\Login\Api\Data\UserInterface  $user)
    {
    //your code
    }

    public function deleteById($id)
    {
    //your code
    }
}