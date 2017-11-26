<?php

namespace Smile\Log\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface {


    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.3.7') < 0) {
            $id = $this->getRequest()->getParam('id');
            $model = Mage::getModel('log/log');
            $model->setId($id)->delete();
        }

        $setup->endSetup();
    }
}