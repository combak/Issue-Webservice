<?php
namespace Modpack\Model;
/**
 * @author DerOli82 <https://github.com/DerOli82>
 */
interface RepositoryServiceInterface 
{
    /**
     * Return a set of all allowed repositories
     * 
     * @return array
     */
    public function getAllRepositories();
    
    /**
     * Return an allowed repository
     * 
     * @param string $name
     * @return array
     */
    public function getRepository( $name );

    /**
     * Returns the repository url
     * 
     * @param string $name
     * @return string
     */    
    public function getRepositoryUrl( $name );
}
