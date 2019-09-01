<?php

namespace Aht\User\Controller\Adminhtml\User;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    private $_userFactory;
    public function __construct(
        Action\Context $context,
        \Magento\Customer\Model\CustomerFactory $userFactory) {

        $this->_userFactory = $userFactory;

        parent::__construct($context);
    }

    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if (isset($data['entity_id'])) {

            if (isset($data['pw1']) || isset($data['re_pw1'])) {
                if ($data['pw1'] == $data['re_pw1']) {
                    try {
                        $model = $this->_userFactory->create();
                        $model = $model->load($data['entity_id']);

                        $model->setPassword($data['pw1']);
                        $model->save();
                        $this->messageManager->addSuccessMessage(__('Thay đổi thành công.'));
                        return $resultRedirect->setPath('*/*/');

                    } catch (LocalizedException $e) {
                        $this->messageManager->addErrorMessage(__('Độ dài mật khẩu quá ngắn'));
                        return $resultRedirect->setPath('*/*/');

                    }
                } else {

                    $this->messageManager->addError(__('Mật Khẩu không giống nhau'));
                    return $resultRedirect->setPath('*/*/');
                }

            } else {

                $model = $this->_userFactory->create()->load($data['entity_id']);
                // echo $model->getEmail();
                // var_dump($data);

                if ($data['email'] == $model->getEmail()) {
                    $model->setFirstname($data['firstname']);
                    $model->setLastname($data['lastname']);
                    $model->setDob($data['dob']);
                    $model->save();
                    $this->messageManager->addSuccessMessage(__('Thay đổi thành công.'));
                    return $resultRedirect->setPath('*/*/');
                } else {

                    $modelMail = $this->_userFactory->create();
                    $modelMail = $model->getCollection()->getData();
                    $check = "false";
                    for ($i = 0; $i < count($modelMail); $i++) {
                        if ($data['email'] == $modelMail[$i]['email']) {
                            $check = "true";
                            break;
                        }

                    }

                    if ($check != "true") {
                        $model->setFirstname($data['firstname']);
                        $model->setLastname($data['lastname']);
                        $model->setDob($data['dob']);
                        $model->setEmail($data['email']);
                        $model->save();
                        $this->messageManager->addSuccessMessage(__('Thay đổi thành công.'));
                        return $resultRedirect->setPath('*/*/');

                    } else {
                        $this->messageManager->addError(__('Mail trùng'));
                        return $resultRedirect->setPath('*/*/');

                    }
                }

            }
        }

        return $resultRedirect->setPath('*/*/');

    }

}
