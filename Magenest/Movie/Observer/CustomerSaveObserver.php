<?php
namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class CustomerSaveObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        // 1. Lấy đối tượng customer từ event
        // Lưu ý: Event 'customer_save_before' trả về Model Customer
        $customer = $observer->getEvent()->getCustomer();

        // 2. Thay đổi dữ liệu
        // Chỉ cần set giá trị, Magento sẽ tự lưu giá trị mới này sau khi Observer kết thúc
        $customer->setFirstname('Magenest');

        // 3. TUYỆT ĐỐI KHÔNG GỌI $repository->save() Ở ĐÂY
    }
}
