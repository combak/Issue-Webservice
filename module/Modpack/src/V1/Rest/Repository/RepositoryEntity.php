<?php
namespace Modpack\V1\Rest\Repository;

class RepositoryEntity
{   
    public $name;
    public $owner;
    
    public function getArrayCopy()
    {
        $array = array();
        
        if( isset( $this->name ) ) { $array[ "name" ] = $this->name; }
        if( isset( $this->owner ) ) { $array[ "owner" ] = $this->owner; }
        
        return $array;
    }
 
    public function exchangeArray( array $array )
    {
        $this->name     = isset( $array["name"] ) ? $array["name"] : null;
        $this->owner    = isset( $array["owner"] ) ? $array["owner"] : null;
    }        
}
