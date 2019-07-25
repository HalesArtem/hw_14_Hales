<?php


class Article extends Publication
{
    protected $type;

    public function __construct($id, $headline, $introductoryText, $allText, $type)
    {
        parent::__construct($id, $headline, $introductoryText, $allText, $type);
    }

    public function getInfo()
    {
        return parent::getInfo();
    }

    public function getId()
    {
        return parent::getId();
    }

    public function getAllText()
    {
        return parent::getAllText();
    }

}
