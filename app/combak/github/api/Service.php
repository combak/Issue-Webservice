<?php
namespace combak\github\api;

use Zend\Config\Config;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\InputFilter\Factory;

/**
 * Description of Service
 *
 * @author DerOli82 <https://github.com/DerOli82>
 */
class Service
{
    /**
     * @var Zend\Config\Config 
     */
    private $_config;
    
    /**
     * @param Zend\Config\Config $config
     * @throws \UnexpectedValueException
     */
    public function __construct( Config $config ) 
    {
        $this->_config = $config;
    }
    
    /**
     * @return Zend\Config\Config
     * @throws \UnexpectedValueException
     */
    public function getAllowedRepositories()
    {
        if( !$this->_config->offsetExists( "repositories" ) ) { throw new \UnexpectedValueException( "Config element 'github/repositories' doesn't exists." ); }
        
        return $this->_config->get( "repositories" );
    }

    /**
     * @return Zend\Config\Config
     * @throws \UnexpectedValueException
     */    
    public function getRepository( $name )
    {
        $repositories = $this->getAllowedRepositories();
        
        if( !$repositories->offsetExists( $name ) ) { throw new \UnexpectedValueException( "'".$name."' unknown repository." ); }
        
        return $repositories->get( $name );
    }
    
    public function getRepositoryUrl( $name )
    {
        if( !$this->_config->offsetExists( "apiUrl" ) ) { throw new \UnexpectedValueException( "Config element 'github/apiUrl' doesn't exists." ); }
        
        $repository = $this->getRepository( $name );
        
        if( !$repository->offsetExists( "owner" ) ) { throw new \UnexpectedValueException( "Config element 'github/repositories/".$name."/owner' doesn't exists." ); }
        if( !$repository->offsetExists( "name" ) ) { throw new \UnexpectedValueException( "Config element 'github/repositories/".$name."/name' doesn't exists." ); }
        
        return $this->_config->get( "apiUrl" )."/repos/".$repository->get( "owner" )."/".$repository->get( "name");
    }
    
    /**
     * 
     * @return Zend\InputFilter\InputFilterInterface
     * @throws \UnexpectedValueException
     */
    public function getInputFilter()
    {
        if( !$this->_config->offsetExists( "inputFilter" ) ) { throw new \UnexpectedValueException( "Config element 'github/inputFilter' doesn't exists." ); }
        
        $factory = new Factory();
        
        return $factory->createInputFilter( $this->_config->get( "inputFilter" ) );
    }

    public function postIssue( Issue $issue, $repository )
    {
        if( !$this->_config->offsetExists( "auth" ) ) { throw new \UnexpectedValueException( "Config element 'github/auth' doesn't exists." ); }
        
        $auth = $this->_config->get( "auth" );
        
        if( !$auth->offsetExists( "user" ) ) { throw new \UnexpectedValueException( "Config element 'github/auth/user' doesn't exists." ); }
        if( !$auth->offsetExists( "token" ) ) { throw new \UnexpectedValueException( "Config element 'github/auth/token' doesn't exists." ); }
        
        $client = new Client( $this->getRepositoryUrl( $repository )."/issues", array(
            "sslverifypeer" => false
        ));
        $client->setEncType( "application/json" );
        $client->setMethod( Request::METHOD_POST );
        $client->setAuth( $auth->get( "user" ), $auth->get( "token" ) );
        $client->setRawBody( $issue->toJson() );
        
        $response = $client->send();

        if( !isset( $response ) )
        {
            throw new \RuntimeException( "No response received." );
        }
        
        if( !$response->isSuccess() )
        {
            throw new \RuntimeException( $response->getStatusCode() .": ". $response->getBody() );
        }
        return $response->getBody();
    }

}
