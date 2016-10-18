<?php

namespace app\index\controller;

use think\Controller;

class Ip2long extends Controller {

    /**
     * ip2long首页
     * @return type
     */
    public function Index() {
        $this->assign("title", "ip2long转换" . "-" . config('site_name'));
        $this->assign("description", "PHP函数在线,md5在线运行,激流客工具,所属于激流客,帮助广大开发者更好的开发程序" . "-" . config('site_name'));
        $this->assign("keywords", "ip2long,PHP函数在线运行，PHP函数在线,md5,timestamp,ip2long,long2ip" . "-" . config('site_name'));
        $this->assign('ip', get_client_ip());
        return $this->fetch();
    }
    /**
     * ip2long ajax调用
     * @return type
     */
    public function getIp2longStr() {
        $ip = input('ip');
        $string = ip2long($ip);
        $data ['status'] = 1;
        $data ['content'] = $string;
        return json($data);
    }

}
