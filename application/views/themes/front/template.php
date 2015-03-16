<?php
$theme = $this->config->item('front_template');

$this->load->view('themes/front/'.$theme.'/header_view');
//$this->load->view('themes/front/'.$theme.'/menu_view');
$this->load->view($content);
$this->load->view('themes/front/'.$theme.'/footer_view');
