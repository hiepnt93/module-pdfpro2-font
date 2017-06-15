<?php

namespace Vnecoms\PdfProFont\Observer\Adminhtml;

use Magento\Framework\Event\ObserverInterface;

/**
 * Class PdfProConfigVersion.
 *
 * @author Vnecoms team <vnecoms.com>
 */
class KeySaveBefore implements ObserverInterface
{
    protected $helper;

    protected $request;

    /**
     * PdfProConfigVersion constructor.
     *
     * @param \Vnecoms\PdfPro\Helper\Data $helper
     */
    public function __construct
    (
        \Vnecoms\PdfPro\Helper\Data $helper,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->request = $request;
        $this->helper = $helper;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $key = $observer->getObject();

        //var_dump($key->getData('font_data'));die();
        $key->setData('font_data', serialize($this->request->getPost('font_data')));
    }
}
