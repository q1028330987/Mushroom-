<?php

    namespace MGJAdmin\Controller;


    class FeedbackController extends CommonController
    {
        public function index()
        {
            $feedbackModel = D('feedback');            

            $list = $feedbackModel->Feedback();

            if (IS_POST) {

            } else {

                $this->assign('list',$list);

                $this->display('feedback');
            }
        }
    }