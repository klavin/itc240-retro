<?php //customer_list.php- shows a list of customers ?>

<?php include 'includes/config.php'; ?>

<?php include 'includes/header.php'; ?>

        <h1><?=$page_id?></h1>
<?php 

$sql = "select * from test_Customers";

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{
    
    
    while($row = mysqli_fetch_assoc($result))
    {

        echo '<p>';
            echo 'FirstName: ' . $row['FirstName'] . '</b> <br>';
            echo 'LastName: ' . $row['LastName'] . '</b> <br>';
            echo 'Email: ' . $row['Email'] . '</b> <br>';
        
        echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';
        
        echo '</p>';

    }
    
}else{
 echo '<p>There are currently no customers.</p>';   
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>


<?php include 'includes/footer.php'; ?>