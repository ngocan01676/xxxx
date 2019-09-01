<?php
namespace Rsgitech\News\Controller\Index;
use Rsgitech\News\Model\AllnewsFactory;
use Rsgitech\News\Model\AllnewsRepository;


class Index extends \Magento\Framework\App\Action\Action
{
	protected $pageFactory;
	protected $allnew;
	protected $allnewrepo;
	
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		AllnewsFactory $all,
		AllnewsRepository $allrepo)
	{
		$this->pageFactory = $pageFactory;
		$this->allnew=$all;
		$this->allnewrepo=$allrepo;
		return parent::__construct($context);
	}

	public function execute()
	{  
       $id=4;
		$model=$this->allnew->create();
		$model->setTitle("xvideo");
		$model->setDescription("xvideo");
		// $this->allnewrepo->save($model);
		if(isset($id))
		{
			$model=$this->allnewrepo->getById($id);
				$model->setTitle("xvideo");
		$model->setDescription("xvideo");
			$this->allnewrepo->save($model);
			echo "ab";
		}
		echo  "done";


		die();
		return $this->pageFactory->create();
	}
}