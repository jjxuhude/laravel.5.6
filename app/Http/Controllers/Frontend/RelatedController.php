<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\User;
use App\Services\DocParser;
use Illuminate\Support\Facades\App;

class RelatedController extends Controller
{

    /**
     * 关联模型
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function index()
    {
        return parent::index();
    }


    /**
     * 一对多模型
     * @method GET
     * @param int $id
     *
     */
    function hasMany($id=1)
    {
        $user =User::find($id);
        return View('frontend.related.hasmany',['user'=>$user]);
    }

    /**
     * url
     */
    function url($path)
    {
        dump(request()->url());
    }

    /**
     * method
     */
    function method()
    {
        dump(request()->method());
    }

    /**
     * query
     */
    function query()
    {
        dump(request()->query('name'));
    }

    /**
     * doc
     *
     * @param Illuminate\Support\Facades\App $aaa            
     * @param int $bbb            
     */
    function doc($aaa = 0, $bbb = 1)
    {
        dump(resolve('docParser')->parse(new \ReflectionMethod($this, 'doc')));
    }

    /**
     * phpinfo
     */
    function p()
    {
        phpinfo();
    }
    
    /**
     * @desc 加密解密
     */
    function crypt(){
        $enString=encrypt('user01');
        dump($enString);
        $deString= decrypt($enString);
        dump($deString);
        
    }
}

