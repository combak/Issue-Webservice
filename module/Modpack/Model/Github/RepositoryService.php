<?php
namespace Modpack\Model\Github;
/**
 * @author DerOli82 <https://github.com/DerOli82>
 */
class RepositoryService implements RepositoryServiceInterface
{
    /**
     * Github API Url
     * 
     * @var string
     */
    private $_apiUrl;
    
    /**
     * Set of all allowed repositories
     * @var array
     */
    private $_repositories;
    
    /**
     * @param string $apiUrl
     * @param array $repositories
     */
    public function __construct( $apiUrl, array $repositories ) 
    {
        $this->_apiUrl          = $apiUrl;
        $this->_repositories    = $repositories;
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
        $repoName       = ( isset( $repository["name"] ) ) ? $repository["name"] : "";
        $repOwner      = ( isset( $repository["owner"] ) ) ? $repository["owner"] : "";
        
        return $this->_apiUrl . "/repos/" . $repOwner . "/" . $repoName;
    }
}
