<?php 
require_once('../appcore.php');


?>
<h1>Account</h1>
<a type="button" href="#/account" class="btn btn-xs btn-default">Zum Profil</a>

<?php 
$id = $_SESSION['authenticated_userid'];
$data = $appcore->GetUser($id);
?>

<div class="row">
	 <form id="loginform" class="form-horizontal" role="form" action="index.php#/account" method="post">
	<input type="hidden" name="editaccount" value="true">
	<div class="col-sm-4">
      	<p>User ID:  </p>
	<p>Vorname: </p>
	<p>Nachname:</p>
	<p>E-Mail: </p>
	<p>Letzter Login: </p>
	<p>Letzter Ping: </p>
	</div>
	<div class="col-sm-4">
      	<p><?php echo $data['id']; ?></p>
	<p><input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo $data['firstname']; ?>"></p>
	<p><input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo $data['lastname']; ?>"></p>
	<p><input id="email" type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>"></p>
	<p><?php echo date('d-m-Y H:i:s',$data['lastlogin']); ?></p>
	<p><?php echo date('d-m-Y H:i:s',$data['lastping']); ?></p>
	<p><button id="btn-signup" type="button" name="save"  onclick="$(this).closest('form').submit()" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Profiländerungen speichern</button></p>
	</div>
	</form>
	
</div>

<div ng-show="edit">
	
</div>