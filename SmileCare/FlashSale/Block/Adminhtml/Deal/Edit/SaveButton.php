<?php
    namespace SmileCare\FlashSale\Block\Adminhtml\Deal\Edit;

    use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

    class SaveButton implements ButtonProviderInterface
    {
        /**
         * @return array
         */
        public function getButtonData()
        {
            return [
                'label' => __('Save Deal'),
                'class' => 'save primary',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'save']],
                    'form-role' => 'save',
                ],
                'sort_order' => 90,
            ];
        }
    }
