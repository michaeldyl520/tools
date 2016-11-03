<?php

namespace app\index\controller;

use think\Controller;

/**
 * Description of LeaveMessage
 * @author DYL <michaeldyl520@gmail.com at jiliuke.com>
 * @date 2016-11-3 15:28:41
 * @copyright Copyright (C) jiliuke.com
 */
class LeaveMessage extends Controller {

    //put your code here
    public function index() {
        $this->assign("title", "有话对我说" . "-" . config('site_name'));
        $this->assign("description", "PHP函数在线,md5在线运行,激流客工具,所属于激流客,帮助广大开发者更好的开发程序" . "-" . config('site_name'));
        $this->assign("keywords", "ip2long,PHP函数在线运行，PHP函数在线,md5,timestamp,ip2long,long2ip" . "-" . config('site_name'));
        return $this->fetch();
    }

}
