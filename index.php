<?php 
	session_start(); 
?>
<!DOCTYPE >
<html lang='en'>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
		<link rel="stylesheet" href="css/mainStyle.css" type="text/css"/>
		<link rel="stylesheet" href="css/indexStyle.css" type="text/css"/>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<title>
									Web Scraper Demo
		</title>	
	</head>
	<body>
		<div class='container'>
			
			<!-- Header -->
			<h1><a href="index.php">Item Scraper</a></h1>
			<p><i>All data is pulled from lol-patch.com</i></p>
			
			<div class="navbar">
          		<div class="navbar-inner">
            		<div class="container">
              			<ul class="nav">
		                   <!-- <li class="active"><a href="index.php" id='homeTitle'>Home</a></li> --><!--ONE PAGE, add when there are more -->           
             			</ul>
           			</div>
          		</div>
        	</div>
       </div>
     </body>
     <!-- Start PHP Output -->
     <?php
     	$champAndItemCount = 0; 
     	
     	$tag='(<[^>]+>)';	# Tag 
		$word='((?:[a-z][a-z]+))';	# Word 
		$ws='(\\s+)';	# White Space 
		$anyChar='(.)';	# Any Single Character 
		$number='([+-]?\\d*\\.\\d+)(?![-+0-9\\.])';	# Float
		$result = '([\\s\\S]*)'; 
		
		$lolPatchUrl = 'http://lol-patch.com';
		$lolPatchOutput = file_get_contents($lolPatchUrl); 
		//echo file_get_contents($lolPatchUrl); //debugging
				
		$allDivsPattern = "/<div class='one_fourth type_item'>([\\s\\S]*)/"; 
		
		if (preg_match_all ($allDivsPattern, $lolPatchOutput, $dataMatches)){
			$champAndItemDivs = $dataMatches[1][0]; 
			//echo $value; //debugging
		}
		else 
			echo "404?"; //debugging
		
		$divArray = explode("</div>", $champAndItemDivs);
		
		foreach($divArray as $div) {
			//$namePattern = "/<option value=\"(\\d+)\">([\\s\\S]*):([\\s\\S]*)/"; 
			
			//$classPattern =  "//";
			
			/*if (preg_match_all ($classPattern, $div, $classMatches)){
				$class = $classMAtches[1][0]; 
				echo $class; 
			}
			else {*/ 
				$champAndItemCount++; 
				echo "#$champAndItemCount: $div<br />"; 
			//} 
		}
		
		
	
	?>
	<!-- Template -->
	<!-- <div class="one_fourth type_item">
	        <a href="abyssal-scepter.html">
	          <img class="image_border" src="http://cdn1.mobafire.com/images/item/abyssal-scepter.gif">
	        </a>
	        <p>
	          <a href="abyssal-scepter.html">Abyssal Scepter</a>
	        </p>
	</div> -->
	  
</html>
