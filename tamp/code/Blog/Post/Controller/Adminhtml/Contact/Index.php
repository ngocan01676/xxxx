<?php
namespace Blog\Post\Controller\Adminhtml\Contact;
use Blog\Post\Model\ContactFactory;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory;
	private $_customer;


	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Customer\Model\CustomerFactory $customer
	) {
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		$this->_customer=$customer;
	}
	

	public function execute()
	{ 
		// $model=$this->_customer->create();
		// $model=$model->getCollection()->getData();
		// // $model = $this->_objectManager->create(\Magento\Customer\Model\Customer::class);
		// // $model->getCollection()->getData();
		// // echo "<pre>";
		// print_r($model);
		// die();
	  // $model = $this->_objectManager->create(\Magento\Customer\Model\Customer::class);
   //    $model=$model->load(1)->getData();
   //    echo "<pre>";
   //    print_r($arr);
   //    die();


		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('All Contact'));
		return $resultPage;
	}
}