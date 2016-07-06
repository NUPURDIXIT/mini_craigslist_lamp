<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $connect = mysql_connect("localhost", "lamp", "1") or
        die ("Hey!, check your server connection.");
        //create the main database if it doesn't already exist
        $create = mysql_query("CREATE DATABASE IF NOT EXISTS lamp_final_project")
        or die(mysql_error());
        //make sure our recently created database is the active one
        mysql_select_db("lamp_final_project");
        //create "login" table
        $login = "create table IF NOT EXISTS login(
                    user_ID int unsigned not null AUTO_INCREMENT PRIMARY KEY,
                    email varchar(100),
                    password varchar(60)
                    )";
        
        $results = mysql_query($login)
        or die (mysql_error());
    
        echo "lamp_final_project Database successfully created!";
        ?>
    </body>
</html>