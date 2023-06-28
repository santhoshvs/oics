<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;;
use Session;
use DB;

class TaskController extends Controller
{
    public function index() 
    {
		$users = DB::table('employee')->get();
        return view('index', ['lists' => $users]);
    }
	public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $this->validate($request, array(
				'name' => 'required',
				'email' => 'required',
				'mobile' => 'required',
				'dept' => 'required',
			)
		);
        $input = $request->all();
		$input['status'] = $request->status ? 1 : 0;
		//print_r($input);die();
        Employee::create($input);
        Session::flash('success', 'Employee added successfully!');
        return redirect()->route('home.index');
    }
    public function edit($id)
    {
        $list = Employee::findOrFail($id);
        return view('edit', array('list' => $list));
    }
    public function update(Request $request, $id)
    {
        $emp = Employee::findOrFail($id);
        $this->validate($request, array(
				'name' => 'required',
				'email' => 'required',
				'mobile' => 'required',
				'dept' => 'required',
			)
		);
        $input = $request->all();
		$input['status'] = $request->status ? 1 : 0;
        $emp->fill($input)->save();
        Session::flash('success', 'Employee updated successfully!');
        return redirect()->route('home.index');
    }
    public function destroy($id)
    {
        $emp = Employee::findOrFail($id);
        $emp->delete();
        Session::flash('success', 'News deleted successfully!');
        return redirect()->route('home.index');
    }
	public function task() 
    {
		$users = DB::table('task')->get();
        return view('task', ['lists' => $users]);
    }
	public function createtask()
    {
        return view('createtask');
    }
    public function storetask(Request $request)
    {
        $this->validate($request, array(
				'name' => 'required',
			)
		);
        $input = $request->all();
		Task::create($input);
        Session::flash('success', 'Task added successfully!');
        return redirect()->route('task.index');
    }
    public function edittask($id)
    {
        $list = Task::findOrFail($id);
        return view('edittask', array('list' => $list));
    }
    public function updatetask(Request $request, $id)
    {
        $emp = Task::findOrFail($id);
        $this->validate($request, array(
				'name' => 'required',
			)
		);
        $input = $request->all();
		$emp->fill($input)->save();
        Session::flash('success', 'Task updated successfully!');
        return redirect()->route('task.index');
    }
    public function destroytask($id)
    {
        $emp = Task::findOrFail($id);
        $emp->delete();
        Session::flash('success', 'Task deleted successfully!');
        return redirect()->route('task.index');
    }
}