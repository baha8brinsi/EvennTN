<?php
 	//include_once '../Controller/reponsecc.php';
	 
	  
	class reponsec { 
		public function afficherreponse(){
			
			$sql="SELECT * FROM reponse";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreponse($id){
			include_once "../config.php";
			$sql="DELETE FROM reponse WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		public function ajouterreponse($reponse){
			
			$sql="INSERT INTO reponse (id, date, objet, description) 
			VALUES (:id,:date,:objet, :description )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $reponse->getid(),
					'date' => $reponse->getdate(),
					'objet' => $reponse->getobjet(),
					'description' => $reponse->getdescription()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}/*
		public function ajouterreclamation($reclamation){
			$pdo=config::getConnexion();
			try {
				$query=$pdo->prepare(
					"INSERT INTO reclamation (id,date,objet,description )
					 VALUES (:id,:date,:objet,:description );"
				);
			
				$query->execute([
					'id'=>$reclamation->get_id(),
					'date'=>$reclamation->get_date(),
					'objet'=>$reclamation->get_objet(),
					'description'=>$reclamation->get_description()
					 
				]);
			}
			catch(PODException $e) {
				$e->getMessage();
			}
		}
*/


	/*
		function recupererreclamation($reclamation){
			$sql="SELECT * from reclamation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}*/   /*
		function modifierreclamation($reclamation, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						id= :id, 
						"date"= :"date", 
						objet= :objet, 
						"description"= :"description"
					WHERE id= :id'
				);
				$query->execute([
					'id' => $reclamation->getid(),
					'date' => $reclamation->getdate(),
					'objet' => $reclamation->getobjet(),
					"description" => $reclamation->getdescription()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}*/

	}
?>