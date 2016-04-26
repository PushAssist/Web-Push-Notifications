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

 
Feel free to integrate web-push-notification by PushAssist into your favorite PHP Framework. If you need any assistance just let us know.

## About PushAssist

[PushAssist](https://pushassist.com) is a Push Notification SaaS service for sites. You can contact us by email at [support@pushassist.com](mailto:support@pushassist.com).
