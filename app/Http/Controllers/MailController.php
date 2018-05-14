<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends \Illuminate\Routing\Controller
{

    //
    public function send()
    {
        // $this->demo1();
        // $this->demo2();
        // $this->demo3();
//         $this->demo4();
           $this->demo5();
    }

    /**
     * 简单文本
     */
    protected function demo1()
    {
        \Mail::raw('test mail', function ($m) {
            $m->from('jjxuhuade11@163.com', 'jjxuhuade11');
            $m->to('jjxuhuade@163.com')->subject('test email');
        });
    }

    /**
     * 模板
     */
    protected function demo2()
    {
        $name = '王宝花';
        // Mail::send()的返回值为空，所以可以其他方法进行判断
        \Mail::send('emails.test', [
            'name' => $name
        ], function ($m) {
            $m->from('jjxuhuade11@163.com', 'jjxuhuade11');
            $m->to('jjxuhuade@163.com')->subject('test email');
        });
        // 返回的一个错误数组，利用此可以判断是否发送成功 dd(Mail::failures()); }
    }

    /**
     * 远程图片
     */
    protected function demo3()
    {
        $name = '王宝花';
        $image = "http://d.hiphotos.baidu.com/zhidao/pic/item/1ad5ad6eddc451da4ab93e2bb0fd5266d11632a6.jpg";
        // Mail::send()的返回值为空，所以可以其他方法进行判断
        \Mail::send('emails.demo4', [
            'name' => $name,
            'imgPath' => $image
        ], function ($m) {
            $m->from('jjxuhuade11@163.com', 'jjxuhuade11');
            $m->to('jjxuhuade@163.com')->subject('test email');
        });
        
        if (count(\Mail::failures()) < 1) {
            echo '发送邮件成功，请查收！';
        } else {
            echo '发送邮件失败，请重试！';
        }
    }

    /**
     * 本地图片
     */
    protected function demo4()
    {
        $name = '王宝花';
        $image = \Storage::disk('public')->get('3.png');
        // Mail::send()的返回值为空，所以可以其他方法进行判断
        \Mail::send('emails.demo4', [
            'name' => $name,
            'imgPath' => $image
        ], function ($m) {
            $m->from('jjxuhuade11@163.com', 'jjxuhuade11');
            $m->to('jjxuhuade@163.com')->subject('test email');
        });
        
        if (count(\Mail::failures()) < 1) {
            echo '发送邮件成功，请查收！';
        } else {
            echo '发送邮件失败，请重试！';
        }
    }

    /**
     * @desc 附件
     */
    protected function demo5()
    {
        $name = '王宝花';
        \Mail::send('emails.test', [
            'name' => $name
        ], function ($m) {
            $m->from('jjxuhuade11@163.com', 'jjxuhuade11');
            $m->to('jjxuhuade@163.com')->subject('邮件主题');
            
            $attachment = storage_path('app/images/1.jpg'); // 在邮件中上传附件
            $m->attach($attachment, [
                'as'=>"=?UTF-8?B?".base64_encode('中文文档')."?=.jpg"
            ]);
        });
    }
}
