<?php
require_once "app/autoload.php";

use Zend\Config\Config;
use combak\github\IssueController;

try
{
    $controller = new IssueController( new Config( require_once "app/config.php" ) );
    $controller->listen();
}
catch( Exception $e )
{
    exit( $e->getMessage() );
}
