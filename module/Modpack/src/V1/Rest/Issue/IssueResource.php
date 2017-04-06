<?php
namespace Modpack\V1\Rest\Issue;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Json\Json;

use Modpack\Model\Github\IssueServiceInterface;
use Modpack\Model\Github\RepositoryServiceInterface;

class IssueResource extends AbstractResourceListener
{
    /**
     * Github Issue Service Interface
     * 
     * @var \Modpack\Model\Github\IssueServiceInterface
     */
    private $_issueService;
    
    /**
     * Github Repository Service Interface
     * 
     * @var \Modpack\Model\Github\RepositoryServiceInterface 
     */
    private $_repositoryService;
    
    /**
     * 
     * @param \Modpack\Model\Github\IssueServiceInterface $issueService
     * @param \Modpack\Model\Github\RepositoryServiceInterface $repositoryService
     */
    public function __construct( IssueServiceInterface $issueService, RepositoryServiceInterface $repositoryService ) 
    {
        $this->_issueService        = $issueService;
        $this->_repositoryService   = $repositoryService;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create( $data )
    {
        $repoUrl    = $this->_repositoryService->getRepositoryUrl( $data->repository ) . "/issues";
        $response   = $this->_issueService->postIssue( $repoUrl, $data );
        
        if( $response->isSuccess() )
        {
            return Json::decode( $response->getBody() );
        }
        else
        {
            return new ApiProblem( $response->getStatusCode(), $response->getBody() );
        }
        //return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
