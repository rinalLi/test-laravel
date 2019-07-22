<?php
/**
 * Created by PhpStorm.
 * User: rinal
 * Date: 2019/7/22
 * Time: 下午4:57
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ApiController
{
    public function upload(Request $request)
    {
        $files = $request->files;
        foreach ($files as $file) {
            var_dump($file);
        }
    }
}