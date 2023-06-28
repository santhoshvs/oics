@extends('layouts.app-master')
@section('content')
	<h1>Edit Task</h1>
	<form method="post" action="{{  url('/task/update/'.request()->id) }}">
		@csrf
		<table>
			<tr>
				<td><label class="control-label">Name</label></td>
				<td><input type="text" required name="name" class="form-control" value="<?php echo $list->name; ?>"></td>
			</tr>
			<tr>
				<td><label class="control-label">Description</label></td>
				<td><textarea name="content" class="form-control" rows="5"><?php echo $list->content; ?></textarea></td>
			</tr>  
			<?php if($list->status == '0' || $list->status == '1') { ?>
			<tr>
				<td><label class="control-label">Assign Task Employees</label></td>
				<td>
					<select class="form-control" name="emp_id">
						<option value="">Select Employee</option>
						<?php foreach($users as $user) { ?>
						<option value="1" <?php if($list->emp_id == $user->id) { echo "selected"; } ?>><?php echo $user->name; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" class="btn btn-success" /></td>
			</tr>
		</table>        
    </form>
@endsection