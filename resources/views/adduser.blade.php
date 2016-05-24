@extends('shared.master')

@section('title')
{!! $title . " | " . $page !!}
@endsection

@section('bodycontain')
<h3 class = 'h3'>Add new User info</h3>

@if($error == 'matched')
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        The EmailID <strong>{!! $_POST['email'] !!} </strong> already exist.
    </div>
@elseif($error == 'added')
    <div class="alert alert-success" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Success:</span>
        The new info is added.
    </div>
@endif

{!! Form::open(array('url' => 'verifyuser', 'class' => 'form', 'method' => 'POST')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
            @if (isset($_POST['name']))
                {!! Form::text('name', $_POST['name'], array('required', 
                                                   'class'=>'form-control', 
                                                   'placeholder'=>'Enter Your Name')) !!}
            @else
                            {!! Form::text('name', null, array('required', 
                                                   'class'=>'form-control', 
                                                   'placeholder'=>'Enter Your Name')) !!}
            @endif
            </div>
    </div>

        <div class="form-group">
        {!! Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::password('password',array('required', 
                                                  'class' => 'form-control', 
                                                  'placeholder' => 'Enter password')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('re_password', 'Re-Password', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::password('re_password',  array('required',
                                                       'class' => 'form-control',
                                                       'onChange' => 'chk_password(); return false;', 
                                                       'placeholder'=>'Re-Enter password')) !!}
        </div>
    </div> 

     <div class="form-group">
        {!! Form::label('email', 'E-mail Address', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
        @if($error == 'matched')
                {!! Form::email('email', $_POST['email'], array('required', 
                                                     'class' => 'form-control error', 
                                                     'placeholder' => 'Enter Your Email Address')) !!}
            @else
                {!! Form::email('email', null, array('required', 
                                                     'class' => 'form-control', 
                                                     'placeholder' => 'Enter Your Email Address')) !!}
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class = 'col-sm-offset-2 col-sm-10'>
            {!! Form::submit('Add Info',  array('id' => 'submit',
                                                'class' => 'btn btn-primary'
                                                )) !!}
        </div>
    </div>
{!! Form::close() !!} 
@endsection