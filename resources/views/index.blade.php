@extends('layouts.app')

@section('title', 'Current Tasks')

@section('content')

<style>
	.main{
		margin-top: 40px;
	}
</style>

<div class="card main">
@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success')}}
	</div><br>
@endif

<div class="card-header">
	Current Tasks
</div>
<div class="card-body">
	<table class="table-striped table-responsive-lg">
		<thead>
			<tr>
				<td>Task Name</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($tasklist as $list)
			<tr>
				<td>{{$list->task_name}}</td>
				<td>
					<form action="{{route('tasks.destroy', $list->id)}}" method="post">
					@csrf
					@method('DELETE')
						<button class="btn btn-danger" type="submit">Delete Task</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
@stop