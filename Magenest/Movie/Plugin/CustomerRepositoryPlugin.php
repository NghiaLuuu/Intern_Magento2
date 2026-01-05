<?php
namespace Magenest\Movie\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;

class CustomerRepositoryPlugin
{
    /**
     * Can thiệp trước khi hàm save() được chạy
     *
     * @param CustomerRepositoryInterface $subject Đối tượng Repository gốc
     * @param CustomerInterface $customer Đối tượng khách hàng đang được lưu (Input 1)
     * @param string|null $passwordHash Password hash (Input 2 - nếu có)
     * @return array Trả về danh sách tham số đã chỉnh sửa
     */
    public function beforeSave(
        CustomerRepositoryInterface $subject,
        CustomerInterface $customer,
                                    $passwordHash = null
    ) {
        // Thay đổi Last Name tại đây
        $customer->setLastname('PluginLastname');

        // BẮT BUỘC: Phải trả về mảng chứa các tham số (đã sửa hoặc giữ nguyên)
        // theo đúng thứ tự của hàm gốc save($customer, $passwordHash)
        return [$customer, $passwordHash];
    }
}
