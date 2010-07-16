<?php

require('webphp/web.php');
require('app/about.php');
$urls = array(
	'/' => 'index',
    '/index/test/*' => 'hello',
	'/help' => 'help',
	'/about' => 'about',
);

class index {
    function GET($path) {
		echo web::render('index.php', array('name'=>'fred'));
    }
}

class hello {
	function GET($path) {
    }
}

class help {
	function GET($path) {
		echo web::render('help.php');
	}
}

web::run($urls);

?>
