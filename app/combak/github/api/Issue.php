<?php
namespace combak\github\api;

use Zend\Json\Json;
/**
 * Description of Issue
 *
 * @author DerOli82 <https://github.com/DerOli82>
 */
class Issue 
{
    private $_author;
    private $_title;
    private $_text;
    
    public function __construct( $author, $title, $text ) 
    {
        $this->_author = $author;
        $this->_title = $title;
        $this->_text = $text;
    }
    
    public function getAuthor()
    {
        return $this->_author;
    }
    
    public function getTitle()
    {
        return $this->_title;
    }
            
    public function getText()
    {
        return $this->_text;
    }
    
    public function toArray()
    {
        return array(
            "title" => $this->_title,
            "body" => "Erstellt von " . $this->_author . ": " . $this->_text
        );
    }
            
    public function  toJson()
    {
        return Json::encode( $this->toArray() );
    }
}
