<?php 

include("database.php");

class SliderDatabase 
{

    private $database;
    private $dbb;

    private $image1;
    private $image2;
    private $image3;

    function __construct()
    {
        $this->database = new Database();
        $this->dbb = new PDO($this->database::$databaseLaptop, '', '');
    }

    public function getImageOne()
    {

        $req = $this->dbb->prepare("SELECT * FROM activite WHERE id = 1");
        $req->execute();

        $this->image1 = $req->fetch();
        return $this->image1["image"];
    }

    public function getImageTwo()
    {        

        $req = $this->dbb->prepare("SELECT * FROM activite WHERE id = 2");
        $req->execute();

        $this->image2 = $req->fetch();
        return $this->image2["image"];
    }

    public function getImageThree()
    {


        $req = $this->dbb->prepare("SELECT * FROM activite WHERE id = 3");
        $req->execute();

        $this->image3 = $req->fetch();
        return $this->image3["image"];
    }

}

?>