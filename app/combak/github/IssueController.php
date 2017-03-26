<?php
namespace combak\github;

use Zend\Config\Config;
use Zend\Json\Json;
use Zend\Http\Response;
use combak\github\api\Service;
use combak\github\api\Issue;

/**
 * Description of Controller
 *
 * @author DerOli82 <https://github.com/DerOli82>
 */
class IssueController 
{
    /**
     *
     * @var Zend\Config\Config
     */
    private $_config;
    
    /**
     * @var combak\github\api\Service
     */
    private $_github;
    
    public function __construct( Config $config ) 
    {
        $this->_config = $config;
        
        if( !$this->_config->offsetExists( "github" ) ) { throw new \UnexpectedValueException( "Config element 'github' doesn't exists." ); }
        
        $this->_github = new Service( $this->_config->get( "github" ) );
    }
    
    protected function getAction()
    {       
        http_response_code( 200 );
        return Json::encode( $this->_github->getAllowedRepositories()->toArray() );
    }
    
    protected function postAction()
    {
        $inputFilter = $this->_github->getInputFilter();
        $inputFilter->setData( Json::decode( file_get_contents( "php://input" ), Json::TYPE_ARRAY ) );
        
        if( $inputFilter->isValid() )
        {
            $issue = new Issue(
                $inputFilter->getValue( "author" ),
                $inputFilter->getValue( "title" ),
                $inputFilter->getValue( "text" )
            );
            http_response_code( 201 );
            return $this->_github->postIssue( $issue, $inputFilter->getValue( "repository" ) );
        }
        else 
        {
            http_response_code( 400 );
            return Json::encode( $inputFilter->getMessages() );
        }        
    }

    public function listen()
    {
        switch( filter_input( INPUT_SERVER , "REQUEST_METHOD" ) )
        {
            case "POST" : 
                $response = $this->postAction();
                break;
            case "GET" :
                $response = $this->getAction();
                break;
            default :
                http_response_code( 400 );
                $response = "Unknown request";
                break;
        }
        return $response;
   }
}
