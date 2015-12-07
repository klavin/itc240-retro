<?php //customer_view.php- shows details of a single customer ?>

<?php include 'includes/config.php'; ?>

<?php

//process querystring here

if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];

}else{

    header('Location:customer_list.php');
    
}

$sql = "select * from test_Customers where CustomerID = $id";

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$result = mysqli_query($iConn,$sql);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

die;


if(mysqli_num_rows($result) > 0)
{
    
    
    while($row = mysqli_fetch_assoc($result))
    {
        
        $FirstName = stripslashes($row['FirstName']);
        $LastName = stripslashes($row['LastName']);
        $Email = stripslashes($row['Email']);
        $title = "Title Page For " . $FirstName;
        $pageID = $FirstName;
        $Feedback = '';//no feedback necessary
    }
    
}else{
 $Feedback = '<p>This customer does not exist.</p>';   
}


?>

<?php include 'includes/header.php'; ?>

<h1><?=$FirstName?></h1>

<?php
    
if($Feedback == '')
{//data exists, show it 

        echo '<p>';
        echo 'FirstName: ' . $FirstName . '</b> <br>';
        echo 'LastName: ' . $LastName . '</b> <br>';
        echo 'Email: ' . $Email . '</b> <br>';
        
    echo '</p>';

}else{//warn user no data

    echo $Feedback;

}    
    
    echo '<p>';
        echo 'FirstName: ' . $FirstName . '</b> <br>';
        echo 'LastName: ' . $LastName . '</b> <br>';
        echo 'Email: ' . $Email . '</b> <br>';
        
    echo '</p>';

    echo '<p><a href="customer_list.php">Go Back</a></p>';
    
    
//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>


<?php include 'includes/footer.php'; ?>