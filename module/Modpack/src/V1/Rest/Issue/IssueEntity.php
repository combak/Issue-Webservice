<?php
namespace Modpack\V1\Rest\Issue;

class IssueEntity
{
    public $repository;
    public $name;
    public $title;
    public $description;
    
    public function getArrayCopy()
    {
        $array = array();
        
        if( isset( $this->repository ) ) { $array[ "repository" ] = $this->repository; }
        if( isset( $this->name ) ) { $array[ "name" ] = $this->name; }
        if( isset( $this->title ) ) { $array[ "title" ] = $this->title; }
        if( isset( $this->description ) ) { $array[ "description" ] = $this->description; }

        return $array;
    }
 
    public function exchangeArray( array $array )
    {
        $this->repository   = isset( $array["repository"] ) ? $array["repository"] : null;
        $this->name         = isset( $array["name"] ) ? $array["name"] : null;
        $this->title        = isset( $array["title"] ) ? $array["title"] : null;
        $this->description  = isset( $array["description"] ) ? $array["description"] : null;
    }            
}
