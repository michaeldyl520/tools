<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\index\controller;

use think\Controller;

/**
 * Description of Long2ip
 *
 * @author michaeldyl520
 */
class Long2ip extends Controller {

    public function index() {
        $this->assign("title", "long2ip转换" . "-" . config('site_name'));
        $this->assign("description", "PHP函数在线,md5在线运行,激流客工具,所属于激流客,帮助广大开发者更好的开发程序" . "-" . config('site_name'));
        $this->assign("keywords", "long2ip,PHP函数在线运行，PHP函数在线,md5,timestamp,ip2long,long2ip" . "-" . config('site_name'));
        $this->assign('ipString', ip2long(get_client_ip()));
        return $this->fetch();
    }

    public function getIp() {
        $ipString = input('ipString');
        $ip = long2ip($ipString);
        $data ['status'] = 1;
        $data ['content'] = $ip;
        return json($data);
    }

}
