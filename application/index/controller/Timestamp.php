<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\index\controller;

use think\Controller;

/**
 * Description of Timestamp
 *
 * @author michaeldyl520
 */
class Timestamp extends Controller {

    public function index() {
        $this->assign("title", "timestamp转换" . "-" . config('site_name'));
        $this->assign("description", "PHP函数在线包括md5,timestamp,ip2long,long2ip等等PHP函数在线运行" . "-" . config('site_name'));
        $this->assign("keywords", "timestamp,PHP函数在线运行，PHP函数在线,md5,ip2long,long2ip" . "-" . config('site_name'));
        return $this->fetch();
    }

}
