<?php
namespace App\Http\Controllers\Admin\Home;

use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('admin.home.index');
    }
}
