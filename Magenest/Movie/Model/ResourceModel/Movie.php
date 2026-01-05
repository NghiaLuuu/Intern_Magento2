<?php
namespace Magenest\Movie\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Movie extends AbstractDb
{
    protected function _construct()
    {
        // Tham số 1: Tên bảng trong database (ví dụ: magenest_movie)
        // Tham số 2: Tên cột khóa chính (Primary Key - ví dụ: movie_id)
        $this->_init('magenest_movie', 'movie_id');
    }
}
