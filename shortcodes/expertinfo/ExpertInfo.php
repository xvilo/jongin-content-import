<?php
class ExpertInfo
{
    /** @var  ExpertInfo|null */
    protected $_parent;
    /** @var ExpertInfo[] */
    protected $_children;

    protected $_id;
    protected $_title;
    protected $_body;
    protected $_image;


    public function __construct()
    {
        $this->_children = array();

        ExpertInfoHelper::getInstance()->addItem( $this );
    }

    /**
     * @return ExpertInfo|null
     */
    public function getParent()
    {
        return $this->_parent;
    }

    /**
     * @param ExpertInfo|null $parent
     */
    public function setParent($parent)
    {
        $this->_parent = $parent;
    }

    /**
     * @return ExpertInfo[]
     */
    public function getChildren()
    {
        return $this->_children;
    }

    /**
     * @param ExpertInfo[] $children
     */
    public function setChildren($children)
    {
        $this->_children = $children;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     * @return ExpertInfo
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     * @return ExpertInfo
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->_body;
    }

    /**
     * @param mixed $body
     * @return ExpertInfo
     */
    public function setBody($body)
    {
        $this->_body = $body;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param mixed $image
     * @return ExpertInfo
     */
    public function setImage($image)
    {
        $this->_image = $image;
        return $this;
    }

    public function hasChild( ExpertInfo $item )
    {
        foreach( $this->_children as $child )
        {
            if( $child->getId() == $item->getId() )
                return true;
        }
        return false;
    }

    public function hasChildren()
    {
        return count( $this->_children ) > 0;
    }

    public function addChild( ExpertInfo $child )
    {
        $this->_children[] = $child;
    }

    public function getLevel()
    {
        $currentLevel = 1;
        if( $this->getParent() instanceof  ExpertInfo )
            $currentLevel += $this->getParent()->getLevel();

        return $currentLevel;
    }

    public function isParentOf( ExpertInfo $expertInfo )
    {
        foreach( $this->getChildren() as $oChild )
        {
            if( $expertInfo->getId() == $oChild->getId() )
                return true;

            if( $oChild->isParentOf( $expertInfo ) )
                return true;
        }
        return false;
    }
}
?>