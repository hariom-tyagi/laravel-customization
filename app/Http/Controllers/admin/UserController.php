<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\AdminLoginRequest;

class UserController extends Controller {

    function login() {
        return view('admin/users/login');
    }

    function checkAdminLogin(AdminLoginRequest $request) {
        echo '<pre>';
        print_r($request->all());
        die;
    }

}
