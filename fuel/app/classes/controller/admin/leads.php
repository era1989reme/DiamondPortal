<?php
class Controller_Admin_Leads extends Controller_Admin
{
	public $template = 'admin/innertemplate';

	public function action_index()
	{
		$data = [];
		$this->template->title = "Leads";
		$this->template->content = View::forge('admin/leads/index', $data);
	}


	public function action_listing($page = null)
	{
		//$search = trim(Input::get('search'));
		$where = array();

		//$where['where'][]  = array('group', 50);

		/*if(!empty($search)) {
			$where['or_where'][] = array('id', 'like', "%$search%");
			$where['or_where'][] = array('name', 'like', "%$search%");
		}*/
		$config = array(
				'total_items'    =>  count(Model_Diamondfinder::find('all',$where)),
				'per_page'       => 10,
				'uri_segment'    => 'p',
		);
		//echo DB::last_query(); die();
		$pagination = Pagination::forge('bootstrap3', $config);
		$where['order_by'] = array('id' => 'desc');
		$where['limit'] = $pagination->per_page;
		$where['offset'] = $pagination->offset;
		$data['leads'] = Model_Diamondfinder::find('all',$where);


		$data['pagination'] = $pagination;
		return View::forge('admin/leads/listing-rows', $data);
	}


	public function action_view($id = null)
	{
		$data['lead'] = Model_Diamondfinder::find($id);

		$this->template->title = "Lead";
		$this->template->content = View::forge('admin/leads/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Diamondfinder::validate('create');

			if ($val->run())
			{
				$lead = Model_Diamondfinder::forge(array(
					'ring_type' => Input::post('ring_type'),
					'budget' => Input::post('budget'),
					'post_code' => Input::post('post_code'),
					'email' => Input::post('email'),
					'description' => Input::post('description'),
				));

				if ($lead and $lead->save())
				{
					Session::set_flash('success', e('Added lead #'.$lead->id.'.'));

					Response::redirect('admin/leads');
				}

				else
				{
					Session::set_flash('error', e('Could not save lead.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Leads";
		$this->template->content = View::forge('admin/leads/create');

	}

	public function action_edit($id = null)
	{
		$lead = Model_Diamondfinder::find($id);
		$val = Model_Diamondfinder::validate('edit');

		if ($val->run())
		{
			$lead->ring_type = Input::post('ring_type');
			$lead->budget = Input::post('budget');
			$lead->post_code = Input::post('post_code');
			$lead->email = Input::post('email');
			$lead->description = Input::post('description');

			if ($lead->save())
			{
				Session::set_flash('success', e('Updated lead #' . $id));

				Response::redirect('admin/leads');
			}

			else
			{
				Session::set_flash('error', e('Could not update lead #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$lead->ring_type = $val->validated('ring_type');
				$lead->budget = $val->validated('budget');
				$lead->post_code = $val->validated('post_code');
				$lead->email = $val->validated('email');
				$lead->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('lead', $lead, false);
		}

		$this->template->title = "Leads";
		$this->template->content = View::forge('admin/leads/edit');

	}

	public function action_delete($id = null)
	{
		if ($lead = Model_Diamondfinder::find($id))
		{
			$lead->delete();

			Session::set_flash('success', e('Deleted lead #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete lead #'.$id));
		}

		Response::redirect('admin');

	}

	public function action_status($id = null, $status = 0)
	{
			$return = array();
		if ($lead = Model_Diamondfinder::find($id))
		{
			$lead->status = $status;
			$lead->amount = Input::post('amount');
			$lead->save();
			$return['status'] = 1;

			if($status==0) {
				$return['message'] = 'Unapproved  lead #'.$id;

			} else {
				$return['message'] = 'Approved  lead #'.$id;

			}						/* sending email  */ 			if($status==1)			{ 				$query = DB::select('users.name', 'users.email')->from('users');				$query->join('postcodes', 'inner');				$query->on('users.id','=','postcodes.user_id');				$query->where('postcodes.postcode', $lead->postcode);				$connection = Database_Connection::instance();				$sql = $query->compile($connection);				$query = DB::query($sql);				$rresult = $query->execute();				$jewellers = $rresult->as_array();				if(count($jewellers)>0) { 					foreach($jewellers as $jeweller){ 						$to 	= $jeweller['email'];						$toName = $jeweller['name'];						$email = Email::forge();						$email->from('michael@diamondfind.com.au', 'Michael Ruhfus');						$email->to($to, $toName);						$email->subject('New lead - jeweller');						$email->html_body('');						$email->set_merge_var($to, 'UNSUB', '#');						$email->set_merge_var($to, 'JEWELLERLINK', Uri::create('jeweller'));						$email->setTemplateName('New lead - jeweller');						$email->send();						$email = null;					}				}			}		}
		else
		{
				$return['status'] = 0;
			$return['message'] = 'Error in approving lead #'.$id;

		}
		echo json_encode($return);
			die();
	}
}
