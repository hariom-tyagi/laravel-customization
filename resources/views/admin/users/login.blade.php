<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin/layouts/templates/header_includes')
    </head>
    <body>
        <div class="body-container">
            <div class="main-container container bgc-transparent">
                <div class="main-content minh-100 justify-content-center">
                    <div class="p-2 p-md-4">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="col-sm-12">
                                    <h4 class="text-center text-primary font-weight-bold">Admin Login</h4> 
                                </div>
                                <?= Form::open(['method' => 'POST', 'id' => 'admin_login_form', 'url' => url('admin/checkAdminLogin'), 'autocomplete' => 'off', 'class' => 'form-row mt-4']) ?>
                                <div class="form-group col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                                    {{Form::email('email','',['placeholder'=>'Email','id'=>'email','class'=>'form-control form-control-md pr-4 shadow-none'])}}
                                </div>
                                <div class="form-group col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                                    {{Form::password('password',['placeholder'=>'Password','class'=>'form-control form-control-md pr-4 shadow-none','id'=>'password'])}}
                                </div>
                                <div class="form-group col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                                    {{Form::submit('SIGN IN',['class'=>'btn btn-primary btn-block px-4 btn-bold mt-2 mb-4'])}}
                                </div>
                                <?= Form::close() ?>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{url('assets/admin/js/users/login.js')}}"></script>
        @include('admin/layouts/templates/footer_includes')
    </body>
</html>