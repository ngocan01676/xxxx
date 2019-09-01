<?php 
namespace Techmaster\Bai1\Model\ResourceModel\Banner;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

	// protected $_eventObject="banner_collection";
	protected function _construct()
	{
		$this->_init('Techmaster\Bai1\Model\Banner','Techmaster\Bai1\Model\ResourceModel\Banner');
	}
}


 ?>