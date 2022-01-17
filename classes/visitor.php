<?php
if (!defined('INITIALIZED'))
	exit;

use RobThree\Auth\TwoFactorAuth;

class Visitor
{
	const LOGINSTATE_NOT_TRIED = 1;
	const LOGINSTATE_NO_ACCOUNT = 2;
	const LOGINSTATE_WRONG_PASSWORD = 3;
	const LOGINSTATE_LOGGED = 4;

	private static $loginAccount;
	private static $loginPassword;
	/** @var Account */
	private static $account;
	private static $loginState = self::LOGINSTATE_NOT_TRIED;

	public static function setPassword($value)
	{
		$_SESSION['password'] = $value;
	}

	public static function getLoginState()
	{
		return self::$loginState;
	}

	public static function isLogged()
	{
		return self::isTryingToLogin() && self::getAccount()->isLoaded();
	}

	public static function isTryingToLogin()
	{
		return !empty(self::$loginAccount);
	}

	public static function getAccount()
	{
		if (!isset(self::$account)) {
			self::loadAccount();
		}
		return self::$account;
	}

	public static function setAccount($value)
	{
		$_SESSION['account'] = $value;
	}


	public static function loadAccount()
	{
		if (self::$loginState != self::LOGINSTATE_LOGGED) {
			self::$account = new Account();
		}

		// empty
		if (empty(self::$loginAccount)) {
			self::$loginState = self::LOGINSTATE_NOT_TRIED;
			self::$account = new Account();
			return;
		}

		self::$account->loadByName(self::$loginAccount);
		if (!self::$account->isLoaded()) {
			self::$loginState = self::LOGINSTATE_NO_ACCOUNT;
			self::$account = new Account();
			return;
		}

		if (!self::$account->isValidPassword(self::$loginPassword)) {
			self::$loginState = self::LOGINSTATE_WRONG_PASSWORD;
			self::$account = new Account();
			return;
		}


		self::$loginState = self::LOGINSTATE_LOGGED;
		$_SESSION['logado'] = true;

		if (self::$loginState !== self::LOGINSTATE_LOGGED) {
			self::$account = new Account();
		}
	}

	public static function getAuthenticStatus()
	{
		return self::$authenticStatus;
	}

	public static function login()
	{
		if (isset($_SESSION['account']))
			self::$loginAccount = $_SESSION['account'];
		if (isset($_SESSION['password']))
			self::$loginPassword = $_SESSION['password'];
	}

	public static function logout()
	{
		unset($_SESSION['account']);
		unset($_SESSION['password']);
		unset($_SESSION['logado']);
		self::$loginAccount = NULL;
		self::$loginPassword = NULL;
		self::$account = new Account();
		self::$loginState = self::LOGINSTATE_NOT_TRIED;
	}

	public static function getIP()
	{
		return ip2long($_SERVER['REMOTE_ADDR']);
	}
}
