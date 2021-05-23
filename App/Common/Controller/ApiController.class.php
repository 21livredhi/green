<?php

namespace Common\Controller;

use Think\Controller;

/**
 * API接口基类
 */
class ApiController extends Controller {
    
    /**
     * 初始化方法
     */
    public function _initialize() {
        $isTest = I('get.test', '');
        if(empty($isTest)) {
            $this->verify();
        }
    }
        
    
    /**
     * 验证接口
     */
    protected function verify() {
        $key = I('get.key', '');
        if(empty($key)) {
            apiReturn('非法请求', 300);
        }
        
        $apiKey = C('API_KEY');
        $rule = strtoupper(MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME);
        if($key !== md5($rule . $apiKey)) {
            apiReturn('非法请求', 300);
        }
    }
}