<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\Address;
use App\Model\Post;
use App\Model\Role;
use App\Model\User;
use App\Services\DocParser;
use Illuminate\Support\Facades\App;
use Swoole;
use Swoole\Coroutine as Co;

class SwooleController extends Controller
{

    /**
     * Swoole扩展
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function index()
    {
        return parent::index();
    }

    /**
     * 客户端连接Tcp
     */
    function client(){
        Co\run(function(){
            $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);

            $client->set(array(
                'timeout' => 0.5,
                'connect_timeout' => 1.0,
                'write_timeout' => 10.0,
                'read_timeout' => 0.5,
            ));

            if (!$client->connect('127.0.0.1', 9500, 0.5))
            {
                echo "connect failed. Error: {$client->errCode}\n";
            }
            $client->send("hello world\n");
            echo $client->recv();
            $client->close();
        });
    }












}

