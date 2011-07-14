<?php
class General extends CI_Model{
	function __construct(){
		parent::__construct();
		$obj = & get_instance();
		$obj->load->library('menu/menu');
	}
	function create_menu(){
		$menu = new Menu;
		$hdr = new MenuHeader;
		$profile['edit'] = anchor('edit','Edit Profile');
		$profile['signout'] = anchor('signout','Sign Out');

		$administrasi['extensions']=anchor('extensions','Extensions');
		$administrasi['user']=anchor('user','Users');
		
		$pelanggan['datapelanggan'] = anchor('client','Client List');
		$pelanggan['kategori'] = anchor('client/category','Category');
		$pelanggan['layanan'] = anchor('Pelanggan/layanan','Layanan');
		
		$help['About']=anchor('main/about','About');
		$help['Howto']=anchor('main/howto','How To');
		$help['Howto']=anchor('main/developer','Developer');
		
		$header['1'] = $hdr->header('Profile',$profile);
		$header['2'] = $hdr->header('Administrasi',$administrasi);
		$header['3'] = $hdr->header('Pelanggan',$pelanggan);
		$header['4'] = $hdr->header('Help',$help);
		$menu->create_menu($header);
		return $menu->show_menu();
	}
	function css(){
		$css_link = $this->config->item('base_url') . 'application/modules/main/';
		$css = '<link rel="stylesheet" type="text/css" href=' . $css_link . 'css_style.css' . '>';
		return $css;
	}
}