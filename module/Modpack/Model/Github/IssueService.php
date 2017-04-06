<?php
namespace Modpack\Model\Github;

use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Json\Json;

/**
 * Description of IssueService
 *
 * @author DerOli82 <https://github.com/DerOli82>
 */
class IssueService implements IssueServiceInterface
{
    /**
     * Issue config
     * 
     * @var array
     */
    private $_config;
    
    /**
     * Basic authentication usermane
     * 
     * @var string
     */
    private $_user;
    
    /**
     * Basic authentication token
     * 
     * @var string
     */
    private $_token;
    
    /**
     * @param array $config
     * @param string $user
     * @param string $token
     */
    public function __construct( array $config, $user, $token )
    {
        $this->_config = $config;
        $this->_user = $user;
        $this->_token = $token;
    }
    
    /**
     * Author name formatter adds prefix and/or suffix 
     * 
     * @param string $name
     * @return string
     */
    public function formatterAuthorName( $name )
    {
        $prefix = ( isset( $this->_config["name_prefix"] ) ) ? $this->_config["name_prefix"] : "";
        $suffix = ( isset( $this->_config["name_suffix"] ) ) ? $this->_config["name_suffix"] : "";
        
        return $prefix . $name . $suffix . " ";
    }
    /**********************************************************************
     * Method - Implements RepositoryServiceInterface
     **********************************************************************/
    
    /**
     * Post an Issue via Github API
     * 
     * @param string $repoUrl
     * @param mixed $data
     * @return \Zend\Http\Response
     */
    public function postIssue( $repoUrl, $data )
    {
        $name   = ( isset( $data->name ) ) ? $this->formatterAuthorName( $data->name ): "";
        $client = new Client( $repoUrl, array(
            "sslverifypeer" => false
        ) );
        $client->setEncType( "application/json" );
        $client->setMethod( Request::METHOD_POST );
        $client->setAuth( $this->_user, $this->_token );
        $client->setRawBody( Json::encode( array(
            "title" => $data->title,
            "body" => $name . $data->description
        )));
        return $client->send();
    }
}
