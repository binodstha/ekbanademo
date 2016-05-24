@extends('shared.master')

@section('title')
{!! $title . " | " . $page !!}
@endsection

@section('bodycontain')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">Add new Student info</div>

        <div class="panel-body">

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

            {!! Form::open(array('url' => 'addinfo', 'class' => 'form', 'method' => 'POST')) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    @if (isset($_POST['name']))
                    {!! Form::text('name', $_POST['name'], array('required', 
                       'class'=>'form-control', 
                       'placeholder'=>'Enter Your Name')) !!}
                       @else
                       {!! Form::text('name', null , array('required', 
                           'class'=>'form-control', 
                           'placeholder'=>'Enter Your Name')) !!}
                           @endif
                       </div>
                   </div>

                   <div class="form-group">
                    {!! Form::label('batch', 'Batch', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        @if (isset($_POST['batch']))
                        {!! Form::text('batch', $_POST['batch'], array('required', 
                         'class' => 'form-control', 
                         'placeholder' => 'Enter Your Batch')) !!}
                         @else
                         {!! Form::text('batch', null, array('required', 
                          'class' => 'form-control', 
                          'placeholder' => 'Enter Your Batch')) !!}
                          @endif
                      </div>
                  </div>

                  <div class="form-group">
                    {!! Form::label('faculty', 'Faculty', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        @if (isset($_POST['faculty']))
                        {!! Form::text('faculty', $_POST['faculty'],  array('required',
                           'class' => 'form-control', 
                           'placeholder'=>'Enter Your Faculty')) !!}
                           @else
                           {!! Form::text('faculty', null,  array('required',
                               'class' => 'form-control', 
                               'placeholder'=>'Enter Your Faculty')) !!}
                               @endif
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
                            {!! Form::label('dob', 'Date of Birth', array('class' => 'col-sm-2 control-label')) !!}
                            <div class="col-sm-10">
                                @if(isset($_POST['dob']))
                                {!! Form::date('dob', $_POST['dob'],  array('required',
                                   'id' => 'dob',
                                   'class' => 'form-control',
                                   'onchange' => 'chk_dob()' )) !!}
                                   @else
                                   {!! Form::date('dob', null,  array('required',
                                       'id' => 'dob',
                                       'class' => 'form-control',
                                       'onchange' => 'chk_dob()' )) !!}
                                       @endif
                                       <span id="confirmMessage" class="confirmMessage"></span>
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
                            </div>
                        </div>
                    </div>
                    @endsection