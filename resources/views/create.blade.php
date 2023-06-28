@extends('layouts.app-master')
@section('content')
	<h1>Add Employee</h1>
	<form method="post" action="{{  url('/employee/store') }}">
		@csrf
		<table>
			<tr>
				<td><label class="control-label">Name</label></td>
				<td><input type="text" required name="name" class="form-control"></td>
			</tr>
			<tr>
				<td><label class="control-label">Email</label></td>
				<td><input type="email" required name="email" class="form-control"></td>
			</tr>
			<tr>
				<td><label class="control-label">Mobile Number</label></td>
				<td><input type="number" required name="mobile" class="form-control"></td>
			</tr>
			<tr>
				<td><label class="control-label">Department</label></td>
				<td>
					<select class="form-control" name="dept">
						<option value="1">Sales</option>
						<option value="2">Marketing</option>
						<option value="3">IT</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label class="control-label">Status</label></td>
				<td><input type="checkbox" name="status" value="1" /></td>
			</tr>       
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" class="btn btn-success" /></td>
			</tr>
		</table>        
    </form>
@endsection