<?php


class News extends Publication
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

    public function getAllText()
    {
        return parent::getAllText();
    }

}