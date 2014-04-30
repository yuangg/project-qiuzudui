<?php

class FooterAction extends Action {
    public function aboutUs(){
        $current_user = $_SESSION['user'];
        $user_dao = M('User');
        $user = $user_dao -> getById($current_user['id']);
        if(empty($user))
        {
            $user['user_type'] = -1;
            $this->assign("user", $user);
            $this->display();
        }
        else
        {
            $this->assign("user", $user);
            $this->display();
        }
    }
    public function ad(){
        $current_user = $_SESSION['user'];
        $user_dao = M('User');
        $user = $user_dao -> getById($current_user['id']);
        if(empty($user))
        {
            $user['user_type'] = -1;
            $this->assign("user", $user);
            $this->display();
        }
        else
        {
            $this->assign("user", $user);
            $this->display();
        }
    }
    public function Links(){
        $current_user = $_SESSION['user'];
        $user_dao = M('User');
        $user = $user_dao -> getById($current_user['id']);
        if(empty($user))
        {
            $user['user_type'] = -1;
            $this->assign("user", $user);
            $this->display();
        }
        else
        {
            $this->assign("user", $user);
            $this->display();
        }
    }
}

?>