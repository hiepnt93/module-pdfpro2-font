<?php

namespace Vnecoms\PdfProFont\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $connection = $installer->getConnection();

//        if ($connection->isTableExists($installer->getTable('ves_pdfpro_key')))
//        {
//            $installer->getConnection()->addColumn(
//                $installer->getTable('ves_pdfpro_key'),
//                'font_data',
//                [
//                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    'nullable' => true,
//                    'comment' => 'font data',
//                ]
//            );
      //  }
        $installer->endSetup();
    }
}
