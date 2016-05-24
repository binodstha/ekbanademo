<?php

namespace App\Http\Controllers;

use App\User;
use App\Stdinfo;
use App\Faculty;
use App\Batch;
use App\Http\Requests;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class EkbanaCurd extends Controller
{
	var $stdinfo;
	var $validate;
	var $stdlist;
	var $searchlist;
	var $search;

	public function __construct()
	{
		$this->stdlist = Stdinfo::paginate(5);
		$this->search = Stdinfo::All();
		$this->validate = new \Ekbana\Validate\validation;
		
	}

	public function index($error = null)
	{
		return view('stdlist', ['stdlist' => $this->stdlist, 'page' => 'List user', 'title' => 'Home', 'error' => $error]);
	}

	public function addinfo($error = null)
	{
		
		return view('addinfo', ['page' => 'Add Student Info', 'title' => 'Home', 'error' => $error]);
	}

	public function verifyinfo()
	{
		$info = $this->validate->chk_email(Request::get('email'));
		if ($info) {
			Stdinfo::create(['stdname' => Request::get('name'), 
							 'stdbatch' => Request::get('batch'),
							 'stdemail' => Request::get('email'),
							 'stdfaculty' => Request::get('faculty')]);
			return redirect()->action('EkbanaCurd@addinfo', ['added']);
		} else {
			return view('addinfo', ['page' => 'Add Student Info', 'title' => 'Home', 'error' => 'matched']);
		}
	}

	public function info($id = null)
	{
		if($id != null) {
			$this->stdinfo = Stdinfo::find($id);
			return view('stdinfo', ['stdinfo' => $this->stdinfo, 'page' => $this->stdinfo->stdname, 'title' => 'Info']);
		}
	} 
	
	public function edit()
	{
		$this->stdinfo = Stdinfo::find(Request::get('stdid'));
		return view('editinfo', ['stdinfo' => $this->stdinfo, 'page' => $this->stdinfo->stdname, 'title' => 'Edit']);
	}

	public function editinfo()
	{
		$this->stdinfo = Stdinfo::find(Request::get('id'));
		$this->stdinfo->stdname = Request::get('name');
		$this->stdinfo->stdbatch = Request::get('batch');
		$this->stdinfo->stdfaculty = Request::get('faculty');
		$this->stdinfo->stdemail = Request::get('email');
		$this->stdinfo->save();
		return redirect()->action('EkbanaCurd@index', ['updated']);
	}

	public function deleteinfo()
	{
		$this->stdinfo = Stdinfo::find(Request::get('stdid'));
		$this->stdinfo->delete();
		return redirect()->action('EkbanaCurd@index', ['deleted']);
	}

	public function search(){
		foreach($this->search as $list) {
			if ((strpos(strtolower($list->stdname), strtolower(Request::get('entry'))) !== false) 
				OR strtolower($list->stdfaculty) == strtolower(Request::get('entry')) 
				OR strtolower($list->stdbatch) == strtolower(Request::get('entry'))
				OR strtolower($list->stdemail) == strtolower(Request::get('entry'))
				)
				$this->searchlist[] = $list;
		}
		return view('stdlist', ['stdlist' => $this->searchlist, 'title' => 'Search', 'page' => Request::get('entry'), 'error'=> 'search']);
	}

	public function addfaculty()
	{
		$info = $this->validate->chk_faculty(Request::get('faculty'));
		if ($info) {
			Faculty::create(['facname' => Request::get('faculty'),]);
			
			return view('stdlist', ['stdlist' => $this->stdlist, 'page' => 'List user', 'title' => 'Home', 'error' => 'addedfaculty']);
		} else {
			return view('stdlist', ['stdlist' => $this->stdlist, 'page' => 'List user', 'title' => 'Home', 'error' => 'existfaculty']);
		}
	}

		public function addbatch()
	{
		$info = $this->validate->chk_batch(Request::get('batch'));
		if ($info) {
			Batch::create(['batname' => Request::get('batch'),]);
			
			return view('stdlist', ['stdlist' => $this->stdlist, 'page' => 'List user', 'title' => 'Home', 'error' => 'addedbatch']);
		} else {
			return view('stdlist', ['stdlist' => $this->stdlist, 'page' => 'List user', 'title' => 'Home', 'error' => 'existbatch']);
		}
	}

	// public function adduser($error = null)
	// {	
	// 	return view('adduser', ['page' => 'Add user', 'title' => 'Home', 'error' => $error]);
	// }
	// public function verifyuser()
	// {
	// 	$info = $this->validate->chk_useremail(Request::get('email'));
	// 	if ($info) {
	// 		User::create(['name' => Request::get('name'), 
	// 					  'email' => Request::get('email'),
	// 					  'password' => bcrypt(Request::get('password'))
	// 					  ]);
	// 		return redirect()->action('EkbanaCurd@adduser', ['added']);
	// 	} else {
	// 		return view('adduser', ['page' => 'Add Student Info', 'title' => 'Home', 'error' => 'matched']);
	// 	}
	// }
}