<?php
require_once "app/autoload.php";

use Zend\Config\Config;
use Zend\Json\Json;
use combak\github\IssueController;

try
{
    $controller = new IssueController( new Config( require_once "app/config.php" ) );
    $response = $controller->listen();
}
catch( Exception $e )
{
    http_response_code( 500 );
    $response = Json::encode( array(
        "exception" => get_class( $e ),
        "message"   => $e->getMessage()
    ));
}
header( "Content-Type: application/json" );
exit( $response );