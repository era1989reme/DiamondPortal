<?php
class Controller_Admin_Jewellers extends Controller_Admin
{
	public $template = 'admin/innertemplate';

	public function action_index()
	{
		$data = [];
		$this->template->title = 'Jewellers';
		$this->template->content = View::forge('admin/jewellers/index', $data);

	}

	public function action_listing($page = null)
	{
		$search = trim(Input::get('search'));
		$where = array();
		$where['where'][]  = array('group', 50);
		if(!empty($search)) {
			$where['or_where'][] = array('id', 'like', "%$search%");
			$where['or_where'][] = array('name', 'like', "%$search%");
		}
		$config = array(
				'total_items'    =>  count(Model_User::find('all',$where)),
				'per_page'       => 10,
				'uri_segment'    => 'p',
		);
		//echo DB::last_query(); die();
		$pagination = Pagination::forge('bootstrap3', $config);
		$where['order_by'] = array('created_at' => 'desc');
		$where['limit'] = $pagination->per_page;
		$where['offset'] = $pagination->offset;
		$data['jewellers'] = Model_User::find('all',$where);


		$data['pagination'] = $pagination;
		return View::forge('admin/jewellers/listing-rows', $data);


	}

	public function action_view($id = null)
	{
		$data['lead'] = Model_Lead::find($id);

		$this->template->title = "Lead";
		$this->template->content = View::forge('admin/leads/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');
			$return = array();
			if ($val->run())
			{
				$username = Input::post('username');
				$password = Input::post('password');
				$email 		= Input::post('email');
				if($id = Auth::create_user($username, $password, $email, 50))
				{
					$entry = Model_User::find($id);
					$entry->name = Input::post('name');
					$entry->website = Input::post('website');
					$entry->phone = Input::post('phone');
					$entry->address = Input::post('address');
					$entry->save();

					$return['status'] = 1;
					$return['message'] = 'Successfully added';
				} else {
					$return['status'] = 0;
					$return['message'] = 'Error in saving data';
				}
			}
			else
			{
					$return['status'] = 2;
					$return['message'] = $val->error();

			}
			echo json_encode($return);
		}
		die();
	}


	public function action_delete($id = null)
	{
		if ($lead = Model_Lead::find($id))
		{
			$lead->delete();

			Session::set_flash('success', e('Deleted lead #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete lead #'.$id));
		}

		Response::redirect('admin/leads');

	}

	public function action_addcredit()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('credit_add');
			$return = array();
			if ($val->run())
			{
				$jewellers = Input::post('jewellers');
				$credit = Input::post('credit');
				$option = Input::post('option');
				$narrative = Input::post('narrative');
				$jewellers = explode(',',$jewellers);

				$success = 0; $failed = 0;
				foreach($jewellers as $id) {
						$entry = Model_User::find($id);
						$entry->credit = $option=='+' ? $credit+$entry->credit :  $entry->credit - $credit;
						if($entry->save()) { $success++;
							$history = new Model_History();
							$history->jeweller_id = $id;
							$history->type = 'CREDIT '.($option=='+'?'ADDED' : 'REMOVED');
							$history->messge= 'AMOUNT '.($option=='+'?'ADDED' : 'REMOVED').' $'.number_format($credit).'<br>'.$narrative;
							$history->balance = $entry->credit;
							$history->save();
							$history = null;
						}
						else { $failed++; }
						$entry = null;
				}

				$return['status'] = 1;
				$return['message'] = 'Successfully saved '.$success. ' jewellers credit'. ($failed? $failed.' failed to save' : '');

			}
			else
			{
					$return['status'] = 2;
					$return['message'] = $val->error();

			}
			echo json_encode($return);
		}
		die();
	}

	public function action_update()
	{
		if (Input::method() == 'POST')
		{
			$option = Input::post('option');
			$val = Model_User::validate($option);
			$return = array();
			if ($val->run())
			{
				$jewellers = Input::post('jewellers');
				$jewellers = explode(',',$jewellers);
				$value = Input::post($option);

				$success = 0; $failed = 0;
				foreach($jewellers as $id) {
						$entry = Model_User::find($id);
						if($option=='email') $entry->email = $value;
						elseif($option=='password') $entry->password = Auth::instance()->hash_password($value);
						if($entry->save()) { $success++;}
						else { $failed++; }
						$entry = null;
				}

				$return['status'] = 1;
				$return['message'] = 'Successfully saved ';

			}
			else
			{
					$return['status'] = 2;
					$return['message'] = $val->error();

			}
			echo json_encode($return);
		}
		die();
	}

	public function action_addpostcode()
	{
		if (Input::method() == 'POST')
		{

			$return = array();

			$jewellers = Input::post('jewellers');
			$jewellers = explode(',',$jewellers);
			$postcodes  = explode(',', Input::post('postcode'));
			$option 	 = Input::post('option');

			$success = 0; $failed = 0;
			foreach($jewellers as $user_id) {
					foreach($postcodes as $postcode) {
						$where =array();
						$where['where'][]  = array('postcode', $postcode);
						$where['where'][]  = array('user_id', $user_id);
						$postcode = trim($postcode);
						if(count(Model_Postcode::find('all', $where))==0){
							$entry = new Model_Postcode();
							$entry->postcode = $postcode;
							$entry->user_id = $user_id;
							if($entry->save()) { $success++; }
							else { $failed++; }
						}
						$entry = null;
					}
					$where =array();
					$where['where'][]  = array('user_id', $user_id);
					$where['where'][]  = array('postcode', 'not in', $postcodes);
					$postcode = Model_Postcode::find('all', $where);
					//$postcode->delete();
					foreach($postcode as $r){
							$r->delete();
					}
					//echo DB::last_query(); die();
			}

			$return['status'] = 1;
			$return['message'] = 'Successfully saved ';


			echo json_encode($return);
		}
		die();
	}

	public function action_getpostcode()
	{
			$user_id = Input::post('user_id');
			//$jewellers = explode(',',$jewellers);
			$where['where'][]  = array('user_id', $user_id);
			$result = Model_Postcode::find('all', $where);
			//echo DB::last_query(); die();
			$postcode = array();
			foreach($result as $row){
					$postcode[] = $row->postcode;
			}
			echo implode(',', $postcode);
			die();

	}
	
	public function action_activites($jeweller_id = 0 )
	{ 
		
		$data['jeweller_id'] = $jeweller_id;
        $this->template->title = 'Jewellers Acticities';
		$this->template->content = View::forge('admin/jewellers/activities', $data, false);
       
	}
	
	public function action_activitesfilter($jeweller_id = null)
	{ 
		$config = array(
			'total_items'    =>  count(Model_History::find('all',['where'=> [array('jeweller_id',$jeweller_id)]])),
			'per_page'       => 10,
			'uri_segment'    => 'p',
		);
		$pagination = Pagination::forge('bootstrap3', $config);
	
		$data['list'] = Model_History::find('all', array(
          'where'=> [array('jeweller_id',$jeweller_id)],
          'order_by'=> array('created_at'=>'desc'),
          'offset'=>$pagination->offset,
          'limit' => $pagination->per_page,
          
        ));


		$data['pagination'] = $pagination;
		$data['jeweller_id'] = $jeweller_id;
		return View::forge('admin/jewellers/history', $data);
        
       
	}

}
