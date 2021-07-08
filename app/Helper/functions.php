<?php
/**
 * 保存配置项
 */
if (!function_exists('option_set')) {
    function option_set($name,$value){
        return \App\Model\Options::query()->where('option_name',$name)->updateOrInsert(['option_name'=>$name],['option_value'=>serialize($value)]);
    }
}

/**
 * 获取配置项
 */
if (!function_exists('option_get')) {
    function option_get($name){
        static $options;
        if(!isset($options[$name])){
            $options[$name] = \App\Model\Options::query()->where('option_name',$name)->value('option_value');
        }
        return $options[$name];
    }
}

/**
 * 通过数组获取配置项
 */
if (!function_exists('option_get_with')) {
    function option_get_with($array){
        $model = \App\Model\Options::query()->whereIn('option_name',$array);
        return $model->count()?$model->pluck('option_value')->toArray():[];
    }
}

/**
 * OSS是否启用
 */
if (!function_exists('oss_status')) {
    function oss_status(){
        static $oss_status;
        if(is_null($oss_status)){
            $oss_status = \App\Model\ConfigOss::checkWork();
        }
        return $oss_status;
    }
}

/**
 * 获取OSS地址
 */
if (!function_exists('get_oss_path')) {
    function get_oss_path(){
        static $oss_path;
        if(is_null($oss_path)){
            $oss = \App\Model\ConfigOss::query()->first();
            $oss_path = $oss->url?($oss->url.'images/'):'';
        }
        return $oss_path;
    }
}

/**
 * 获取OSS域名
 */
if (!function_exists('get_oss_url')) {
    function get_oss_url(){
        static $oss_url;
        if(is_null($oss_url)){
            $oss_url = App\Model\ConfigOss::find(1)->url;
        }
        return $oss_url;
    }
}

if (!function_exists('nick_encode')) {
    function nick_encode($nick){
        return (mb_substr($nick, 0,1).'*****')?:'';
    }
}

/**
 * 记录日志
 */
if (!function_exists('log_json')) {
    function log_json($dir,$method,$msg){
        $path = public_path('logs/'.$dir.'/'.$method.'/');
        $filename = date('Ymd').'.log';
        $msg = date('[Y-m-d H:i:s]').$msg;
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }
        file_put_contents($path.'/'.$filename,$msg.PHP_EOL,FILE_APPEND);
    }
}

if (!function_exists('http_request')) {
    function http_request($url, $data=FALSE, $aHeader=FALSE, $method=null, $message='',$getInfo=0){
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        if($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
        } else if($method == 'PATCH'){
            curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PATCH"); //设置请求方式
        }elseif ($method == 'DELETE') {
           curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        }
        if($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        if($aHeader) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
        }
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $logger = new \App\Http\Helpers\Api\OrderCurlLog();
        $logger->curlLog($data,$method , $url,
            $aHeader, $return_code, json_encode($res) );
        logger($message, [
            'time' => date('Y-m-d H:i:s'),
            'url' => $url,
            'method' => $method,
            'header' => $aHeader,
            'params' => $data,
            'response' => $res,
            'error'=> curl_error($ch),
        ]);
        if($getInfo)
        {
            $response['body'] = $res;
            $response['infocode'] = curl_getinfo($ch,CURLINFO_HTTP_CODE);
            return $response;
        }
        curl_close($ch);
        return $res;
    }

}


/**
 * 通过$_SERVER['HTTP_APP_NAME'] $_SERVER['HTTP_BRAND_CODE'] 获取多品牌配置
 * $_SERVER['HTTP_APP_NAME']   ：    uat  production
 * $_SERVER['HTTP_BRAND_CODE'] ：    CSS  MB MG PROMESSA EMPHASIS
 * @param $part 配置段
 * @param $key  配置key
 * @return mixed
 * @throws Exception
 */
function getBrandConfig($part,$key){
    $part =strtoupper($part);
    $key =strtoupper($key);
    $config = require ('./config/brand.php');
    if(empty($config)){
        throw new \Exception('品牌配置没有初始化');
    }
    //生产环境APP_NAME不传值
    //uat环境APP_NAME：production、uat
    if(isset($_SERVER['HTTP_APP_NAME']) && $_SERVER['HTTP_APP_NAME']){
        $appName = strtoupper($_SERVER['HTTP_APP_NAME']);
    }else{
        $appName = 'PRODUCTION';
    }

    if(!isset($config[$appName])){
        throw new \Exception(sprintf('param App-Name=%s invalid',$appName));
    }

    if(!isset($config[$appName][$part])){
        throw new \Exception(sprintf('param part=%s invalid',$part));
    }

    if(isset($_SERVER['HTTP_BRAND_CODE']) && $_SERVER['HTTP_BRAND_CODE']){
        $brandCode = strtoupper($_SERVER['HTTP_BRAND_CODE']);
    }else{
        throw new \Exception('brand-code is empty');
    }

    if(!isset($config[$appName][$part][$brandCode])){
        throw new \Exception(sprintf('Header Brand-Code=%s invalid',$brandCode));
    }

    if(isset($config[$appName][$part][$brandCode][$key])){
        return $config[$appName][$part][$brandCode][$key];
    }else{
        throw new \Exception(sprintf("key=%s invalid",$key));
    }
}





