<?php //customer_list.php- shows a list of customers 

require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 
 
# SQL statement
$sql = "select * from test_Customers";

#Fills <title> tag  
$title = 'Customer List/View/Pager';

# END CONFIG AREA ---------------------------------------------------------- 


include 'includes/header.php'; ?>

        <h1><?=$page_id?></h1>
<?php 
    
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';

$sql = "select * from test_Customers";

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

# Create instance of new 'pager' class
$myPager = new Pager(5,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));


if(mysqli_num_rows($result) > 0)
{
    #records exist - process
	if($myPager->showTotal()==1){$itemz = "customer";}else{$itemz = "customers";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
    
    while($row = mysqli_fetch_assoc($result))
    {# process each row
         echo '<p align="center">
            <a href="' . VIRTUAL_PATH . 'customer_view.php?id=' . (int)$row['CustomerID'] . '">' . dbOut($row['FirstName']) . '</a>
            </p>';
    }
     echo $myPager->showNAV('<p align="center">','</p>');//show pager if enough records 
    
}else{
 echo '<p>There are currently no customers.</p>';   
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>


<?php include 'includes/footer.php'; ?>