<?php

class ModelPaymentOnlymoney extends Model {
	public function getMethod($address) {
		$this->load->language('payment/onlymoney');

    $status = TRUE;
		$method_data = array();

		if ($status) {
			$method_data = array(
				'code'         => 'onlymoney',
				'title'      => $this->language->get('text_title'),
				'sort_order' => $this->config->get('onlymoney_sort_order')
			);
		}

		return $method_data;
	}
}
?>
