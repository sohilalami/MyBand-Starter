<?php
require 'functions.php';
require 'model.php';
require 'controllers.php';

if ( ! isset( $_GET['page'] ) ) {
	header( 'Status: 404' );
	echo '404 Page Not Found';
	exit;
}

switch ( $_GET['page'] ) {
	case 'homepage':
		homepage();
		break;
	case 'alle-helden':
		alle_helden();
		break;
}
