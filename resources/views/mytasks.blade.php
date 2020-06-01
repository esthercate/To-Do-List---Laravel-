@extends('layouts.app')

@section('title', 'My ToDo App')

@section('content')
<style>
	.main{
		margin-top: 40px;
	}

</style>

<div class="card main">
	<div class="card-header">
		ToDo App
	</div>
	<div class="card-body">

	<!--Display Validation Errors-->
	@include('common.errors')

	<!--Create new task form-->

	<form method="post" action="{{route('tasks.store')}}">
		@csrf
		<div class="form-group">
			<label for="task_name">Add New Task</label>
			<input type="text" class="form-control" name="task_name">
		</div>
		<button type="submit" class="btn btn-success">Add Task</button>
	</form>
	</div>
</div>

<!--Index blade to show task list created-->
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
	<table class="table-light" width="50%">
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
						<button class="btn btn-info" type="submit">Delete Task</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
@stop

