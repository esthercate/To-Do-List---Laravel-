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

	<!--New task form-->

	<form method="post" action="{{url('task')}}">
		@csrf

		<div class="form-group">
			<label for="task_name">Add New Task</label>
			<input type="text" class="form-control" name="task_name">
		</div>
		<button type="submit" class="btn btn-success">Add Task</button>
	</form>
	</div>
</div>
@stop

