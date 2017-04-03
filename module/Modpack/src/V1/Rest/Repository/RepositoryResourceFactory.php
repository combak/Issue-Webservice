<?php
namespace Modpack\V1\Rest\Repository;

class RepositoryResourceFactory
{
    public function __invoke( $services )
    {
        $config = $services->get( "config" );
        
        return new RepositoryResource( $config["repositories"] );
    }
}
