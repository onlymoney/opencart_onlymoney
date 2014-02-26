<?php

/**
 * Onlymoney payment failed page
 * */

class ControllerOnlymoneyFail extends Controller {
  public function index() {

    $this->data['heading_title'] = 'Payment failed';
    $this->data['status_content'] = 'Your payment is failed for some reason. Contact the store owner for more details.';

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
  }
}
