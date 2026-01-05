<?php
namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class MovieSaveObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        // Lấy đối tượng movie (tùy vào cách đặt tên trong model mà là getObject hay getMagenestMovie)
        // Cách an toàn nhất là lấy data_object
        $movie = $observer->getEvent()->getDataObject();

        // Set rating về 0
        $movie->setRating(0);
    }
}
