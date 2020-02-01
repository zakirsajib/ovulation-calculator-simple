# Ovulation Calculator
* Contributors: zakirstage
* Tags: ovulation
* Requires at least: 4.1
* Tested up to: 5.0.3
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description

This WordPress plugin ovulation calculator will calculate your most fertile days. You can use shortcode to page or post.

## Live
[Click here](https://babyplan.se/berakna-agglossning)

![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-6.jpg)
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-7.jpg)
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-8.jpg)
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-9.jpg)



## Installation

1. Upload the plugin directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Ovulation Calculator section in WordPress dashboard and enter details.


## Frequently Asked Questions

#### Does the calculator have shortcode ?

Yes. The shortcode is `[ovulationcalculator]`. You can use it both in post and page.

#### Does this plugin support MailChimp ?

Yes. You can enter your MailChimp API Key and Unique List ID in mailchimp tab of the plugin. After user fills out the email field in calendar then it will be registered to the mailchimp's list instantly.

#### Can I translate/rewrite the wordings of this plugin ?

Yes. There are options in plugin's settings page. You can use Calendar Translation and Email Template Translation tabs for rewriting the words.

#### Does this plugin translate ovulation dates according to language chosen?

Currently it supports 7 languages. They are Danish, Swedish, Norwegian, Finnish, English, Estonian and Spanish.

## Screenshots
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-1.jpg)
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-2.jpg)
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-3.jpg)
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-4.jpg)
![alt text](https://github.com/zakirsajib/ovulation-calculator/blob/master/assets/screenshot-5.jpg)


## Requirements or developer notes

Ovulation dates conversation depends on certain php library. This is called IntlDateFormatter (http://php.net/manual/en/class.intldateformatter.php). Your server may not have installed IntlDateFormatter. If not installed then you will receive fatal error. In this case you need to install or ask your hosting company to install IntlDateFormatter php library. If you have access `php.ini` file then you can edit the code. Look for `php_intl.dll`. And remove the comment (;) from `;extension=php_intl.dll` and it should look like this: `extension=php_intl.dll`.

#### To install in local machine in mac OSX, you can follow this link:
1. [install-php-intl-extension-os-x](http://budiirawan.com/install-php-intl-extension-os-x)
2. [international-php-dates-with-intl](https://www.simonholywell.com/post/2015/07/international-php-dates-with-intl)


## Credits
1. [icomoon](https://icomoon.io)
2. [calendarscripts](http://calendarscripts.info/ovulation-predictor.html)

## Contact
* [Developer's website](https://zakirsajib.netlify.com)
* zakirsajib@gmail.com
