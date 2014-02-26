<?php

/**
 *  Onlymoney payment method selection in checkout
 */

class ControllerPaymentOnlymoney extends Controller {
  protected function index() {

    $this->data['button_confirm'] = $this->language->get('button_confirm');

    $this->load->model('checkout/order');

    $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

    // onlymoney api
    $this->data['action'] = $this->config->get('onlymoney_api_url');
    //mercahnt_id
    $this->data['merchant'] = $this->config->get('onlymoney_merchant');
    //currency
    $this->data['currency'] = $order_info['currency_code'];
    //amount
    $this->data['amount'] = $order_info['total'];
    //description
    $this->data['description'] = 'Оплата заказа #' . $order_info['order_id']
      . ' на сайте ' . $this->config->get('config_name');


    $data = array(
      'merchant_id' => $this->data['merchant'],
      'order_id' => $order_info['order_id'],
      'amount' => $order_info['total'],
      'currency' => $order_info['currency_code'],
    );
    $secret_key = $this->config->get('onlymoney_secret_key');

    $json = json_encode($data);
    $this->data['signature'] = base64_encode(urlencode(sha1($secret_key . $json
                                                            . $secret_key)));
    $this->data['operation'] = base64_encode(urlencode($json));

    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template')
                    . '/template/payment/onlymoney.tpl')
    ) {
      $this->template = $this->config->get('config_template') . '/template/payment/onlymoney.tpl';
    }
    else {
      $this->template = 'default/template/payment/onlymoney.tpl';
    }

    $this->render();
  }
}
