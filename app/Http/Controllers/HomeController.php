<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;;
use Session;
use DB;
use Mail;

class HomeController extends Controller
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
		$data = array('email'=> $request->email,'name'=> $request->name); 
		Mail::send(['text'=>'mail'], $data, function($message) {
		 $message->to('admin@otaskit.com', 'ocis')->subject('Task');
		 $message->from($data['email'], $data['name']);
		});
        Session::flash('success', 'Task added successfully!');
        return redirect()->route('task.index');
    }
    public function edittask($id)
    {
        $list = Task::findOrFail($id);
		$users = DB::table('employee')->get();
        return view('edittask', array('list' => $list,'users' => $users));
    }
    public function updatetask(Request $request, $id)
    {
        $emp = Task::findOrFail($id);
        $this->validate($request, array(
				'name' => 'required',
			)
		);
        $input = $request->all();
		if($request->emp_id != '') 
		{
			$input['status'] = '1';
			$data = array('email'=> $request->email,'name'=> $request->name); 
			Mail::send(['text'=>'mailemp'], $data, function($message) {
			 $message->to($data['email'], $data['name'])->subject('Task');
			 $message->from('admin@otaskit.com', 'ocis');
			});
		}
		else
		{
			$input['status'] = '0';
		}
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
	public function status($id)
    {
        $list = Task::findOrFail($id);
		return view('editstatask', array('list' => $list));
    }
    public function statusform(Request $request, $id)
    {
        $emp = Task::findOrFail($id);
        $this->validate($request, array(
				'status' => 'required',
			)
		);
        $input = $request->all();
		$input['sta_timestamp'] = time();
		$emp->fill($input)->save();
        Session::flash('success', 'Task updated successfully!');
        return redirect()->route('task.index');
    }
}