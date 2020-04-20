<h1>Welecome to dashboard </h1><br>
<h2>
	<?php 
		switch (user_type()) {   
	      case 9:
	          echo 'unh admin';        
	          break;
	      case 1:
	          echo "client hr";
	          break;
	      case 2:
	         echo "superwiser";      
	          break;
	      case 3:
	          echo " employee";       
	          break;    
	      default:
	          echo "Sorry the script are not working,, you are not authorise user please enter valid username and password";
	    }
	?>
</h2>