@extends('layouts.app-master')
@section('content')
	<h1>Add Task</h1>
	<form method="post" action="{{  url('/task/store') }}">
		@csrf
		<table>
			<tr>
				<td><label class="control-label">Title</label></td>
				<td><input type="text" required name="name" class="form-control"></td>
			</tr>
			<tr>
				<td><label class="control-label">Description</label></td>
				<td><textarea name="content" class="form-control" rows="5"></textarea></td>
			</tr>      
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" class="btn btn-success" /></td>
			</tr>
		</table>        
    </form>
@endsection