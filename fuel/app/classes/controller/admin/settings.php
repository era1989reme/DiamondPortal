<?php
class Controller_Admin_Settings extends Controller_Admin
{
	public $template = 'admin/innertemplate';

	public function action_index()
	{
		if (Input::method() == 'POST')
		{
			$fields = Input::post('fields');	
			foreach($fields as $field=>$value)
			{ 
				$entry = Model_Setting::find('first', array( 
					'where' => [array('key', $field)]
				));
				if(!isset($entry['id'])) { 
				$entry = new Model_Setting();
				}
				$entry->key = $field;
				$entry->value = $value;
				$entry->save();
				$entry = null;
			}
			Session::set_flash('success', 'Successfully saved');
			Response::redirect('admin/settings');
		}
		$data['values'] = Model_Setting::find('all');
		$this->template->title = 'Site Setting';
		$this->template->content = View::forge('admin/settings', $data);
	}

	public function action_updatepassword()
    {
    	list(, $jeweller_id) = Auth::get_user_id(); 
    	$value = Input::post('password');
    	$entry = Model_User::find($jeweller_id);
    	$entry->password = Auth::instance()->hash_password($value);
    	if($entry->save()) 
    	{ 
    		Session::set_flash('success', 'Password updated Successfully!');
    	} else { 
    		Session::set_flash('error', 'Error in updating password');
    	}
		Response::redirect(Input::referrer());
    }	
}
