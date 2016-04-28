# web-push-notifications
Push Notification Delivery & Analytics for Websites and Mobile

> Web Push Notifications is a PHP Library to quickly integrate and send push notifications with PushAssist REST API. Setup is easy just create a [Free Account](https://pushassist.com/pricing-plans/), verify your email address and login to your PushAssist Control Panel to get the API & Secret Keys.


## Initialization

Simply require and initialize the `PushAssist` class like:

	require_once 'PushAssist.php';
    
## Composer Installation

To install PushAssist Class, simply:   

	$ composer require PushAssist/Web-Push-Notifications 

   

## Sending Out Notifications

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');

$notification_array = array("notification" => array(									
						    "title" => 'YOUR NOTIFICATION TITLE',
						    "message" => 'YOUR NOTIFICATION TITLE',
						    "redirect_url" => 'URL TO REDIRECT IF MESSAGE IS CLICKED',
						    "image" => 'MESSAGE IMAGE FULL PATH'),
                            //UTM is optional Keep it empty if you are not passing utm_params.
						    "utm_params" => array("utm_source" => $utm_source,	
							"utm_medium" => $utm_medium,
							"utm_campaign" => $utm_campaign),
                            //Segments is optional notification send only for those who subscribers by this  segment.
						    "segments" => ('Sports', 'Hockey');	
						);

$push_notification->pushassist_send_notification($notification_array)
```
   

## Sending Out Campaigns

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');

$campaign_array = array("campaign" => array(									
						    "title" => 'YOUR CAMPAIGN TITLE',
						    "message" => 'YOUR CAMPAIGN TITLE',
						    "redirect_url" => 'URL TO REDIRECT IF MESSAGE IS CLICKED',
							"timezone" => 'TIME ZONE FORMAT(Y-M-D) 24 HOUR FORMAT',
						    "image" => 'MESSAGE IMAGE FULL PATH'),
                            //UTM is optional Keep it empty if you are not passing utm_params.
						    "utm_params" => array("utm_source" => $utm_source,	
							"utm_medium" => $utm_medium,
							"utm_campaign" => $utm_campaign),
                            //Segments is optional Campaign send only for those who subscribers by this  segment.
						    "segments" => ('Sports', 'Hockey');	
						);

$push_notification->pushassist_create_campaigns($campaign_array)
```

## Add Segment

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');

$segment_array = array("segment" => array(
								"segment_name" => 'YOUR SEGMENT NAME')
							);
							
$push_notification->pushassist_create_segments($segment_array);
```

## Get Account Details

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_account_details();
```

## Get Dashboard Details

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_dashboard_details();
```

## Get Notification History

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_notification_history();
```

## Get Notification Details By Id

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_notification_details_by_id(ID);
```

## Get Notification Details By Account Name

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_notification_details_by_subdomain('ACCOUNT NAME');
```

## Get Campaign History 

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_campaigns_history();
```

## Get Campaign Details By Id 

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_campaigns_details_by_id(ID);
```

## Get Campaign Details By Account Name

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_campaigns_details_by_subdomain('ACCOUNT NAME');
```

## Get Segment Details

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_segment_details();
```

## Get Segment Details By Id

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_segment_details_by_id(ID);
```

## Get Segment Details By Name

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_segment_details_by_name('SEGMENT NAME');
```

## Get Segment Counts

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_segment_count();
```

## Get Subscribers Details

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_subscribers_details();
```

## Get Subscribers Details By Account Name

```php
// Create an object
$push_notification = new PushAssist('YOUR API KEY', 'YOUR SECRET KEY');
							
$push_notification->pushassist_subscribers_details_by_subdomain('ACCOUNT NAME');
```

 
Feel free to integrate web-push-notification by PushAssist into your favorite PHP Framework. If you need any assistance just let us know.

## About PushAssist

[PushAssist](https://pushassist.com) is a Push Notification SaaS service for sites. You can contact us by email at [support@pushassist.com](mailto:support@pushassist.com).
