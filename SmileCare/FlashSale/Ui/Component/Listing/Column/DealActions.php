<?php
namespace SmileCare\FlashSale\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Backend\Model\UrlInterface;

class DealActions extends Column
{
    /**
     * URL paths
     */
    const URL_PATH_EDIT = 'flashsale/deal/edit';
    const URL_PATH_DELETE = 'flashsale/deal/delete';

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['deal_id'])) {
                    $name = $this->getData('name');
                    $viewUrlPath = $this->getData('config/viewUrlPath') ?: self::URL_PATH_EDIT;
                    $urlEntityParamName = $this->getData('config/urlEntityParamName') ?: 'id';

                    // Edit action
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                            $viewUrlPath,
                            [$urlEntityParamName => $item['deal_id']]
                        ),
                        'label' => __('Edit'),
                        'hidden' => false
                    ];

                    // Delete action
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::URL_PATH_DELETE,
                            [$urlEntityParamName => $item['deal_id']]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete Deal #%1', $item['deal_id']),
                            'message' => __('Are you sure you want to delete this deal?')
                        ],
                        'post' => true,
                        'hidden' => false
                    ];
                }
            }
        }

        return $dataSource;
    }
}

