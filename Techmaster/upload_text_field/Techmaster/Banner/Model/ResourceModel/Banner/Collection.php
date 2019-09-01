<?php 
namespace Techmaster\Banner\Model\ResourceModel\Banner;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

	// protected $_eventObject="banner_collection";
	protected function _construct()
	{
		$this->_init('Techmaster\Banner\Model\Banner','Techmaster\Banner\Model\ResourceModel\Banner');
	}
}


 ?>