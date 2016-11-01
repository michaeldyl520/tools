<?php

namespace app\index\controller;

use think\Controller;

/**
 * Description of Unicodedecode
 * @author DYL <michaeldyl520@gmail.com at jiliuke.com>
 * @date 2016-10-31 17:29:25
 * @copyright Copyright (C) jiliuke.com
 */
class Unicodedecode extends Controller {

    public function index() {
        $this->assign("title", "unicode_decode" . "-" . config('site_name'));
        $this->assign("description", "PHP函数在线包括md5,timestamp,ip2long,long2ip,unicode_decode等等PHP函数在线运行" . "-" . config('site_name'));
        $this->assign("keywords", "unicode_decode,PHP函数在线运行,PHP函数在线,md5,timestamp,ip2long,long2ip" . "-" . config('site_name'));
        return $this->fetch();
    }

    public function getUnicodedecodeStr() {
        $data = input('post.data');
        $tmp = $this->change($data);
        echo $tmp;
        exit;
    }

    public function change($name) {
        // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
        $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
        preg_match_all($pattern, $name, $matches);
        if (!empty($matches)) {
            $name = '';
            for ($j = 0; $j < count($matches[0]); $j++) {
                $str = $matches[0][$j];
                if (strpos($str, '\\u') === 0) {
                    $code = base_convert(substr($str, 2, 2), 16, 10);
                    $code2 = base_convert(substr($str, 4), 16, 10);
                    $c = chr($code) . chr($code2);
                    $c = iconv('UCS-2', 'UTF-8', $c);
                    $name .= $c;
                } else {
                    $name .= $str;
                }
            }
        }
        return $name;
    }

}
