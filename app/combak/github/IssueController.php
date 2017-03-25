<?php
namespace combak\github;

use Zend\Config\Config;
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
    
    protected function postAction()
    {
        $inputFilter = $this->_github->getInputFilter();
        $inputFilter->setData( filter_input_array( INPUT_POST ) );
        
        if( $inputFilter->isValid() )
        {
            $issue = new Issue(
                $inputFilter->getValue( "author" ),
                $inputFilter->getValue( "title" ),
                $inputFilter->getValue( "text" )
            );
            $this->_github->postIssue( $issue, $inputFilter->getValue( "repository" ) );
        }
        else 
        {
            /**
             * @todo error handling
             */
        }        
    }

    public function listen()
    {
        switch( filter_input( INPUT_SERVER , "REQUEST_METHOD" ) )
        {
            case "POST" : 
                $this->postAction();
                break;
        }            
   }
}
