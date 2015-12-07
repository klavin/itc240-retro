<?php //customers.php- shows a list of customers ?>

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
            echo 'FirstName: <br>' . $row['FirstName'] . '</b> ';
            echo 'LastName: <br>' . $row['LastName'] . '</b> ';
            echo 'Email: <br>' . $row['Email'] . '</b> ';
        echo '</p>';

    }
    
}else{
 echo '<p>There are currently no customers.</p>';   
}


?>


<?php include 'includes/footer.php'; ?>