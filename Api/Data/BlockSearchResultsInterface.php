<?php

namespace Smile\Login\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BlockSearchResultsInterface extends SearchResultsInterface
{
    public function getItems();

    public function setItems(array $items);
}
