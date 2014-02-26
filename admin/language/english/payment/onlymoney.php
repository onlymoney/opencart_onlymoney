<?php

/**
 * english localisations for Onlymoney admin settings
 */

// Heading
$_['heading_title']      = 'Onlymoney';

// Text
$_['instructions'] = 'You have to create an account at <a href = "https://onlymoney.com">https://onlymoney.com</a> before start using this payment system.<br />' .
  'Then visit <a href = "https://onlymoney.com/merchant/">https://onlymoney.com/merchant/</a> and fill all the fields with status pages like that:' .
  '<ul> <li>YOUR_SITE/index.php?route=onlymoney/fail </li>
  <li>YOUR_SITE/index.php?route=onlymoney/cancel </li>
  <li>YOUR_SITE/index.php?route=onlymoney/status </li>
  <li>YOUR_SITE/index.php?route=onlymoney/success </li></ul>
  After that administrator will approve your merchant status and you will get Your merchant ID and Secret Key at the same page. <br />
  *Default Api URL - https://onlymoney.com/customs/';

$_['text_payment']       = 'Payment';
$_['text_success']       = 'Success: You have modified Onlymoney account details!';
$_['text_pay']           = 'Onlymoney';
$_['text_currency']     = 'select';
$_['text_onlymoney'] 	 = '<a onclick="window.open(\'https://onlymoney.com\');"><img src="view/image/payment/onlymoney.png" alt="onlymoney" title="onlymoney" style="border: 1px solid #EEEEEE;" height="25px" /></a>';

// Entry
$_['entry_merchant']     = 'Merchant ID:';
$_['entry_secret_key']    = 'Secret Key:';
$_['entry_api_url']    = 'Api URL:';

$_['entry_status']    = 'Status:';
$_['entry_order_status']    = 'Order status:';
$_['entry_sort_order']    = 'Sort order:';

// Error
$_['error_merchant']     = 'Merchant ID Required!';
$_['error_apiurl']     = 'Api URL Required!';
$_['error_secretcode']     = 'Merchant Secret code Required!';
