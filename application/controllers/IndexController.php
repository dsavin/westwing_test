<?php
class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

        $request = $this->getRequest();
        $form = new Application_Form_Westwing();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $this->view->email = $form->getValue('email');
                $result_array = $form->parseCSV($_FILES["csv"]["tmp_name"]);

                if ($result_array) {
                    $this->view->results = $result_array;
                } else {
                    $this->view->errorMessage = "Error! No results to display";
                }
                //Zend_Debug::dump($this);
                $this->render('result');
                return;
            }
        }

        $this->view->form = $form;

    }

}