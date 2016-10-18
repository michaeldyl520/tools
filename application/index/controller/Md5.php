<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Md5
 *
 * @author michaeldyl520
 */

namespace app\index\controller;

use think\Controller;
use think\Validate;

class Md5 extends Controller {

    public function Index() {
        $this->assign("title", "md5转换" . "-" . config('site_name'));
        $this->assign("description", "PHP函数在线,md5在线运行,激流客工具,所属于激流客,帮助广大开发者更好的开发程序" . "-" . config('site_name'));
        $this->assign("keywords", "PHP函数在线运行，PHP函数在线,md5,timestamp,ip2long,long2ip" . "-" . config('site_name'));
        $rule = [
            'sourceString' => 'require|token',
        ];
        $validate = new Validate($rule);
        $data = [
            'sourceString' => input('sourceString'),
            '__token__' => input('__token__')
        ];
        $temp = $validate->check($data);
        if ($temp && request()->isPost()) {
            $sourceString = input('sourceString');
            $md5_low_16 = $this->md5_16($sourceString);
            $md5_up_16 = strtoupper($md5_low_16);
            $md5_low_32 = md5($sourceString);
            $md5_up_32 = strtoupper($md5_low_32);
            $this->assign("sourceString", $sourceString);
            $this->assign("md5_low_16", $md5_low_16);
            $this->assign("md5_up_16", $md5_up_16);
            $this->assign("md5_low_32", $md5_low_32);
            $this->assign("md5_up_32", $md5_up_32);
        } else {
            $this->assign("sourceString", "");
            $this->assign("md5_low_16", "");
            $this->assign("md5_up_16", "");
            $this->assign("md5_low_32", "");
            $this->assign("md5_up_32", "");
        }
        return $this->fetch();
    }

    private function md5_16($str) {
        return substr(md5($str), 8, 16);
    }

}
