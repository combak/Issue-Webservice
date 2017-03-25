<?php
/**
 * Application configuration
 */
return array(
    "github" => array(
        "apiUrl" => "https://api.github.com",
        "auth" => array(
            "user" => "",
            "token" => ""
        ),
        "repositories" => array(
            "aot" => array(
                "name"  => "ProjectRET-AoT",
                "owner" => "BakermanLP",       
            ),
            "sw1" => array(
                "name"  => "ShatteredWorld",
                "owner" => "combak",
            )
        ),
        "inputFilter" => array(
            "repository" => array(
                "name" => "repository",
                "required" => true,
                "validators" => array(
                    new Zend\Validator\StringLength( array( "max" => 10 ) ),
                    new Zend\I18n\Validator\Alnum()                    
                )
            ),
            "author" => array(
                "name" => "author",
                "required" => true,
                "validators" => array(
                    new Zend\Validator\StringLength( array( "max" => 39 ) ),
                    new Zend\I18n\Validator\Alnum()
                )
            ),
            "title" => array(
                "name" => "title",
                "required" => true,
                "validators" => array(
                    new Zend\Validator\StringLength( array( "max" => 100 ) )
                )
            ),
            "text" => array(
                "name" => "text",
                "required" => true,
                "validators" => array(
                    new Zend\Validator\StringLength( array( "max" => 5000 ) )
                )
            )
        )
    )
);
