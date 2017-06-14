<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Vnecoms\PdfProFont\Model\Source;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\App\Filesystem\DirectoryList;

class Fonts extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /** @var \Magento\Framework\App\Filesystem\DirectoryList */
    private $directoryList;

    /** @var \Magento\Framework\Filesystem\Driver\File */
    private $driverFile;

    /**
     * Options array
     *
     * @var array
     */
    protected $_options = null;

    public function __construct
    (
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList,
        \Magento\Framework\Filesystem\Driver\File $file
    )
    {
        $this->directoryList = $directoryList;
        $this->driverFile = $file;
    }

    /**
     * Retrieve all options array
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $includePatterns = ['#*.TTF#', '#*.ttf#', '*.otf', '*.OTF'];

            $directoryPath = $this->directoryList->getPath('lib/Vnecoms/mpdf/ttfonts');
            if ($this->driverFile->isExists($directoryPath)) {
                $files = $this->driverFile->readDirectory($directoryPath);
                foreach ($files as $file) {
                    foreach ($includePatterns as $pattern) {
                        if (preg_match($pattern, $file)) {
                            $this->_options[] = [
                                'label' => $file,
                                'value' => $file
                            ];
                        }
                    }
                }
            }

        }
        return $this->_options;
    }

    /**
     * Retrieve option array
     *
     * @return array
     */
    public function getOptionArray()
    {
        $_options = [];
        foreach ($this->getAllOptions() as $option) {
            $_options[$option['value']] = $option['label'];
        }
        return $_options;
    }


    /**
     * Get options as array
     *
     * @return array
     * @codeCoverageIgnore
     */
    public function toOptionArray()
    {
        return $this->getAllOptions();
    }

}
