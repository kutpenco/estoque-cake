<?php
class ProductsSalesController extends AppController {

	var $name = 'ProductsSales';
	var $uses = array('Sale', 'ProductsSale');
	
	function admin_add() {
		if (!empty($this->data)) {
			$this->ProductsSale->id = $this->data['ProductsSale']['id'];
			if ($this->ProductsSale->saveField('amount', $this->data['ProductsSale']['amount'])) {
				$products_sale = $this->ProductsSale->find('all', array('conditions' => array('sale_id' => $this->data['ProductsSale']['sale_id']), 'recursive' => -1));
				$this->set(compact('products_sale'));
				$this->render('add_success','ajax');
			} else {
				$this->render('add_failure','ajax');
			}
		}
		$this->set(compact('products_sale'));
	}

}
?>