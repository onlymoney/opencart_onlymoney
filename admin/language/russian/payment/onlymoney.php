<?php

/**
 * russian localisations for Onlymoney admin settings
 */

// Heading
$_['heading_title']      = 'Onlymoney';

// Text
$_['instructions'] = 'Вы должны зарегистрироваться на <a href = "https://onlymoney.com">https://onlymoney.com</a> прежде чем начать использовать эту систему оплаты.<br />' .
  'Потом посетите <a href = "https://onlymoney.com/merchant/">https://onlymoney.com/merchant/</a> и заполните поля со статусными страницами таким образом:' .
  '<ul> <li>YOUR_SITE/index.php?route=onlymoney/fail </li>
  <li>YOUR_SITE/index.php?route=onlymoney/cancel </li>
  <li>YOUR_SITE/index.php?route=onlymoney/status </li>
  <li>YOUR_SITE/index.php?route=onlymoney/success </li></ul>
  После этого администратор подтвердит Ваш статус мерчанта и Вы получите ID мерчанта и Секретный код на той же странице. <br />
  *Api URL по умолчанию - https://onlymoney.com/customs/';

$_['text_payment']       = 'Система оплаты';
$_['text_success']       = 'Успешно изменены настройки аккаунта Onlymoney!';
$_['text_pay']           = 'Onlymoney';
$_['text_currency']     = 'select';
$_['text_onlymoney'] 	 = '<a onclick="window.open(\'https://onlymoney.com\');"><img src="view/image/payment/onlymoney.png" alt="onlymoney" title="onlymoney" style="border: 1px solid #EEEEEE;" height="25px" /></a>';

// Entry
$_['entry_merchant']     = 'ID мерчанта:';
$_['entry_secret_key']    = 'Секретный код:';
$_['entry_api_url']    = 'Api URL:';

$_['entry_status']    = 'Статус:';
$_['entry_order_status']    = 'Статус платежа:';
$_['entry_sort_order']    = 'Порядок сортировки:';

// Error
$_['error_merchant']     = 'Укажите ID мерчанта!';
$_['error_apiurl']     = 'Укажите Api URL!';
$_['error_secretcode']     = 'Укажите секретный код мерчанта!';
