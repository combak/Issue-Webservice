<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modpack\Model\Github;

/**
 * Description of IssueServiceFactory
 *
 * @author DerOli82 <https://github.com/DerOli82>
 */
class IssueServiceFactory 
{
    public function __invoke( $services ) 
    {
        $config         = $services->get( "config" );
        $github         = ( isset( $config["github"] ) ) ? $config["github"] : array();
        $issueConfig    = ( isset( $github["issue"] ) ) ? $github["issue"] : array();
        $auth           = ( isset( $github["auth"] ) ) ? $github["auth"] : array();
        $user           = ( isset( $auth["user"] ) ) ? $auth["user"] : "";
        $token          = ( isset( $auth["token"] ) ) ? $auth["token"] : "";
               
        return new IssueService( $issueConfig, $user, $token );
    }
}
