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
            $connect = mysqli_connect($localhost, $user, $password);

            mysqli_select_db($connect, $dbname);
        } catch (mysqli_sql_exception $error) {
            echo "database hasn't been conntected, error:" . $error->getMessage();
        }

        return $connect;
    }
}
