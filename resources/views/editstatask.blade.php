@extends('layouts.app-master')
@section('content')
	<h1>Edit Task</h1>
	<form method="post" action="{{  url('/task/statusform/'.request()->id) }}">
		@csrf
		<table>
			<tr>
				<td><label class="control-label">Assign Task Employees</label></td>
				<td>
					<select class="form-control" name="status" required>
						<option value="">Select Status</option>
						<option value="2">In Progress</option>
						<?php if($list->sta_timestamp > time() - 60*5) { ?>
						<option value="3">Done</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" class="btn btn-success" /></td>
			</tr>
		</table>        
    </form>
@endsection