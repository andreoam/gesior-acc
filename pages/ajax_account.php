<?php
if (!defined('INITIALIZED')) exit;

function f($e)
{
	echo '
	{"AjaxObjects":
	[{"DataType": "Attributes",
	  "Data": "style=background-image:url(account/nok.gif)",
	  "Target": "#accountname_indicator"},
	  {"DataType": "HTML",
	  "Data": "' . $e . '",
	  "Target": "#accountname_errormessage"},
	  {"DataType": "Attributes",
	  "Data": "class=red",
	  "Target": "#accountname_label"}]}';
}

if (isset($_POST['a_AccountName'])) {

	$s = isset($_POST['a_AccountName']) ? $_POST['a_AccountName'] : '';

	if ($s == '') {
		f('Please enter an account name!');
		die();
	} elseif (strlen($s) < 2) {
		f('This account name is too short!');
		die();
	} elseif (strlen($s) > 30) {
		f('This account name is too long!');
		die();
	}


	//$s = strtoupper($s);

	if($account->isLoaded())
			f('This account is already used. Please select another one!');
		else
			echo '
			{"AjaxObjects":
			[{
				"DataType": "Attributes",
				"Data": "style=background-image:url(account/ok.gif);",
				"Target": "#accountname_indicator"},
				{"DataType": "HTML",
				"Data": "",
				"Target": "#accountname_errormessage"},
				{"DataType": "Attributes",
				"Data": "class=",
				"Target": "#accountname_label"}
			]}';
	}
	exit;
}
