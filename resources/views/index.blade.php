@extends('layouts.app-master')
@section('content')
	<div class="col-sm-12 text-right"><a href="{{ url('/employee/add') }}" class="btn btn-primary">Add Employee</a></div>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Name</th>
				<th class="text-center">Email</th>
				<th class="text-center">Mobile No</th>
				<th class="text-center">Department</th>
				<th class="text-center">Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($lists as $item)
			<tr class="item{{$item->id}}">
				<td>{{$item->id}}</td>
				<td>{{$item->name}}</td>
				<td>{{$item->email}}</td>
				<td>{{$item->mobile}}</td>
				<?php if($item->dept == '1') { ?>
				<td>Sales</td>
				<?php } elseif($item->dept == '2') { ?>
				<td>Marketing</td>
				<?php } else { ?>
				<td>IT</td>
				<?php } ?>
				<?php if($item->status == '1') { ?>
				<td>Active</td>
				<?php } else { ?>
				<td>In Active</td>
				<?php } ?>
				<td><button class="edit-modal btn btn-info">
						<a class="glyphicon glyphicon-edit" href="{{ url('/employee/edit/'.$item->id) }}">Edit</a> 
					</button>
					<button class="delete-modal btn btn-danger">
						<a class="glyphicon glyphicon-trash" href="{{ url('/employee/delete/'.$item->id) }}">Delete</a> 
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
    </table>
@endsection