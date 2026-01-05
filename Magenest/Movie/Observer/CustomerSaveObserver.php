<?php
namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class CustomerSaveObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        // Lấy đối tượng customer đang được chuẩn bị save
        $customer = $observer->getEvent()->getCustomer();

        // Thay đổi dữ liệu
        $customer->setFirstname('Magenest');
    }
}
