<?php
class ControllerModulePavquickview extends Controller {
	protected function index($setting) {
		static $module = 0;
		$this->language->load('module/pavquickview');
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/pavquickview.css')) {
			$this->document->addStyle('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/pavquickview.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/pavquickview.css');
		}
		$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
			
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
         	$this->data['base'] = $this->config->get('config_ssl');
	    } else {
	        $this->data['base'] = $this->config->get('config_url');
	    }
	    $this->data['popup_width'] = isset($setting['popup_width'])?$setting['popup_width']:"50%";
	    $this->data['popup_height'] = isset($setting['popup_height'])?$setting['popup_height']:"80%";
	    $this->data['image_selector'] = isset($setting['image_selector'])?$setting['image_selector']:".product-block .image";
	    $this->data['module_title'] = $this->language->get("product_quick_view");
		$this->data['module'] = $module++;

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavquickview.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/pavquickview.tpl';
		} else {
			$this->template = 'default/template/module/pavquickview.tpl';
		}

		$this->render();
	}
	public function getProducIdFromURI(){
		$this->load->model('pavquickview/product');
		$uri_query = "0";
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && isset($this->request->post['keyword'])) {
			$keyword = trim($this->request->post['keyword']);
			$uri_query = $this->model_pavquickview_product->getUriFromKeyword( $keyword );
		}
		
		$json['success'] = $uri_query;
		$this->response->setOutput(json_encode($json));
	}
	
}
?>
