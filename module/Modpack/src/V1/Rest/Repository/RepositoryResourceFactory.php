<?php
namespace Modpack\V1\Rest\Repository;

use Modpack\Model\Github\RepositoryService;

class RepositoryResourceFactory
{
    public function __invoke( $services )
    {
        $repoServices = $services->get( RepositoryService::class );
        
        return new RepositoryResource( $repoServices );
    }
}
