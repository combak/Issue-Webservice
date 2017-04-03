<?php
namespace Modpack\V1\Rest\Issue;

class IssueResourceFactory
{
    public function __invoke( $services )
    {
        $config = $services->get( "config" );
        
        return new IssueResource( $config["github"] );
    }
}
