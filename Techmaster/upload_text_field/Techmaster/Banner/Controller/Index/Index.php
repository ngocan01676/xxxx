<?php
namespace Techmaster\Banner\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action {
protected $bannerFactory;

public function __construct(\Magento\Framework\App\Action\Context $context, 
	\Techmaster\Banner\Model\BannerFactory $bannerFactory)
{
    $this->bannerFactory = $bannerFactory;
    parent::__construct($context);
}

public function execute()
{
  
  $banner=$this->bannerFactory->create();
  $collection=$banner->getCollection()->getData();
  echo "<pre>";
  print_r($collection);
  //$data=$collection->addFieldToFilter('id',['gt'>3])->getSelect();
  // addFieldToSelect chi dinh ten cot can lay
  // addFieldToFilter('image',['like'>'%.png'])-
// getSelect() lay query
  // print_r(json_encode($data));
// echo $data;
    

    
}

}