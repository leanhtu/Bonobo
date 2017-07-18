<?php
namespace AppBundle\Entity;

class Login
{
	private $username;
	private $password;
	public function getUserName()
	{
		return $this->username;
	}
	public function setUserName($username)
	{
		$this->username = $username;
	}
	public function getUserPassword()
	{
		return $this->password;
	}
	public function setUserPassword($password)
	{
		$this->password = $password;
	}
}