<?php


class AppUser {
	public $id;
	public $firstname;
	public $lastname;
	public $password;
	public $email;
	public $street;
	public $streetnumber;
	public $zipcode;
	public $city;
	public $phonenumber;
	public $birthdate;
}

function CreateUserFromArray($array) {
	$user = new AppUser();
	$user->id = $array['id'];
	$user->firstname = $array['firstname'];
	$user->lastname = $array['lastname'];
	$user->password = $array['password'];
	$user->email = $array['email'];
	$user->street = $array['street'];
	$user->streetnumber = $array['streetnumber'];
	$user->zipcode = $array['zipcode'];
	$user->city = $array['city'];
	$user->phonenumber = $array['phonenumber'];
	$user->birthdate =$array['birthdate'];
	return $user;
}
?>