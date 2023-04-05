<?php
/**
 * 处理所有自定义页面的逻辑
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }
}
