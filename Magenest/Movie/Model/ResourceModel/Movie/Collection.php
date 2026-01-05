<?php
namespace Magenest\Movie\Model\ResourceModel\Movie;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'movie_id'; // Tên khóa chính

    protected function _construct()
    {
        // Kết nối Model (1) và ResourceModel (2) lại với nhau
        $this->_init(
            'Magenest\Movie\Model\Movie',
            'Magenest\Movie\Model\ResourceModel\Movie'
        );
    }
}
