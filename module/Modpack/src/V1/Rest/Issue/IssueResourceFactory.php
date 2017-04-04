<?php
namespace Modpack\V1\Rest\Issue;

class IssueResourceFactory
{
    public function __invoke( $services )
    {
        $config         = $services->get( "config" );
        $repoServices   = $services->get( RepositoryService::class );
        $github         = ( isset( $config["github"] ) ) ? $config["github"] : array();
        $auth           = ( isset( $github["auth"] ) ) ? $github["auth"] : array();
        $user           = ( isset( $auth["user"] ) ) ? $auth["user"] : "";
        $token          = ( isset( $auth["token"] ) ) ? $auth["token"] : "";
                
        return new IssueResource( $repoServices, $user, $token );
    }
}
