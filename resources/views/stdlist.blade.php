@extends('shared.master')

@section('title')
{!! $title . " | " . $page !!}
@endsection

@section('bodycontain')
<div class = @if (Auth::guest()) 'col-lg-12' @else 'col-lg-8' @endif>
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">Student List</div>
            <div class="panel-body">
                @if($error == 'deleted')
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    The Student info id deleted !!!   
                </div>
                @elseif($error == 'updated')
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    The student info is updated  !!!
                </div>
                @endif

                @if(count($stdlist) == 0)
                <div class="alert alert-info" role="alert">
                    <strong>Info!</strong>
                    The list is empty.
                </div>
                @else
                <div class="table-responsive">
                    <table class = 'table table-striped'> 
                        <tr>

                            <th>Name</th>
                            <th>Batch</th>
                            <th>Faculty</th>
                            <th>Email</th>
                            <th colspan="2"></th> 
                        </tr>

                        @foreach($stdlist as $list)
                        <tr>

                            <td>{!! Html::link('/info/'. $list->stdid, $list->stdname) !!}</td>
                            <td>{!! $list->stdbatch !!}</td>
                            <td>{!! $list->stdfaculty !!}</td>
                            <td>{!! $list->stdemail !!}</td>
                            @if(!Auth::guest())
                            <td>
                                {!! Form::open(['url' => '/edit', 'method'=>'POST']) !!}
                                {!! Form::hidden('stdid', $list->stdid) !!}
                                {!! Form::submit('Edit Info', ['class' => 'btn btn-warning']) !!}
                                {!! Form::close() !!}
                            </td> 

                            <td>
                                {!! Form::open(['url' => '/deleteinfo', 'method' => 'POST']) !!}
                                {!! Form::hidden('stdid', $list->stdid) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger', "onclick" =>"return ConformDelete('$list->stdname')"])!!}
                                {!! Form::close()!!}
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="pagination-area">
                    @if($error != 'search')
                    {!! $stdlist->render() !!}
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@if (!Auth::guest())
<div class = 'col-lg-4'>
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">Faculty</div>
            <div class="panel-body">
            @if($error == 'existfaculty')
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                The Faculty <strong>{!! $_POST['faculty'] !!} </strong> already exist.
            </div>
             @elseif($error == 'addedfaculty')
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Success:</span>
               The Faculty <strong>{!! $_POST['faculty'] !!} </strong> is added.
            </div>
            @endif
                {!! Form::open(['url' => '/addfaculty', 'method' => 'POST']) !!}
                {!! Form::text('faculty', null, array('required', 
                  'class'=>'form-control', 
                  'placeholder'=>'Enter Faculty')) !!}
                  {!! Form::submit('Add Faculty', ['class' => 'btn btn-success',])!!}
                  {!! Form::close() !!}
              </div>
          </div>
      </div>

      <br/><hr/><br/>
      <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">Batch</div>

            <div class="panel-body">
                        @if($error == 'existbatch')
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                The Batch <strong>{!! $_POST['batch'] !!} </strong> already exist.
            </div>
             @elseif($error == 'addedbatch')
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Success:</span>
               The Batch <strong>{!! $_POST['batch'] !!} </strong> is added.
            </div>
            @endif
              {!! Form::open(['url' => '/addbatch', 'method' => 'POST']) !!}
              {!! Form::text('batch', null, array('required', 
               'class'=>'form-control', 
               'placeholder'=>'Enter Batch')) !!}
               {!! Form::submit('Add Batch', ['class' => 'btn btn-success',])!!}
               {!! Form::close()!!}
           </div>
       </div>
   </div>
</div>
@endif
@endsection
