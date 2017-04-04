<?php
namespace Modpack\Model;
/**
 * @author DerOli82 <https://github.com/DerOli82>
 */
class RepositoryServiceFactory 
{
    /**********************************************************************
     * Method - Implements FactoryInterface
     **********************************************************************/
    
    public function __invoke( $services ) 
    {
        $config = $services->get( "config" );
        
        return new RepositoryService( ( isset( $config["github"] ) ) ? $config["github"]: array() );
    }

}
