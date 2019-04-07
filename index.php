<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:azuredavid.database.windows.net,1433; Database = latihanazure", "ignzdave", "464884b75A");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

try {
    //$tableName = 'User';
    
    $query = "SELECT * FROM [dbo].[User]";
    $stmt = $conn->query($query);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result->rowCount() > 0) {
        print_r($result);
    }else{
        print_r("No Records");
    }
    
    
    unset($stmt);
    unset($conn);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
