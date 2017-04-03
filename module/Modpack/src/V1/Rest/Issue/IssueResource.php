<?php
namespace Modpack\V1\Rest\Issue;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Http\Client;
use Zend\Http\Request;

class IssueResource extends AbstractResourceListener
{
    private $_apiUrl;
    private $_user;
    private $_token;


    public function __construct( $config ) 
    {
        if( isset( $config["apiUrl"] ) ) { $this->_apiUrl = $config["apiUrl"]; }
        
        if( isset( $config["auth" ] ) )
        {
            if( isset( $config["auth"]["user"] ) ) { $this->_user = $config["auth"]["user"]; }
            if( isset( $config["auth"]["token"] ) ) { $this->_token = $config["auth"]["token"]; }
        }
    }
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create( $data )
    {
        if( isset( $this->_apiUrl ) ) { return new ApiProblem( 503, "Service Unavailable: Github API Connector isn't configured" ); }
        if( isset( $this->_user ) ) { return new ApiProblem( 503, "Service Unavailable: Github API Connector isn't configured" ); }
        if( isset( $this->_token ) ) { return new ApiProblem( 503, "Service Unavailable: Github API Connector isn't configured" ); }
        
        /**
         * @todo 
         */
        
        
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
