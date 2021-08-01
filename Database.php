<?php
class Database
{
    private $connection;
    private $hostname;
    private $username;
    private $password;
    private $dbname;


    public function __construct($hostname,$username,$password,$dbname)
    {
        $this->hostname = $hostname;
        $this->username=$username;
        $this->dbname=$dbname;
        $this->password=$password;
        $this->connect();
    }

    public function connect(){
        $this->connection=mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
        if (mysqli_connect_error())
        {
            die('Database connetion failed '.mysqli_connect_error().' '.mysqli_connect_errno());
        }
        echo 'success';
    }
    /************************** TABLE CARD *****************************/
    public function getAllCardsOfList()
    {
        $count=$this->getCountLists();
        $list=$this->getLists();
        for ($i=1;$i<=$count;$i++)
        {
            $query = "SELECT * FROM `card` WHERE `list_id`='$i' ORDER BY `list_id`";
        if ($result=mysqli_query($this->connection,$query)) 
            while ($row = $result->fetch_assoc()) 
            {
                $tabs['title'][]=$list[$i-1];
                $tabs['card'][]=$row;            
        
            }    
        }
        
        return $tabs;
    }

    public function createCard($description,$list_id)
    {
        $query = "INSERT INTO `card` (card_id, description, list_id) VALUES ('', '$description', '$list_id')";
        $res = mysqli_query($this->connection, $query);
        if (!$res)
            return false;
        return true;
    }


    public function update($id,$description){
        $query = "UPDATE `card` SET description='$description' WHERE id=$id";
        $res = mysqli_query($this->connection, $query);
            if (!$res)
                return false;
            return true;
        }

    public function DeleteCard($id){
        $query = "DELETE FROM `card` WHERE id='$id'";
        $res = mysqli_query($this->connection, $query);
        if (!$res)
            return false;
        return true;
    }
    /************************** TABLE LIST *****************************/
    public function getCountLists()
    {
        $query = "SELECT * FROM `list`";
        if ($result=mysqli_query($this->connection,$query)) 
             return $result -> num_rows;
        
    }


    public function getLists()
    {       
            $query = "SELECT * FROM `list`";
            if ($result=mysqli_query($this->connection,$query)) 
                while ($rows = $result->fetch_assoc()){
                    $tabs[]=$rows;
                }           
        return $tabs;
    }

    

    public function createList($title)
    {
        $query = "INSERT INTO `list` (card_id, title) VALUES ('', '$title)";
        $res = mysqli_query($this->connection, $query);
        if (!$res)
            return false;
        return true;
    }


    public function updateList($id,$title){
        $query = "UPDATE `list` SET title='$title' WHERE id=$id";
        $res = mysqli_query($this->connection, $query);
            if (!$res)
                return false;
            return true;
        }

    public function DeleteList($id){
        $query = "DELETE FROM `list` WHERE id='$id'";
        $res = mysqli_query($this->connection, $query);
        if (!$res)
            return false;
        return true;
    }
}

