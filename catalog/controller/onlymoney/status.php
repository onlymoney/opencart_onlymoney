<?php

/**
 *  Onlymoney payment status page. Gets server answer after payment and checks if
 *  order, signature and etc. ok
 *  Then callbacks to server the result as json
 */

class ControllerOnlymoneyStatus extends Controller {
  public function index() {

    $this->data['heading_title'] = 'Payment status';

    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template')
                    . '/template/onlymoney/onlymoney.tpl')
    ) {
      $this->template = $this->config->get('config_template') . '/template/onlymoney/onlymoney.tpl';
    }
    else {
      $this->template = 'default/template/onlymoney/onlymoney.tpl';
    }

    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );

    $this->response->setoutput($this->render());

    if (!empty($_POST['signature']) && !empty($_POST['operation'])) {
      $operation = json_decode(urldecode(base64_decode($_POST['operation'])));
      $this->load->model('checkout/order');
      $order = $this->model_checkout_order->getOrder($operation->order_id);

      if (empty($order)) {
        print json_encode(array(
                            'err' => 1,
                            'message' => 'wrong payment order'
                          ));
        exit();
      }

      if (!empty($order['total'])) {
        if (!empty($order['total'])) {
          $amount = $order['total'];
        }

        if (!empty($order['currency_code'])) {
          $currency_code = $order['currency_code'];
        }
      }
      else {
        print json_encode(array(
                            'err' => 1,
                            'message' => 'wrong payment order on merchant site'
                          ));
        exit();
      }

      if ($amount != $operation->amount) {
        print json_encode(array(
                            'err' => 1,
                            'message' => 'wrong payment amount'
                          ));
        exit();
      }

      if ($currency_code != $operation->currency) {
        print json_encode(array(
                            'err' => 1,
                            'message' => 'wrong payment currency'
                          ));
        exit();
      }

      $secret_key = $this->config->get('onlymoney_secret_key');

      $json = urldecode(base64_decode($_POST['operation']));
      $merchant_signature = sha1($secret_key . $json . $secret_key);
      $signature = urldecode(base64_decode($_POST['signature']));
      if ($merchant_signature != $signature) {

        print json_encode(array(
                            'err' => 1,
                            'message' => 'wrong signature'
                          ));
        exit();
      }

    }

    else {
      print json_encode(array(
                          'err' => 1,
                          'message' => 'wrong signature or order'
                        ));
      exit();
    }

    print json_encode(array('err' => 0, 'message' => 'payment ok'));
    exit();
  }
}
