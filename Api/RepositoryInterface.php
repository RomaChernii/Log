<?php

namespace Smile\Login\Api;

interface RepositoryInterface
{

    public function save(\Smile\Login\Api\Data\UserInterface $users);

    public function getById($userId);

    public function delete(\Smile\Login\Api\Data\UserInterface $users);

    public function deleteById($userId);
}
