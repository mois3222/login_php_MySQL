<?php
class Cconnection
{
    public static function connectionBD()
    {
        $localhost = "localhost";
        $dbname = "loginphp";
        $user = "root";
        $password = "123456";

        try {
            $connection = new PDO("mysql:host=$localhost; dbname=$dbname;user=$user; password=$password");
            echo "Connneted....";
            $statement = $connection->prepare("SELECT * FROM login_table");
            $statement->execute();
            $records = $statement->fetchAll(PDO::FETCH_ASSOC);
            print_r($records);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
