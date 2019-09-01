<?php

namespace Aht\User\Controller\Adminhtml\User;

use Magento\Backend\App\Action;

class ChangePassword extends \Magento\Backend\App\Action
{

    
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
      
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Change Password'));
        return $resultPage;

    }

}
