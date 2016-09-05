<?php
class Controller_Welcome extends Controller_Base
{	
	public $template = 'front/template-general';
	public function action_quote($request = '')		{ 		
		
		list($leadid, $jeweller_id, $quote_id ) = explode('-', Crypt::decode($request));		
		$data['lead'] = Model_Diamondfinder::find($leadid);		
		$data['jeweller'] = Model_User::find($jeweller_id);		
		$data['quote'] = Model_Quote::find($quote_id);		
		$this->template->title = 'Quote';		
		$this->template->content=  View::forge('front/general/quote', $data, false);	
	}
	
	
	public function action_email()
	{ 
		$to    = Input::get('e');		
		if(!empty($to) && filter_var($to, FILTER_VALIDATE_EMAIL)) {		
			$email = Email::forge();				
			$email->from('michael@diamondfind.com.au', 'Michael Ruhfus');				
			$email->to($to);				
			$email->subject('Lead Created');				
			$email->html_body('');				
			$email->set_merge_var($to, 'UNSUB', '#');				
			$email->setTemplateName('Lead Created / New Customer');				
			$email->send();				
			$email = null;	
		}	
		//Response::redirect(Input::referrer());
	}
	
	public function action_index()
	{ 
		Response::redirect('http://diamondfind.com.au/');
	}
}
