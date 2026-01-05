<?php
namespace Magenest\Movie\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;

class CustomerRepositoryPlugin
{
    public function beforeSave(CustomerRepositoryInterface $subject, CustomerInterface $customer, $passwordHash = null)
    {
        // Thay đổi dữ liệu trước khi hàm gốc chạy
        $customer->setLastname('Before');

        // BẮT BUỘC: Trả về mảng tham số
        return [$customer, $passwordHash];
    }
    public function aroundSave(CustomerRepositoryInterface $subject, \Closure $proceed, CustomerInterface $customer, $passwordHash = null)
    {
        // --- Code chạy TRƯỚC khi gọi hàm gốc (giống before) ---
        $customer->setMiddlename('Around');

        // GỌI HÀM GỐC: Dòng này sẽ thực sự lưu dữ liệu xuống DB
        // Biến $result ở đây chính là Customer đã được lưu
        $result = $proceed($customer, $passwordHash);

        // --- Code chạy SAU khi gọi hàm gốc (giống after) ---
        // Lúc này dữ liệu đã vào DB rồi.

        return $result; // BẮT BUỘC trả về kết quả
    }
    public function afterSave(CustomerRepositoryInterface $subject, CustomerInterface $result)
    {
        $result->setFirstname('After');
        return $result; // BẮT BUỘC trả về kết quả
    }
}
