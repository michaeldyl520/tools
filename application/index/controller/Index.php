<?php

namespace app\index\controller;

use think\Controller;

class Index extends Controller {

    public function index() {
        $this->assign("title", "PHP函数在线" . "-" . config('site_name'));
        $this->assign("description", "PHP函数在线包括md5,timestamp,ip2long,long2ip等等PHP函数在线运行" . "-" . config('site_name'));
        $this->assign("keywords", "md5,PHP函数在线运行,PHP函数在线,timestamp,ip2long,long2ip" . "-" . config('site_name'));
        return $this->fetch();
    }

}
