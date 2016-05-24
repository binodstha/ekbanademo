@extends('shared.master')

@section('title')
{!! $title . " | " . $page !!}
@endsection

@section('bodycontain')
<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">Student Info || <strong>{!! $stdinfo->stdname !!}</strong></div>
		<div class="panel-body">
			<table class = 'table table-hover'>
				<tr>
					<th>ID</th>
					<td>{!! $stdinfo->stdid !!}</td>
				</tr>
				<tr>
					<th>Name</th>
					<td>{!! $stdinfo->stdname !!}</td>
				</tr>
				<tr>
					<th>Bath</th>
					<td>{!! $stdinfo->stdbatch !!}</td>
				</tr>
				<tr>
					<th>Faculty</th>
					<td>{!! $stdinfo->stdfaculty !!}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{!! $stdinfo->stdemail !!}</td>
				</tr>

			</table>
			<table>
				<tr>
					<td>
						{!! Form::open(['url' => '/index', 'method'=>'GET']) !!}
						{!! Form::submit('Home', ['class' => 'btn btn-success'])!!}
						{!! Form::close()!!}
					</td>
					@if(!Auth::guest())
					<td>
						{!! Form::open(['url' => '/edit', 'method'=>'POST']) !!}
						{!! Form::hidden('stdid', $stdinfo->stdid)!!}
						{!! Form::submit('Edit Info', ['class' => 'btn btn-warning'])!!}
						{!! Form::close()!!}
					</td>
					<td>
						{!! Form::open(['url' => '/deleteinfo', 'method'=>'POST']) !!}
						{!! Form::hidden('stdid', $stdinfo->stdid) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>"return ConformDelete('$stdinfo->stdname')"])!!}
						{!! Form::close()!!}
					</td>
					@endif
				</tr>
			</table>
		</div>
	</div>
</div>

@endsection