<?php

/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/28/16
 * Time: 11:28 AM
 */
class ExpertInfoHelper
{
    /** @var ExpertInfoHelper */
    private static $instance;

    /** @var ExpertInfo[] */
    protected $_items;

    public static function getInstance()
    {
        if( static::$instance === null )
            static::$instance = new static();

        return static::$instance;
    }

    public function __construct()
    {
        $this->_items = array();
    }

    /*protected function __construct() {}
    protected function __clone() {}
    protected function __wakeup() {}*/

    /**
     * @return ExpertInfo[]
     */
    public function getRootItems()
    {
        $rootItems = array();
        foreach( $this->_items as $item )
        {
            if( $item->getParent() === null )
                $rootItems[] = $item;
        }
        return $rootItems;
    }

    public function find( $id )
    {
        foreach( $this->_items as $item )
        {
            if( $item->getId() == $id )
                return $item;
        }
        return false;
    }

    public function addItem( ExpertInfo $item )
    {
        $this->_items[] = $item;
    }

    public function buildFromArray( array $items )
    {
        foreach( $items as $item )
        {
            if( $item['Id'] == 30000000 )
                continue;

            $expertinfo = $this->find( $item['Id'] );
            if( $expertinfo === false )
            {
                $expertinfo = new ExpertInfo();
                $expertinfo->setId( $item['Id'] );
            }
            $expertinfo->setTitle( $item['Title'] )
                    ->setBody( $item['Body'] )
                    ->setImage( $item['Image'] );

            if( $item['ParentId'] != $item['Id'] )
            {
                $parent = $this->find( $item['ParentId'] );
                if( $parent === false )
                {
                    $parent = new ExpertInfo();
                    $parent->setId( $item['ParentId'] );
                }
                $expertinfo->setParent( $parent );
                $parent->addChild( $expertinfo );
            }
        }
        return $this->_items;
    }

    public function buildHTML( ExpertInfo $selected = null )
    {
        $html = "<ul>";
        foreach( $this->getRootItems() as $rootItem )
            $html .= $this->buildLI( $rootItem, $selected );

        $html .= "</ul>";
        return $html;
    }

    protected function buildLI( ExpertInfo $expertInfo, ExpertInfo $selected = null )
    {
        $classes = "";
        if( $selected instanceof ExpertInfo )
        {
            if( $selected->getId() == $expertInfo->getId() )
                $classes .= "jongin-selected ";

            if( $expertInfo->isParentOf( $selected ) )
                $classes .= "jongin-parent-selected ";
        }

        $page_url = get_permalink( get_the_ID() );

        $html = "<li class='$classes'><a href='$page_url{$expertInfo->getId()}'>{$expertInfo->getTitle()}</a>";
        if( $expertInfo->hasChildren() )
        {
            $html .= "<ul>";
            foreach( $expertInfo->getChildren() as $oChild )
                $html .= $this->buildLI( $oChild, $selected );
            $html .= "</ul>";
        }
        $html .= "</li>";
        return $html;
    }
}