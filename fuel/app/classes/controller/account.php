<?php
class Controller_Account extends Controller_Jeweller
{
      public $template = 'front/template-jeweller';
	  
      public function action_history()
      {
        $this->template->title = Session::get('name').' | Jeweller Account';
        $this->template->menu = 'history';
        $this->template->content = View::forge('front/account/history', array(), false);
      }
	  public function action_historylist()
      {
		$where = array();
		$where['where'][]  = array('jeweller_id', Session::get('userid'));
		$config = array(
				'total_items'    =>  count(Model_History::find('all',$where)),
				'per_page'       => 10,
				'uri_segment'    => 'p',
		);		
		$pagination = Pagination::forge('bootstrap3', $config);		
		
		$where['order_by'] = array('created_at' => 'desc');
		$where['limit'] = $pagination->per_page;
		$where['offset'] = $pagination->offset;
		$data['list'] = Model_History::find('all',$where);

		$data['pagination'] = $pagination;
        return View::forge('front/account/history-listrows', $data, false);
      }
      
      
      public function action_setting()
      { 
      	$data['user'] = Model_User::find(Session::get('userid'));
      	$this->template->title = Session::get('name').' | Jeweller Account';
        $this->template->menu = 'setting';
        $this->template->content = View::forge('front/account/setting', $data, false);
      }
	  
	  public function action_savename()
	  { 
		$user = Model_User::find(Session::get('userid'));
		$field = Input::post('field') ;
		$user->$field = Input::post('value');
		$user->save();
		if($field=='name') { 
			Session::set('name', Input::post('value') );		
		}
		die('1');
	  }
}
