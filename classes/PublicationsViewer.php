<?php


class PublicationsViewer
{
    protected $publications;
    public $publicationsType;

    public function __construct($publicationsType)
    {
        $this->publicationsType = $publicationsType;
        $this->publications = $publications = [];

        $db = new DatabaseConnect();

        $sql = 'select * from publications where type=:type';

        $query = $db->connection->prepare($sql);

        $query->bindValue(':type', $publicationsType);

        $query->execute();

        $arrayViewer = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($arrayViewer as $key => $values){
            if ($values['type'] == 'news'){
                $this->publications[] = new News(
                    $values['id'],
                    $values['headline'],
                    $values['introductoryText'],
                    $values['allText'],
                    $values['type']
                );
            }elseif ($values['type'] == 'article'){
                $this->publications[] = new Article(
                    $values['id'],
                    $values['headline'],
                    $values['introductoryText'],
                    $values['allText'],
                    $values['type']
                );
            }
        }
        return $this->publications;
    }

    public function write()
    {
        $strings = [];

        foreach ($this->publications as $value) {
            $strings[] = $value->getInfo() . '   ' . '<a href="allText.php?id=' . $value->getId() . '" class="btn btn-primary btn-lg">Посмотреть подробнее</a>';
        }
        return $strings;
    }
}


