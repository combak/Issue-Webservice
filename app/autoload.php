<?php
/**
 * @author DerOli82 <https://github.com/DerOli82>
 */
require_once "vendor/autoload.php";
use Zend\Loader\AutoloaderFactory;

AutoloaderFactory::factory( array(
    "Zend\Loader\StandardAutoloader" => array(
        "namespaces" => array(
            "combak" => "app/combak",
        ),
    )    
) );