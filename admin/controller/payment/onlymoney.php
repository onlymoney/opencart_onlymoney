<?php

/**
 * Onlymoney payment admin settings form
 */

class ControllerPaymentOnlymoney extends Controller {
  private $error = array();

  public function index() {
    $this->load->language('payment/onlymoney');

    $this->document->setTitle($this->language->get('heading_title'));

    $this->load->model('setting/setting');

    if (($this->request->server['REQUEST_METHOD'] == 'POST')
      && ($this->validate())
    ) {
      $this->load->model('setting/setting');

      $this->model_setting_setting->editSetting('onlymoney',
                                                $this->request->post);

      $this->session->data['success'] = $this->language->get('text_success');

      $this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token='
                      . $this->session->data['token']);
    }

    $this->data['instructions'] = $this->language->get('instructions');

    $this->data['text_enabled'] = $this->language->get('text_enabled');
    $this->data['text_disabled'] = $this->language->get('text_disabled');
    $this->data['heading_title'] = $this->language->get('heading_title');

    $this->data['entry_secret_key'] = $this->language->get('entry_secret_key');
    $this->data['entry_merchant'] = $this->language->get('entry_merchant');
    $this->data['entry_api_url'] = $this->language->get('entry_api_url');
    $this->data['entry_status'] = $this->language->get('entry_status');

    $this->data['entry_order_status'] = $this->language->get('entry_order_status');
    $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
    $this->data['button_save'] = $this->language->get('button_save');
    $this->data['button_cancel'] = $this->language->get('button_cancel');

    $this->data['tab_general'] = $this->language->get('tab_general');

    if (isset($this->error['warning'])) {
      $this->data['error_warning'] = $this->error['warning'];
    }
    else {
      $this->data['error_warning'] = '';
    }

    if (isset($this->error['merchant'])) {
      $this->data['error_merchant'] = $this->error['merchant'];
    }
    else {
      $this->data['error_merchant'] = '';
    }

    if (isset($this->error['secret_key'])) {
      $this->data['error_secret_key'] = $this->error['secret_key'];
    }
    else {
      $this->data['error_secret_key'] = '';
    }

    if (isset($this->error['api_url'])) {
      $this->data['error_api_url'] = $this->error['api_url'];
    }
    else {
      $this->data['error_api_url'] = '';
    }

    if (isset($this->error['type'])) {
      $this->data['error_type'] = $this->error['type'];
    }
    else {
      $this->data['error_type'] = '';
    }

    $this->document->breadcrumbs = array();
    $this->data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_home'),
      'href' => $this->url->link('common/home',
                                 'token=' . $this->session->data['token'],
                                 'SSL'),
      'separator' => false
    );

    $this->data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_payment'),
      'href' => $this->url->link('extension/payment',
                                 'token=' . $this->session->data['token'],
                                 'SSL'),
      'separator' => ' :: '
    );

    $this->data['breadcrumbs'][] = array(
      'text' => $this->language->get('heading_title'),
      'href' => $this->url->link('payment/onlymoney',
                                 'token=' . $this->session->data['token'],
                                 'SSL'),
      'separator' => ' :: '
    );


    $this->data['action'] = $this->url->link('payment/onlymoney', 'token=' . $this->session->data['token'], 'SSL');

    $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

    if (isset($this->request->post['onlymoney_merchant'])) {
      $this->data['onlymoney_merchant'] = $this->request->post['onlymoney_merchant'];
    }
    else {
      $this->data['onlymoney_merchant'] = $this->config->get('onlymoney_merchant');
    }

    if (isset($this->request->post['onlymoney_api_url'])) {
      $this->data['onlymoney_api_url'] = $this->request->post['onlymoney_api_url'];
    }
    else {
      $this->data['onlymoney_api_url'] = $this->config->get('onlymoney_api_url');
    }

    if (isset($this->request->post['onlymoney_secret_key'])) {
      $this->data['onlymoney_secret_key'] = $this->request->post['onlymoney_secret_key'];
    }
    else {
      $this->data['onlymoney_secret_key'] = $this->config->get('onlymoney_secret_key');
    }

    if (isset($this->request->post['onlymoney_status'])) {
      $this->data['onlymoney_status'] = $this->request->post['onlymoney_status'];
    }
    else {
      $this->data['onlymoney_status'] = $this->config->get('onlymoney_status');
    }

    $this->load->model('localisation/order_status');

    $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

    if (isset($this->request->post['onlymoney_order_status_id'])) {
      $this->data['onlymoney_order_status_id'] = $this->request->post['onlymoney_order_status_id'];
    }
    else {
      $this->data['onlymoney_order_status_id'] = $this->config->get('onlymoney_order_status_id');
    }

    if (isset($this->request->post['onlymoney_sort_order'])) {
      $this->data['onlymoney_sort_order'] = $this->request->post['onlymoney_sort_order'];
    }
    else {
      $this->data['onlymoney_sort_order'] = $this->config->get('onlymoney_sort_order');
    }

    $this->load->model('localisation/order_status');

    $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

    $this->template = 'payment/onlymoney.tpl';
    $this->children = array(
      'common/header',
      'common/footer'
    );

    $this->response->setOutput($this->render(TRUE),
                               $this->config->get('config_compression'));
  }

  private function validate() {
    $user_permission = $this->user->hasPermission('modify',
                                                  'payment/onlymoney');
    if (empty($user_permission)) {
      $this->error['warning'] = $this->language->get('error_permission');
    }
    $post_merchant = $this->request->post['onlymoney_merchant'];
    if (empty($post_merchant)) {
      $this->error['merchant'] = $this->language->get('error_merchant');
    }

    $post_secret_key = $this->request->post['onlymoney_secret_key'];
    if (empty($post_secret_key)) {
      $this->error['secret_key'] = $this->language->get('error_secret_key');
    }

    if (!$this->error) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}
