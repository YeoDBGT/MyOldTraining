<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$user = getNewUser();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$user = readUser($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
	
	


?>

<html>
<header>
	<link rel="stylesheet" href="style.css">
</header>
<body>

		
	<form action="createUpdate.php" method="get">
	<p>	
		<a href="index.php">Liste des utilisateurs</a>

		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<input type="hidden" name="action" value="<?php echo $action;  ?>"/>
		 
	    <div>
	        <label for="name">Nom</label>
	        <input type="text" id="name" name="name" value="<?php echo $user['name'];  ?>" placeholder="Enter your name">
	    </div>
	    <div>
	        <label for="firstname">Prénom</label>
	        <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname'];  ?>" placeholder="Enter your firstname">
	    </div>
	    <div>
	        <label for="emailadress">Mail :</label>
	        <input type="email" id="emailadress" name="emailadress" alt="Enter your email" placeholder="Enter your mail"/>
	    </div>
		<div>
	        <label for="description">Description :</label>
	        <textarea id="description" name="description" placeholder="Enter a description"></textarea>
	    </div>
		<div>
			<label for="file"> Fichier </label>
			<input type="hidden" name="200000" value="250000" />
         	<input type="file" name="file" size=50 />
		</div>
		<div class="button">
			<button type="submit"><?php echo $libelle;  ?></button>
		</div>
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="createUpdate.php" method="get">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>
	</form>
	<?php } ?>

</body>
</html>


include 'mesFunctionsSQL.php';
		include 'mesFunctionsTable.php';

		$headers = getHeaderTable();
		$users = getAllUsers();
		afficherTableau($users, $headers);
		?>
		<a href=formulaireUtilisateur.php?id=0 >Envoyer</a> </div>