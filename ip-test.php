<?php
/*
Plugin Name: Ip test header
Plugin URI: http://www.ideetjeshuis.nl/
Description: Ip Wan test
Version: 0.0.1
Author: Hans Huizinga
Author URI: http://www.ideetjeshuis.nl
*/


class iptest {

  function ip_test_css() {
    echo "
      <style type='text/css'>
      #iptest_header {
        position: absolute;
        top: 0.5em;
        margin: 0; padding: 0;
        left: 300px;
        font-size: 20px;
		color: black;
      }
	  
	  #googleadsense_header {
	  	filter:alpha(opacity=0);
		-moz-opacity:0;
		-khtml-opacity: 0;
		opacity: 0;
	  }
	  
	  #wphead {
	  background: -moz-linear-gradient(center bottom , #D77777, #DD0000) repeat scroll 0 0 transparent;
	  }
      </style>";
  }

  function ip_test_footer() {
  
  if (!current_user_can('manage_options')) return;

	echo "<p id='iptest_header'>IP is veranderd van ".gethostbyname('www.ideetjeshuis.nl')." naar ".gethostbyname('familieboek.no-ip.info')."</p>";
	}
}

if (is_admin()){
if (gethostbyname('www.ideetjeshuis.nl') != gethostbyname('familieboek.no-ip.info')) 
	{
		add_action('admin_head', array('iptest','ip_test_css'));
		add_action('admin_footer', array('iptest','ip_test_footer'));
	}
}

?>