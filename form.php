<?php include 'includes/config.php'; ?>

<?php include 'includes/header.php'; ?>

<script type="text/javascript">
		//place local js code here
		
		function init()
		{//init places focus on the first form element
			document.myForm.Name.focus();
		}
		
		//here we make sure the user has entered valid data	
		function checkForm(thisForm)
		{//check form data for valid info
			if(empty(thisForm.Name,"Please Enter Your Name")){return false;}
			if(!isEmail(thisForm.Email,"Please enter a valid Email Address")){return false;}
			return true;//if all is passed, submit!
		}
		
		addOnload(init); //with addOnload() we can add as many functions as we wish to window.onload (one by one)!
</script>


        <h1>Comment Form</h1>
		<?php
            if(isset($_POST['Submit']))
{//if data, process it
    /*
    echo '<pre>';
        var_dump($_POST);
    echo '</pre>';
    */
    
    $to = "klavin01@seattlecentral.edu";
    $message = process_post();
    $subject = 'Contact Form from Retro Site'; 
        
    safeemail($to, $subject, $message);    
    
}else{//no data, show form
    echo '
    <form method="post" action="">
    
    Name: <input type="text" name="Name" required="required"/> <br>
    
    Email: <input type="email" name="Email" required="required"/> <br>
    
    What are your favorite foods?<br>
        <input type="checkbox" name="fave_food" value="Burgers" /> Hamburgers <br />
        <input type="checkbox" name="fave_food" value="Waffles" /> Waffles <br />
        <input type="checkbox" name="fave_food" value="French Fries" /> French Fries <br />
        <input type="checkbox" name="fave_food" value="Gross Stuff" /> Foie Gras <br />
    
    Would you like to receive our monthly newsletter?<br>
        <input type="radio" name="newsletter" value="Yes" /> Yes <br />
        <input type="radio" name="newsletter" value="No" /> No <br />
    
    Comments: <textarea name="Comments"></textarea> <br>
    
    <input type="submit" value="Send" name="Submit"/>
    
    </form>
    ';
}

        ?>
<?php include 'includes/footer.php'; ?>