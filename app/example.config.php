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
                    
                )
            ),
            "author" => array(
                "name" => "author",
                "required" => true
            ),
            "title" => array(
                "name" => "title",
                "required" => true
            ),
            "text" => array(
                "name" => "text",
                "required" => true
            )
        )
    )
);
