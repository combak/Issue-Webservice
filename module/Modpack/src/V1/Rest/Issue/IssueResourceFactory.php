<?php
namespace Modpack\V1\Rest\Issue;

use Modpack\Model\Github\IssueService;
use Modpack\Model\Github\RepositoryService;

class IssueResourceFactory
{
    public function __invoke( $services )
    {
        $issueService = $services->get( IssueService::class );
        $repoService   = $services->get( RepositoryService::class );
                
        return new IssueResource( $issueService, $repoService );
    }
}
