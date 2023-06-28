@extends('layouts.app-master')
@section('content')
	<h1>Edit Employee</h1>
	<form method="post" action="{{  url('/employee/update/'.request()->id) }}">
		@csrf
		<table>
			<tr>
				<td><label class="control-label">Name</label></td>
				<td><input type="text" required name="name" class="form-control" value="<?php echo $list->name; ?>"></td>
			</tr>
			<tr>
				<td><label class="control-label">Email</label></td>
				<td><input type="email" required name="email" class="form-control" value="<?php echo $list->email; ?>"></td>
			</tr>
			<tr>
				<td><label class="control-label">Mobile Number</label></td>
				<td><input type="number" required name="mobile" class="form-control" value="<?php echo $list->mobile; ?>"></td>
			</tr>
			<tr>
				<td><label class="control-label">Department</label></td>
				<td>
					<select class="form-control" name="dept">
						<option value="1" <?php if($list->dept == '1') { echo "selected"; } ?>>Sales</option>
						<option value="2" <?php if($list->dept == '2') { echo "selected"; } ?>>Marketing</option>
						<option value="3" <?php if($list->dept == '3') { echo "selected"; } ?>>IT</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label class="control-label">Status</label></td>
				<td><input type="checkbox" name="status" value="1" <?php if($list->status == '1') { echo "checked"; } ?>/></td>
			</tr>       
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" class="btn btn-success" /></td>
			</tr>
		</table>        
    </form>
@endsection