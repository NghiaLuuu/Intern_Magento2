<?php
namespace SmileCare\FlashSale\Model\Deal;

use SmileCare\FlashSale\Model\ResourceModel\Deal\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\App\RequestInterface;

class DataProvider extends AbstractDataProvider
{
    protected $collection;
    protected $dataPersistor;
    protected $loadedData;
    protected $request;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->request = $request;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        // Lấy ID từ URL để chỉ load đúng 1 dòng (Tối ưu)
        $requestId = $this->request->getParam($this->requestFieldName);
        if ($requestId) {
            $this->collection->addFieldToFilter($this->primaryFieldName, $requestId);
        }

        $items = $this->collection->getItems();

        foreach ($items as $deal) {
            $this->loadedData[$deal->getId()] = $deal->getData();
        }

        // Load lại dữ liệu nếu save bị lỗi
        $data = $this->dataPersistor->get('smilecare_flashsale_deal');
        if (!empty($data)) {
            $deal = $this->collection->getNewEmptyItem();
            $deal->setData($data);
            $this->loadedData[$deal->getId()] = $deal->getData();
            $this->dataPersistor->clear('smilecare_flashsale_deal');
        }

        return $this->loadedData;
    }
}
