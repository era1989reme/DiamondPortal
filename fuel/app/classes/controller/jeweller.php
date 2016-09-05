<?php

class Controller_Jeweller extends Controller_Base
{
  public $template = 'front/template-jeweller';
  public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Jeweller' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 50;

				if ( ! Auth::member($admin_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the jeweller panel'));
					Response::redirect('/jeweller/logout');
				}

				if($admin_group_id!='50') {
					Session::set_flash('error', e('You don\'t have access to the jeweller panel'));
					Response::redirect('/');
				}

			}
			else
			{
				Response::redirect('jeweller/login');
			}
		}
	}

  public function action_login()
	{
		// Already logged in
		Auth::check() and Response::redirect('jeweller');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{
				if ( ! Auth::check())
				{
					if (Auth::login(Input::post('email'), Input::post('password')))
					{
						// assign the user id that lasted updated this record
						foreach (\Auth::verified() as $driver)
						{
							if (($id = $driver->get_user_id()) !== false && $driver->get('group')==50)
							{
								// credentials ok, go right in
								$current_user = Model\Auth_User::find($id[1]);
								Session::set('userid',$current_user->id);
								Session::set('username',$current_user->username);
								Session::set('usergroup',$current_user->group);
								Session::set('name',$driver->get('name'));
								Session::set_flash('success', e('Welcome, '.$current_user->username));
								Response::redirect('jeweller');
							}else {
                Auth::logout();
                $this->template->set_global('login_error', 'Login not allowed');
              }
						}
					}
					else
					{
						$this->template->set_global('login_error', 'Login failed!');
					}
				}
				else
				{
					$this->template->set_global('login_error', 'Already logged in!');
				}
			}
		}

		$this->template->title = 'Jeweller Login';
		$this->template->menu = '';
		$this->template->content = View::forge('admin/login', array('val' => $val), false);
	}

  /**
	 * The logout action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('jeweller');
	}


  public function action_index()
  {
	$currentTime = time();
	$settings = Model_Setting::find('all');
	$setVal = array();
	foreach($settings as $r){ 
		$setVal[$r['key']] = $r['value'];
	}
	$lead_valid_days	= isset($setVal['lead_valid_days']) ? $setVal['lead_valid_days'] + 1 : 0;
	$lead_become_old	= isset($setVal['lead_become_old']) ? $setVal['lead_become_old'] + 1 : 0;
	$allowed_jewellers	= isset($setVal['allowed_jewellers']) ? $setVal['allowed_jewellers'] + 1 : 0;
 			
    $query = DB::select('diamondfinder.*')->from('diamondfinder');
    $query->join('postcodes', 'inner');
    $query->on('diamondfinder.postcode','=','postcodes.postcode');
    $query->where('postcodes.user_id', Session::get('userid'));
    $query->where('diamondfinder.status', '1');
    $query->where(DB::expr('floor(('.$currentTime.' - diamondfinder.created_at)/(24*3600))'),'<', $lead_valid_days);
    $query->where(DB::expr('(select count(1) from quotes where quotes.jeweller_id='.Session::get('userid').' and quotes.leadid = diamondfinder.id)'), 0);
	$query->where(DB::expr('(SELECT COUNT(1) FROM quotes WHERE quotes.leadid = diamondfinder.id)'), '<', $allowed_jewellers);
    $connection = Database_Connection::instance();
    $sql = $query->compile($connection);
    $query = DB::query($sql);
    $rresult = $query->execute();
    //echo DB::last_query(); die();
    $data['list'] = $rresult->as_array();
    $this->template->title = Session::get('name').' | Jeweller';
	$this->template->menu = 'newleads';
    $this->template->content = View::forge('front/jeweller/index', $data, false);
  }

  public function action_activeleads()
  {
	$currentTime = time();
	$settings = Model_Setting::find('all');
	$setVal = array();
	foreach($settings as $r){ 
		$setVal[$r['key']] = $r['value'];
	}
	$lead_valid_days	= isset($setVal['lead_valid_days']) ? $setVal['lead_valid_days'] + 1 : 0;
	$lead_become_old	= isset($setVal['lead_become_old']) ? $setVal['lead_become_old'] + 1 : 0;
	$allowed_jewellers	= isset($setVal['allowed_jewellers']) ? $setVal['allowed_jewellers'] + 1 : 0;
	
    $query = DB::select('diamondfinder.*')->from('diamondfinder');
    $query->join('postcodes', 'inner');
    $query->on('diamondfinder.postcode','=','postcodes.postcode');
    $query->where('postcodes.user_id', Session::get('userid'));
    $query->where('diamondfinder.status', '1');
    $query->where(DB::expr('(select count(1) from quotes where quotes.jeweller_id='.Session::get('userid').' and quotes.leadid = diamondfinder.id)'),'!=', 0);
    $query->where(DB::expr('(select floor(('.$currentTime.'- quotes.created_at)/(24*3600)) as d from quotes where quotes.jeweller_id='.Session::get('userid').' and quotes.leadid = diamondfinder.id order by quotes.created_at desc limit 1 ) '),'<', $lead_become_old);
    $connection = Database_Connection::instance();
    $sql = $query->compile($connection);
    $query = DB::query($sql);
    $rresult = $query->execute();
    // echo DB::last_query(); die();
    $data['list'] = $rresult->as_array();
    $this->template->title = Session::get('name').' | Jeweller';
	$this->template->menu = 'activeleads';
    $this->template->content = View::forge('front/jeweller/activeleads', $data, false);
  }


    public function action_oldleads()
    {     
      $this->template->title = Session::get('name').' | Jeweller';
	  $this->template->menu = 'oldleads';
      $this->template->content = View::forge('front/jeweller/oldleads', array(), false);
    }
	
	public function action_oldleadslisting()
    {
			$currentTime = time();
			$settings = Model_Setting::find('all');
			$setVal = array();
			foreach($settings as $r){ 
				$setVal[$r['key']] = $r['value'];
			}
			$lead_valid_days	= isset($setVal['lead_valid_days']) ? $setVal['lead_valid_days']  : 0;
			$lead_become_old	= isset($setVal['lead_become_old']) ? $setVal['lead_become_old']  : 0;
			$allowed_jewellers	= isset($setVal['allowed_jewellers']) ? $setVal['allowed_jewellers']  : 0;

			$query = DB::select('diamondfinder.*')->from('diamondfinder');
			$query->join('postcodes', 'inner');
			$query->on('diamondfinder.postcode','=','postcodes.postcode');
			$query->where('postcodes.user_id', Session::get('userid'));
			$query->where('diamondfinder.status', '1');
			$query->where(DB::expr('(select floor(('.$currentTime.'- quotes.created_at)/(24*3600)) as d from quotes where quotes.jeweller_id='.Session::get('userid').' and quotes.leadid = diamondfinder.id order by quotes.created_at desc limit 1 ) '),'>', $lead_become_old);
			$query->or_where(DB::expr('((select count(1) from quotes where quotes.jeweller_id='.Session::get('userid').' and quotes.leadid = diamondfinder.id) = 0 and floor(('.$currentTime.'- diamondfinder.created_at)/(24*3600)) > '.$lead_valid_days.' )'));
			$query->group_by('diamondfinder.id');
			$connection = Database_Connection::instance();
			$sql = $query->compile($connection);
			$query = DB::query($sql);
			$rresult = $query->execute();
			$config = array(
					'total_items'    => count($rresult->as_array()),
					'per_page'       => 10,
					'uri_segment'    => 'p',
			);
			$pagination = Pagination::forge('bootstrap3', $config);	
			$sql .= ' limit '.$pagination->offset .', '.$pagination->per_page;	
			$query = DB::query($sql);
			$rresult = $query->execute();

			$data['pagination'] = $pagination;
			// echo DB::last_query(); die();
			$data['list'] = $rresult->as_array();
			return View::forge('front/jeweller/oldleads-rows', $data, false);
	}

	public function action_leadquote($id = null)
    {
      $query = DB::select('diamondfinder.*')->from('diamondfinder');
      $query->join('postcodes', 'inner');
      $query->on('diamondfinder.postcode','=','postcodes.postcode');
      $query->where('postcodes.user_id', Session::get('userid'));
      $query->where('diamondfinder.status', '1');
      $query->where('diamondfinder.id', $id);
      $connection = Database_Connection::instance();
      $sql = $query->compile($connection);
      $query = DB::query($sql);
      $rresult = $query->execute();
      // echo DB::last_query(); die();
      $list = $rresult->as_array();
      $data['item'] = $list[0];
      $this->template->title = Session::get('name').' | Jeweller';
	    $this->template->menu = 'newleads';
      $this->template->content = View::forge('front/jeweller/quote', $data, false);
    }

    public function action_leadfollowup($id = null)
      {
        $query = DB::select('diamondfinder.*')->from('diamondfinder');
        $query->join('postcodes', 'inner');
        $query->on('diamondfinder.postcode','=','postcodes.postcode');
        $query->where('postcodes.user_id', Session::get('userid'));
        $query->where('diamondfinder.status', '1');
        $query->where('diamondfinder.id', $id);
        $connection = Database_Connection::instance();
        $sql = $query->compile($connection);
        $query = DB::query($sql);
        $rresult = $query->execute();
        // echo DB::last_query(); die();
        $list = $rresult->as_array();
        $data['item'] = $list[0];

        $data['quotes'] = Model_Quote::find('all',array(
            'where' => [array('leadid', $id),
            array('jeweller_id', Session::get('userid'))],
        ));
        // print_r($follows); die();
        $this->template->title = Session::get('name').' | Jeweller';
        $this->template->menu = 'activeleads';
        $this->template->content = View::forge('front/jeweller/followup', $data, false);
      }


    public function action_submitquote($leadid = null)
    {
	  /* 
		$uploaded = array();
		$config = array(
	    'path' => DOCROOT.'files/quote',
	      'randomize' => true,
	      'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png', 'txt', 'doc', 'docx', 'ppt', 'pptx', 'pdf', 'xls', 'xlsx'),
	  );
		$errors = array();
		$iserror = 0;
      	Upload::process($config);
      	if (Upload::is_valid())
		{
          Upload::save();
          $files = Upload::get_files();
          //print '<pre>'.print_r($files, 1); die();
          foreach($files as $file) {
          	if($file['error'] && !iserror) $iserror = 1;
          	else{
				  $uploaded[] = $file['saved_as'];
          	}
		   }
      	}

		foreach (Upload::get_errors() as $file)
		{
			$errors[] = $file['errors']['message'];
		} */
		
			$quote = Input::post('quote');
			$option = Input::post('type');
			$files = Input::post('files');
			
			list(, $jeweller_id) = Auth::get_user_id();
			$entry = new Model_Quote();
			$entry->leadid = $leadid;
			$entry->jeweller_id = $jeweller_id;
			$entry->quote = $quote;
			$entry->files = $files;
			$entry->save();
			$quoteId = $entry->id;			$lead = Model_Diamondfinder::find('first', array(			  'where'=> [array('id', $leadid)]			));			/*$lead['email'] = 'vrdvishwas@gmail.com';*/		if($option=='quote') {
			
				$mylead = array(
				  'leadid' => $lead['id'],
				  'amount'  => $lead['amount'],
				  'rings'   => $lead['rings'],
				  'budget'  => $lead['budget'],
				  'postcode'  => $lead['postcode'],
				  'created_at' => $lead['created_at']
				);
				$entry = Model_User::find($jeweller_id);
				$entry->credit = $entry->credit - $lead['amount'];
				$entry->save();
				$message = json_encode($mylead);
				$history = new Model_History();
				$history->jeweller_id = $jeweller_id;
				$history->type = 'quote';
				$history->messge= $message;
				$history->balance = $entry->credit;
				$history->save();
				$history = null;												$to    = $lead['email'];				$email = Email::forge();				$email->from('michael@diamondfind.com.au', 'Michael Ruhfus');				$email->to($to);				$email->subject('New Quote - Customer');				$email->html_body('');				$email->set_merge_var($to, 'UNSUB', '#');				$email->set_merge_var($to, 'QUOTELINK', Uri::create('quote/'.Crypt::encode($leadid.'-'.$jeweller_id.'-'.$quoteId)));				$email->setTemplateName('New Quote - Customer');				$email->send();				$email = null;
		  } else { 							$to    = $lead['email'];				$email = Email::forge();				$email->from('michael@diamondfind.com.au', 'Michael Ruhfus');				$email->to($to);				$email->subject('Follow-up Quote - Customer');				$email->html_body('');				$email->set_merge_var($to, 'UNSUB', '#');				$email->set_merge_var($to, 'QUOTELINK', Uri::create('quote/'.Crypt::encode($leadid.'-'.$jeweller_id.'-'.$quoteId)));				$email->setTemplateName('Follow-up Quote - Customer');				$email->send();				$email = null;			  }

			Session::set_flash('success', e('Successfully saved'));
			Response::redirect('jeweller/activeleads');
    }
    
    
    public function action_fileupload()
    {
      //print_r($_FILES);
      $config = array(
  	    'path' => DOCROOT.'files/quote',
  	      'randomize' => true,
  	      'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png', 'txt', 'doc', 'docx', 'ppt', 'pptx', 'pdf', 'xls', 'xlsx'),
  	  );
      $errors = array();
      $iserror = 0;
	  $uploaded = array();
      Upload::process($config);
      if (Upload::is_valid())
      {
        Upload::save();
        $files = Upload::get_files();
        //print '<pre>'.print_r($files, 1); die();
        foreach($files as $file) {
          if($file['error'] && !iserror) $iserror = 1;
          else{
           // print_r($file); die();
        $uploaded = array(
          'name'    => $file['name'],
          'saved_as'=> $file['saved_as'],
          'extension'=> $file['extension'],
        );
          }
        }
      }

    foreach (Upload::get_errors() as $file)
    {
      $errors[] = $file['errors']['message'];
    }
    //print_r($uploaded);
    echo json_encode($uploaded);
      die();
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
