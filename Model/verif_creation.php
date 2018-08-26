<?php
			if(isset($_SESSION['mail'])) {
				echo "index.php?action=Article_creation"; 
			}
			else {
				echo "index.php?action=Connexion";
			} 
			?> 