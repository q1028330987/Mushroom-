<?php

    namespace MGJAdmin\Model;

    use Think\Model;

    class FeedbackModel extends Model
    {
        public function Feedback()
        {
            $list = M('Feedback')->select();

            return $list;
        }
    }