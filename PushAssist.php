<?php

class PushAssist
{

    public $pushassist_auth_api_key = '';
    public $pushassist_auth_secret_key = '';

    public function __construct($pushassist_auth_api_key, $pushassist_auth_secret_key) {

        $this->pushassist_auth_api_key = $pushassist_auth_api_key;
        $this->pushassist_auth_secret_key = $pushassist_auth_secret_key;

    }
	
	public function pushassist_remote_request($remote_data){
		
		$url = 'https://api.pushassist.com/'.$remote_data['remoteAction'];

        $headers = array(
            'X-Auth-Token: '.$this->pushassist_auth_api_key,
            'X-Auth-Secret: '.$this->pushassist_auth_secret_key,
            'Content-Type: application/json'
        );

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		if($remote_data['method'] == 'GET'){
		
			curl_setopt($ch, CURLOPT_SSLVERSION, 4);
			
		} else {
		
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($remote_data['remoteContent']));
		}
		
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        curl_close($ch);

        $result_arr = json_decode($result, true);

        return $result_arr;		
	}

	/*	function to fetch account details	*/
	
    public function pushassist_account_details(){
		
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'accounts_info/'
		  );

		return $this->pushassist_remote_request($remote_data);
    }
	
	/*	function to show dashboard data	*/
	
	public function pushassist_dashboard_details(){
				
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'dashboard/'
		  );

		return $this->pushassist_remote_request($remote_data);
	}
	
	/*	function to show notification history	*/
	
	public function pushassist_notification_history(){
				
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'notifications/'
		  );

		return $this->pushassist_remote_request($remote_data);
	}
		
	/*	function to get specific notification details by notification id	*/
	
	public function pushassist_notification_details_by_id($id){
						
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'notifications/'.$id
		  );

		return $this->pushassist_remote_request($remote_data);
	}
	
	/*	function to fetch specific notifications by their accountname / sub domain	*/
	
	public function pushassist_notification_details_by_subdomain($name){
		
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'notifications/account/'.$name
		  );

		return $this->pushassist_remote_request($remote_data);
	}
	
	
	/*	get all campaign details	*/
	
public function pushassist_campaigns_history(){

	$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'campaigns/'
		  );

	return $this->pushassist_remote_request($remote_data);
}

	/*	get specific campaign details by campaign id	*/

public function pushassist_campaigns_details_by_id($id){
	
	$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'campaigns/'.$id
		  );

	return $this->pushassist_remote_request($remote_data);
}

/*	get campaign details by their accountname / subdomain	*/

public function pushassist_campaigns_details_by_subdomain($name){
		
	$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'campaigns/account/'.$name
		  );

	return $this->pushassist_remote_request($remote_data);
}

	/*	get all segment details		*/

	public function pushassist_segment_details(){
						
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'segments/'
		  );

		return $this->pushassist_remote_request($remote_data);		
	}
		
	/*	get specific segment details by segment id	*/	
		
	public function pushassist_segment_details_by_id($id){
						
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'segments/'.$id
		  );

		return $this->pushassist_remote_request($remote_data);		
	}	
	
	/*	get specific segment details by segment name	*/	
	
	public function pushassist_segment_details_by_name($name){
								
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'segments/segment/'.$name
		  );

		return $this->pushassist_remote_request($remote_data);		
	}
	
	/*	get total segment count */	
	
	public function pushassist_segment_count(){
						
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'segments/segmentcount/'
		  );

		return $this->pushassist_remote_request($remote_data);		
	}
	
	/*	get all sites subscriber details */
	
	function pushassist_subscribers_details(){				
				
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'subscribers/'
		  );

		return $this->pushassist_remote_request($remote_data);
	}

	/*	get all specific site subscriber details */
	
	function pushassist_subscribers_details_by_subdomain($subdomain){
		
		$remote_data = array(
			'method' => 'GET',
			'remoteAction' => 'subscribers/'.$subdomain
		  );

		return $this->pushassist_remote_request($remote_data);
	}
	
	/*	create New segment	*/
	
	function pushassist_create_segments($response_array){					
		
		$remote_data = array(
			'method' => 'POST',
			'remoteAction' => 'segments/',
			'remoteContent' => $response_array
		  );

		return $this->pushassist_remote_request($remote_data);
	}
	
	/*	Send New Notification	*/
	
	function pushassist_send_notification($response_array){
								
		$remote_data = array(
			'method' => 'POST',
			'remoteAction' => 'notifications/',
			'remoteContent' => $response_array
		  );

		return $this->pushassist_remote_request($remote_data);
	}
	
	/*	Create New Campaign  */
	
	function pushassist_pushassist_create_campaigns($response_array){
						
		$remote_data = array(
			'method' => 'POST',
			'remoteAction' => 'campaigns/',
			'remoteContent' => $response_array
		  );

		return $this->pushassist_remote_request($remote_data);
	}	
}