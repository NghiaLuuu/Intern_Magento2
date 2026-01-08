<?php
namespace SmileCare\FlashSale\Controller\Adminhtml\Deal;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use SmileCare\FlashSale\Model\DealFactory;
use SmileCare\FlashSale\Model\ResourceModel\Deal as DealResource;
use Magento\Framework\Registry;
use Psr\Log\LoggerInterface;

class Edit extends Action
{
//    const ADMIN_RESOURCE = 'SmileCare_FlashSale::deal';
    const ADMIN_RESOURCE = 'Magento_Backend::admin';
    protected $resultPageFactory;
    protected $dealFactory;
    protected $dealResource;
    protected $coreRegistry;
    protected $logger;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        DealFactory $dealFactory,
        DealResource $dealResource,
        Registry $coreRegistry,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->dealFactory = $dealFactory;
        $this->dealResource = $dealResource;
        $this->coreRegistry = $coreRegistry;
        $this->logger = $logger;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $deal = $this->dealFactory->create();

        // --- BẮT ĐẦU DEBUG MODE (IN RA MÀN HÌNH) ---
        if ($id) {
            // Thử load dữ liệu
            $this->dealResource->load($deal, $id);

            echo '<div style="background: #f4f4f4; padding: 20px; font-family: monospace; border: 1px solid #ccc;">';
            echo '<h1 style="color: blue;">🔍 DEBUG MODE: INSPECT DATA</h1>';

            // 1. Kiểm tra thông tin đầu vào
            echo '<h3>1. Request Info:</h3>';
            echo '<strong>ID từ URL:</strong> ' . $id . '<br>';

            // 2. Kiểm tra cấu hình ResourceModel (Quan trọng nhất)
            echo '<h3>2. ResourceModel Config:</h3>';
            echo '<strong>Main Table (Tên bảng code đang gọi):</strong> <span style="color:red">' . $this->dealResource->getMainTable() . '</span><br>';
            echo '<strong>ID Field (Tên khóa chính code đang gọi):</strong> <span style="color:red">' . $this->dealResource->getIdFieldName() . '</span><br>';

            // 3. Kiểm tra kết quả load
            echo '<h3>3. Loaded Data Result:</h3>';
            if (!$deal->getId()) {
                echo '<h2 style="color: red;">❌ KHÔNG TÌM THẤY DỮ LIỆU!</h2>';
                echo '<ul>';
                echo '<li>Có thể ID <b>' . $id . '</b> không tồn tại trong bảng <b>' . $this->dealResource->getMainTable() . '</b></li>';
                echo '<li>Hoặc tên khóa chính <b>' . $this->dealResource->getIdFieldName() . '</b> sai so với Database.</li>';
                echo '</ul>';
            } else {
                echo '<h2 style="color: green;">✅ Đã load được dữ liệu!</h2>';
                echo '<strong>Dữ liệu lấy được:</strong><pre>';
                print_r($deal->getData());
                echo '</pre>';
            }

            echo '</div>';
        }
        // --- KẾT THÚC DEBUG MODE ---

        // Code cũ (sẽ không chạy đến đây khi có ID)
        $this->coreRegistry->unregister('smilecare_flashsale_deal');
        $this->coreRegistry->register('smilecare_flashsale_deal', $deal);

        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
