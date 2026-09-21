<?php
class Data 
{
    private $host = "Localhost" ;
    private $root = "root" ;
    private $password = "baba123" ;
    private $name_db = "MonResto1" ;

    public $conn ;

    public function get_connexion()
    {
        $this->conn = NULL ;

        try
        {
          $this->conn = new PDO( "mysql:host=" . $this->host . ";dbname=" . $this->name_db ,
                                 $this->root ,
                                 $this->password
                                );
          $this->conn->SetAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
          echo "error : " . $e->getMessage() ;
        }
        return $this->conn ;
    }

}
?>