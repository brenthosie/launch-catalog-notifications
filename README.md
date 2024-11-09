# Launch Catalog Notifier
Simple script that notifies one or more slack channels of updates to Adobe Launch Catalog including Web, Mobile and Edge

This is a simple PHP script that periodically checked the Adobe Launch APIs to pull the Extension Catalog and cache it locally. Each time it runs it creates a diff on that local cache and for any delta posts a corresponding message to one or more slack webhooks.


## Prerequisites

 - PHP 8.3 or higher
 - Provisioned for Adobe Launch and Developer Access Granted

## Getting Started

1. Clone the repo locally:  `git clone https://github.com/littlebutty/launch-catalog-notifications.git`
1. Verify that your php version is compatible using  `php src/bin/queryCatalog.php -h`.  You should see the help notice.  The script will need write permission to the `/src/bin/cache` directory
1. Obtain a `clientId` and `clientSecret` after setting up an [OAuth Server-to-Server credential](https://developer.adobe.com/developer-console/docs/guides/authentication/ServerToServerAuthentication/implementation/).  More instructions are also found [here](https://experienceleague.adobe.com/en/docs/experience-platform/landing/platform-apis/api-authentication).
1. Add the `clientId` and `clientSecret` from the previous to either the `src/config/default.php` file, or add a new one to he `/src/config` directory. Additional configs can be specified as a commandline argument. Ex: `php src/bin/queryCatalog.php config=debug`.   
1. Run the php script in the `/src/bin/queryCatalog.php` script.  It will use the `src/config/default.php` config if you do not specify an override argument.
1. Create a cron or some sort of timed execution of the script.

## Support
This repo is provided as is with now warranty or support and is subject to the license terms.
