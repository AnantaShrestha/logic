<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Login</title>
    <!-- Favicon icon -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-4">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    {!! Form::open(['url'=>route('admin.loginProcess'),'class'=>'form-data']) !!}
                                        <div class="form-group">
                                            <strong>{!! Form::label('username', 'Username') !!}</strong>
                                            {!! Form::text('username',old('username'),['class'=>'form-control','placeholder'=>'Username','data-required'=>'required']) !!}
                                            @if($errors->has('username'))
                                            @foreach($errors->get('username') as $message)
                                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="form-group">
                                           <strong>{!!Form::label('password', 'Password') !!}</strong>
                                            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password','data-required'=>'required']) !!}
                                            @if($errors->has('password'))
                                            @foreach($errors->get('password') as $message)
                                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1" name="remember" value="1"
                  {{ (old('remember')) ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
    @include($ADMINTEMPLATEROOT.'scripts.validation')
