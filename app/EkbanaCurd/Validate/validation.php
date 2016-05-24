<?php 
namespace Ekbana\Validate;

use App\Stdinfo;
use App\User;
use App\Faculty;
use App\Batch;

class Validation
{
	var $email;
	public function __construct()
	{

	}

	public function chk_email($email = null)
	{
		$stdinfo = Stdinfo::whereStdemail($email)->first();
		if (isset($stdinfo)) 
			return false;
		else 
			return true;	
	}

	public function chk_useremail($email = null)
	{
		$userinfo = User::whereEmail($email)->first();
		if (isset($userinfo))
			return false;
		else 
			return true;
	}

	public function chk_faculty($faculty = null)
	{
		$factinfo = Faculty::whereFacname($faculty)->first();
		if (isset($factinfo))
			return false;
		else 
			return true;
	}

	public function chk_batch($batch = null)
	{
		$batinfo = Batch::whereBatname($batch)->first();
		if (isset($batinfo))
			return false;
		else 
			return true;
	}
}
