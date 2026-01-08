<?php
namespace SmileCare\FlashSale\Block\Adminhtml\Deal\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        $dealId = $this->getDealId();
        
        if ($dealId) {
            $data = [
                'label' => __('Delete Deal'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to delete this deal?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Get URL for delete button
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->context->getUrlBuilder()->getUrl('*/*/delete', ['id' => $this->getDealId()]);
    }

    /**
     * Get deal ID from request
     *
     * @return int|null
     */
    public function getDealId()
    {
        return $this->context->getRequest()->getParam('id');
    }
}
