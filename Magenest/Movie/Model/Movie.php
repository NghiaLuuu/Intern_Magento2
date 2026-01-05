<?php
namespace Magenest\Movie\Model;

use Magento\Framework\Model\AbstractModel;

class Movie extends AbstractModel
{
    /**
     * @var string
     * Đây là từ khóa QUAN TRỌNG để tạo ra event "magenest_movie_save_before"
     */
    protected $_eventPrefix = 'magenest_movie';

    /**
     * @var string
     * Tên biến để lấy ra trong Observer: $observer->getEvent()->getMovie()
     */
    protected $_eventObject = 'movie';

    protected function _construct()
    {
        // Khai báo ResourceModel tương ứng (xem phần 2)
        $this->_init('Magenest\Movie\Model\ResourceModel\Movie');
    }
}
