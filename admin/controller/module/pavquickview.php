<?php
class ControllerModulePavquickview extends Controller {
	private $error = array();

	public function index() {

		$this->language->load('module/pavquickview');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('pavquickview', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');

		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_username'] = $this->language->get('entry_username');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
    	$this->data['entry_width_height'] = $this->language->get('entry_width_height');
    	$this->data['entry_image_selector']	= $this->language->get('entry_image_selector');
    	$this->data['entry_image_selector_help'] = $this->language->get('entry_image_selector_help');
    	$this->data['entry_additional_width_height'] = $this->language->get('entry_additional_width_height');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
    	$this->data['tab_module'] = $this->language->get('tab_module');

    	$default_values = array("additional_thumb_width"=>90,
							"additional_thumb_height"=>100,
							"additional_width"=>350,
							"popup_width"=>"50%",
							"popup_height"=>"80%",
							"additional_max_thumb"=>3,
							"image_selector"=>".product-block .image");
    	$this->data['default_values'] = $default_values;
		$this->data['positions'] = array( 'mainmenu',
										  'slideshow',
										  'promotion',
										  'content_top',
										  'column_left',
										  'column_right',
										  'content_bottom',
										  'footer_top',
										  'footer_center',
										  'footer_bottom'
		);
   
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['dimension'])) {
			$this->data['error_dimension'] = $this->error['dimension'];
		} else {
			$this->data['error_dimension'] = array();
		}

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/pavquickview', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

		$this->data['action'] = $this->url->link('module/pavquickview', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();

		if (isset($this->request->post['pavquickview_module'])) {
			$this->data['modules'] = $this->request->post['pavquickview_module'];
		} elseif ($this->config->get('pavquickview_module')) {
			$this->data['modules'] = $this->config->get('pavquickview_module');
		}
    	$general_params = array();

		$this->load->model('design/layout');

		$this->data['layouts'] = array();
		$this->data['layouts'][] = array('layout_id'=>99999, 'name' => $this->language->get('all_page') );

		$this->data['layouts'] = array_merge($this->data['layouts'],$this->model_design_layout->getLayouts());

		$this->load->model('design/banner');

		$this->data['banners'] = $this->model_design_banner->getBanners();

		$this->template = 'module/pavquickview.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/pavquickview')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (isset($this->request->post['pavquickview_module'])) {
			/**
			foreach ($this->request->post['pavquickview_module'] as $key => $value) {
				
			}
			*/
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>
