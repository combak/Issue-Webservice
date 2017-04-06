<?php
namespace Modpack\Model\Github;
/**
 * @author DerOli82 <https://github.com/DerOli82>
 */
class RepositoryServiceFactory 
{    
    public function __invoke( $services ) 
    {
        $config         = $services->get( "config" );
        $github         = ( isset( $config["github"] ) ) ? $config["github"]: array();
        $apiUrl         = ( isset( $github["apiUrl"] ) ) ? $github["apiUrl"]: "";
        $repositories   = ( isset( $github["repositories"] ) ) ? $github["repositories"]: array();
        
        return new RepositoryService( $apiUrl, $repositories );
    }
}
