@extends('shared.master')

@section('title')
{!! $title . " | " . $page !!}
@endsection

@section('bodycontain')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
    <div class="panel-heading">Edit Student Info || <strong>{!! $stdinfo->stdname !!} </strong></div>
        <div class="panel-body">
            {!! Form::open(array('url' => 'editinfo', 'class' => 'form', 'method' => 'POST')) !!}
            {!! Form::hidden('id', $stdinfo->stdid) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('name', $stdinfo->stdname, array('required', 
                      'class' => 'form-control',
                      'placeholder' => 'Enter your name')) !!}
                  </div>
              </div>

              <div class="form-group">
                {!! Form::label('batch', 'Batch', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('batch', $stdinfo->stdbatch, array('required', 
                      'class' => 'form-control',
                      'placeholder' => 'Enter your Batch')) !!}
                  </div>
              </div>
              <div class="form-group">
                {!! Form::label('faculty', 'Faculty', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('faculty', $stdinfo->stdfaculty, array('required', 
                      'class' => 'form-control',
                      'placeholder' => 'Enter Your Faculty')) !!}
                  </div>
              </div>
              <div class="form-group">
                {!! Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('email', $stdinfo->stdemail, array('required', 
                        'class' => 'form-control',   
                        'placeholder' => 'Enter Your Email')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class = 'col-sm-offset-2 col-sm-10'>
                        {!! Form::submit('Edit Info',  array('id' => 'submit',
                        'class' => 'btn btn-primary' )) !!}
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
    @endsection



