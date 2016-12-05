<?php 
require_once('../appcore.php');


?>
<h1>Account</h1>
<a class="btn btn-xs btn-default" type="button" href="#/editaccount">Profil bearbeiten</a>
<?php 
$id = $_SESSION['authenticated_userid'];
$data = $appcore->GetUser($id);



?>

<div class="row">
	
	<div class="col-sm-4">
      	<p>User ID:  </p>
	<p>Vorname: </p>
	<p>Nachname:</p>
	<p>E-Mail: </p>
	<p>Telefon: </p>
	<p>Strasse: </p>
	<p>Wohnort:</p>
	<p>Registriert seit: </p>
	<p>Letzter Login: </p>
	<p>Letzter Ping: </p>
	</div>
	<div class="col-sm-4">
      	<p><?php echo $data['id']; ?></p>
	<p><?php echo $data['firstname']; ?></p>
	<p><?php echo $data['lastname']; ?></p>
	<p><?php echo $data['email']; ?></p>
	<p><?php echo $data['phonenumber']; ?></p>
	<p><?php echo $data['street'].' '.$data['streetnumber']; ?></p>
	<p><?php echo $data['zipcode'].' '.$data['city']; ?></p>
	<p><?php echo date('d-m-Y H:i:s',$data['registrationdate']); ?></p>
	<p><?php echo date('d-m-Y H:i:s',$data['lastlogin']); ?></p>
	<p><?php echo date('d-m-Y H:i:s',$data['lastping']); ?></p>
	</div>
	
</div>

<div ng-show="edit">
	
</div>