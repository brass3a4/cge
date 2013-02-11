<?php
$theme = $this->config->item('admin_template');

$this->load->view('themes/admin/'.$theme.'/header_view');
$this->load->view('themes/admin/'.$theme.'/menu_view');
$this->load->view($content);
$this->load->view('themes/admin/'.$theme.'/footer_view');