<?php
//daily.php
?>
<?php include 'includes/config.php';?>
<?php
//a3-1.php

/*
we need to get the day of the week from the date() function.

we need a different image, color, text and alt tag for each unique item



*/

if(isset($_GET['myDay']))
{
    $myDay = $_GET['myDay'];
}else{
    $myDay = date('l');
}






switch($myDay)
{
    case 'Monday':
        $myPic = 'pumpkin-spice-latte.jpg';
        break;

    case 'Wednesday':
        $myPic = 'peppermint-mocha.jpg';
        break;
        
    case 'Friday':
        $myPic = 'eggnog-latte.jpg';
        break;
        
    default:
        $myPic = 'broken.jpg';
        break;

        
}

?>

<?php include 'includes/header.php';?>
<h1><?=$page_id?></h1>
<img src="images/<?=$myPic?>" alt="Our Pumpkin Spice Latte tastes great on a Fall Day!" id="coffee" />
            <strong class="feature"><?=$myDay?>'s Coffee Special:</strong> Monday's daily coffee special is <strong class="feature">Pumpkin Spice Latte</strong>, which makes us wish it was always Fall, as this is one of our top sellers!</p>

<p><a href="daily.php?myDay=Sunday">Sunday</a></p>
<p><a href="daily.php?myDay=Monday">Monday</a></p>
<p><a href="daily.php?myDay=Wednesday">Wednesday</a></p>
<p><a href="daily.php?myDay=Friday">Friday</a></p>

<?php include 'includes/footer.php';?>