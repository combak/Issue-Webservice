<?php
namespace Modpack\Model;
/**
 * @author DerOli82 <https://github.com/DerOli82>
 */
class RepositoryService implements RepositoryServiceInterface
{
    private $_apiUrl;
    
    private $_repositories;
    
    public function __construct( array $config ) 
    {
        $this->_apiUrl          = ( isset( $config["apiUrl"] ) ) ? $config["apiUrl"] : "";
        $this->_repositories    = ( isset( $config["repositories"] ) ) ? $config["repositories"] : array();
    }
    
    /**********************************************************************
     * Method - Implements RepositoryServiceInterface
     **********************************************************************/
    
    /**
     * Return a set of all allowed repositories
     * 
     * @return array
     */
    public function getAllRepositories()
    {
        return $this->_repositories;
    }
    
    /**
     * Return an allowed repository
     * 
     * @param string $name
     * @return array
     */
    public function getRepository( $name )
    {
        return ( isset( $this->_repositories[$name] ) ) ? $this->_repositories[$name] : array();
    }

    /**
     * Returns the repository url
     * 
     * @param string $name
     * @return string
     */    
    public function getRepositoryUrl( $name )
    {
        $repository = $this->getRepository( $name );
        $name       = ( isset( $repository["name"] ) ) ? $repository["name"] : "";
        $owner      = ( isset( $repository["owner"] ) ) ? $repository["owner"] : "";
        
        return $this->_apiUrl . "repos/" . $owner . "/" . $name;
    }
}
