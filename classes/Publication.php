<?php


class Publication
{
    protected $id;
    protected $headline;
    protected $introductoryText;
    protected $allText;
    protected $type;

    public function __construct($id, $headline, $introductoryText, $allText, $type)
    {
        $this->id = $id;
        $this->headline = $headline;
        $this->introductoryText = $introductoryText;
        $this->allText = $allText;
        $this->type = $type;
    }

    public static function create($id)
    {
        $db = new DatabaseConnect();

        $sql = 'select * from publications where id=:id';

        $query = $db->connection->prepare($sql);

        $query->bindValue(':id', $id);

        $query->execute();

        $data = $query->fetchObject();

        if ($data->type == 'news') {
            return new News(
                $data->id,
                $data->headline,
                $data->introductoryText,
                $data->allText,
                $data->type
            );
        }elseif ($data->type == 'article') {
            return new Article(
                $data->id,
                $data->headline,
                $data->introductoryText,
                $data->allText,
                $data->type
            );
        } else {
            echo 'error to create ';
        }
    }

    public function getInfo()
    {
        return '<div class="jumbotron"> <h1 class="display-4">' . $this->headline . '</h1> <p class="lead">' . $this->introductoryText . '</p>  ' . $this->type . ' </div>' ;
    }

    public function getAllText()
    {
        return $this->allText;
    }

    public function getId()
    {
        return $this->id;
    }



}