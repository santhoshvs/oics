@extends('layouts.app-master')
@section('content')
	<div class="col-sm-12 text-right"><a href="{{ url('/task/add') }}" class="btn btn-primary">Add Tak</a></div>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Title</th>
				<th class="text-center">Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($lists as $item)
			<tr class="item{{$item->id}}">
				<td>{{$item->id}}</td>
				<td>{{$item->name}}</td>
				<?php if($item->status == '0') { ?>
				<td>Un Assigned</td>
				<?php } elseif($item->status == '2') { ?>
				<td>In Progress</td>
				<?php } elseif($item->status == '3') { ?>
				<td>Done</td>
				<?php } else { ?>
				<td>Assigned</td>
				<?php } ?>
				<?php if($item->status != '3') { ?>
				<td><button class="edit-modal btn btn-info">
						<a class="glyphicon glyphicon-edit text-white" href="{{ url('/task/edit/'.$item->id) }}">Edit</a> 
					</button>
					<button class="delete-modal btn btn-danger">
						<a class="glyphicon glyphicon-trash text-white" href="{{ url('/task/delete/'.$item->id) }}">Delete</a> 
					</button>
					<button class="delete-modal btn btn-info ">
						<a class="glyphicon glyphicon-edit text-white" href="{{ url('/task/status/'.$item->id) }}">Change Status</a> 
					</button>
				</td>
				<?php } ?>
			</tr>
			@endforeach
		</tbody>
    </table>
@endsection