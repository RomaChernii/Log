<?php

namespace Smile\Login\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface {

    public function install( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'users'
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('users')
        )->addColumn(
            'user_id',
            Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'User ID'
        )->addColumn(
            'firstname',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'User Firstname'
        )->addColumn(
            'lastname',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'User Lastname'
        )->addColumn(
            'email',
            Table::TYPE_TEXT,
            '255',
            ['nullable' => true],
            'User Email'
        )->addColumn(
            'password',
            Table::TYPE_TEXT,
            '255',
            ['nullable' => true],
            'User Password'
        )->addIndex(
            $setup->getIdxName(
                $installer->getTable('users'),
                ['firstname', 'lastname', 'email', 'password'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            ['firstname', 'lastname', 'email', 'password'],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        )->setComment(
            'Users Table'
        );
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable(
            $installer->getTable('user_auth_log')
        )->addColumn(
            'user_id',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'User ID'
        )->addColumn(
            'auth_time',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Auth Time'
        )->addIndex(
            $installer->getIdxName('user_auth_log', ['user_id']),
            ['user_id']
        )->addForeignKey(
            $installer->getFkName('user_auth_log', 'user_id', 'users', 'user_id'),
            'user_id',
            $installer->getTable('users'),
            'user_id',
            Table::ACTION_CASCADE
        )->setComment(
            'User Auth Log Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}