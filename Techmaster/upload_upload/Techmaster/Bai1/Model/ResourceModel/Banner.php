<?php 
namespace Techmaster\Bai1\Model\ResourceModel;
class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        // Table name + primary key column
        $this->_init('banner', 'id');
    }
}

