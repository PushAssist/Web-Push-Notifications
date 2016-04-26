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

/* 
testcompany
	
$auth_api = 'JZMCEqeJ1Xe1VhYN5iYHdUJsltGsSwB7';	//	X-Auth-Token
$auth_secret = 'fbslro15Cd0RjsPwvgJVJuLSOcYo';	//	X-Auth-Secret 
 */

// pixxett
$auth_api = 'ffEMRbfyFKRtyyExQxQHSFljOQ4ug8VL';	//	X-Auth-Token
$auth_secret = 'ZGzB2dCY07WnLE5ZFF3ymD1KiA8T';	//	X-Auth-Secret 
  
$pushassist = new PushAssist($auth_api, $auth_secret);
$account_info = $pushassist->pushassist_account_details();


echo "Account Details Function - ";
echo "<pre>";
print_r($account_info);

$dashboard_details = $pushassist->pushassist_dashboard_details();
echo "<br/> Dashboard Details Function - ";
echo "<pre>";
print_r($dashboard_details);

$notification_history = $pushassist->pushassist_notification_history();
echo "<br/> Notification History Function - ";
echo "<pre>";
print_r($notification_history);

$notification_by_id = $pushassist->pushassist_notification_details_by_id(203);
echo "<br/> Notification By Id Function - ";
echo "<pre>";
print_r($notification_by_id);

$notification_by_subdomain = $pushassist->pushassist_notification_details_by_subdomain('testcompany');
echo "<br/> Notification By Sub domain Function - ";
echo "<pre>";
print_r($notification_by_subdomain);

$campaigns_history = $pushassist->pushassist_campaigns_history();
echo "<br/> Campaign History Function - ";
echo "<pre>";
print_r($campaigns_history);

$campaigns_by_id = $pushassist->pushassist_campaigns_details_by_id(129);
echo "<br/> Campaign By Id Function - ";
echo "<pre>";
print_r($campaigns_by_id);

$campaigns_by_subdomain = $pushassist->pushassist_campaigns_details_by_subdomain('testcompany');
echo "<br/> Campaign By Sub domain Function - ";
echo "<pre>";
print_r($campaigns_by_subdomain);

$segments = $pushassist->pushassist_segment_details();
echo "<br/> Segment Function - ";
echo "<pre>";
print_r($segments);

$segments_details = $pushassist->pushassist_segment_details_by_id(210);
echo "<br/> Segment Details By Id Function - ";
echo "<pre>";
print_r($segments_details);

$segments_details_by_name = $pushassist->pushassist_segment_details_by_name('vip');
echo "<br/> Segment Details By Name Function - ";
echo "<pre>";
print_r($segments_details_by_name);

$segments_count = $pushassist->pushassist_segment_count();
echo "<br/> Total Segment Count Function - ";
echo "<pre>";
print_r($segments_count);

$subscribers_list = $pushassist->pushassist_subscribers_details();
echo "<br/> Get Subscriber count Function - ";
echo "<pre>";
print_r($subscribers_list);

$subscribers_list_by_subdomain = $pushassist->pushassist_subscribers_details_by_subdomain('testcompany');
echo "<br/> Get Subscriber count for specific site Function - ";
echo "<pre>";
print_r($subscribers_list_by_subdomain);


echo "<br/> Create New Segment Function - ";

$segment_name = 'Class Segment';

$segment_name = str_replace(" ", "+", $segment_name);

$response_array = array("segment" => array(
								"segment_name" => $segment_name)
							);
/* 
$response = $pushassist->pushassist_create_segments($response_array);

echo "<pre>";
print_r($response); 
*/

echo "<br/> Send New Notification Function - ";

$notification_title = "Your Notification Title Message";

$notification_message = "Your Notification Message";

$redirect_url = "http://yoursite.com/";		//	URL Link When User Click On Link It Open this url.

$image_path = 'http://yoursite.com/uploads/image_name.png';	// pass image path when notification shows this image seen with notification.

$utm_source = 'UTM Source Parameter';

$utm_medium = 'UTM Medium Parameter';

$utm_campaign = 'UTM Campaign Parameter';

$segment_array = array("sports","fashion");

$response_array = array("notification" => array(									
						"title" => $notification_title,
						"message" => $notification_message,
						"redirect_url" => $redirect_url,
						"image" => $image_path),
						"utm_params" => array("utm_source" => $utm_source,	// optional if you want to pass provide it else pass it empty.
							"utm_medium" => $utm_medium,
							"utm_campaign" => $utm_campaign),
						"segments" => $segment_array	// optional notification send only for those who subscribers by this  segment.
						);
					
//$response = $pushassist->pushassist_send_notification($response_array);

echo "<br/> Create New Campaign Function - ";

$campaign_title = "Your Campaign Title Message";

$campaign_message = "Your Campaign Message";

$redirect_url = "http://yoursite.com/";		//	URL Link When User Click On Link It Open this url.

$image_path = 'http://yoursite.com/uploads/image_name.png';	// pass image path when Campaign shows this image seen with Campaign.

$time_zone = '2016-03-1 01:15:20';	// time zone should be Y-M-D and time 24 our format

$utm_source = 'UTM Source Parameter';

$utm_medium = 'UTM Medium Parameter';

$utm_campaign = 'UTM Campaign Parameter';

$segment_array = array("sports","fashion");

$campaign_response_array = array("campaign" => array(									
						"title" => $campaign_title,
						"message" => $campaign_message,
						"redirect_url" => $redirect_url,
						"timezone" => $time_zone,
						"image" => $image_path),
						"utm_params" => array("utm_source" => $utm_source,	// optional if you want to pass provide it else pass it empty.
							"utm_medium" => $utm_medium,
							"utm_campaign" => $utm_campaign),
						"segments" => $segment_array	// optional campaign send only for those who subscribers by this  segment.
						);

//$response = $pushassist->pushassist_create_campaigns($campaign_response_array);