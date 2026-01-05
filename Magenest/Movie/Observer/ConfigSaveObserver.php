<?php
namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ConfigSaveObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        // Lấy đối tượng config đang save
        $configData = $observer->getEvent()->getDataObject();

        // Kiểm tra đúng đường dẫn config (section/group/field)
        // Dựa vào system.xml của bạn: section=salesforce_crm, group=general, field=text_field
        if ($configData->getPath() == 'salesforce_crm/general/text_field') {

            // Kiểm tra giá trị
            if ($configData->getValue() == 'Ping') {
                // Thay đổi giá trị trước khi lưu xuống DB
                $configData->setValue('Pong');
            }
        }
    }
}
