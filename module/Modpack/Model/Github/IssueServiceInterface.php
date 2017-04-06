<?php
namespace Modpack\Model\Github;

/**
 *
 * @author DerOli82 <https://github.com/DerOli82>
 */
interface IssueServiceInterface 
{
    /**
     * Post an Issue via Github API
     * 
     * @param string $repoUrl
     * @param mixed $data
     * @return \Zend\Http\Response
     */
    public function postIssue( $repoUrl, $data );
}
