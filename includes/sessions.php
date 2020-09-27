<?php
session_start();

function Message () {
	if ( isset($_SESSION['errorMessage'])) {
		$ouput = "
			<div class='bdl2_message'>" .
			htmlentities($_SESSION["errorMessage"]) .
			"</div>
		";
		$_SESSION['errorMessage'] = null;
		return $ouput;
	}
}

function SuccessMessage () {
	if ( isset($_SESSION['successMessage'])) {
		$ouput = "
			<div class='bdl2_message'>" .
			htmlentities($_SESSION["successMessage"]) .
			"</div>
		";
		$_SESSION['successMessage'] = null;
		return $ouput;
	}
}

function PostSuccess () {
	if ( isset($_SESSION['postSuccess'])) {
		$ouput = "
			<div class='bdl2_message'>" .
			htmlentities($_SESSION["postSuccess"]) .
			"</div>
		";
		$_SESSION['postSuccess'] = null;
		return $ouput;
	}
}

function CatSuccess () {
	if ( isset($_SESSION['catSuccess'])) {
		$ouput = "
			<div class='bdl2_message'>" .
			htmlentities($_SESSION["catSuccess"]) .
			"</div>
		";
		$_SESSION['catSuccess'] = null;
		return $ouput;
	}
}

function ErrorMessage() {
	if ( isset($_SESSION['errorMessage'])) {
		$ouput = "
			<div class='bdl2_message'>" .
			htmlentities($_SESSION["errorMessage"]) .
			"</div>
		";
		$_SESSION['errorMessage'] = null;
		return $ouput;
	}
}

function deleteCategory () {
	if( isset($_SESSION['optDeleteCategory'])) {
		$opt = "
			<div style='text-align:center;'>
				<span class='lead'>Are You Sure You Want $_SESSION[categoryName]?</span>
				<div class='alert alert-info'>
				<a href='Categories.php?CategoryID=$_SESSION[del_id]'><button class='btn btn-danger btn-lg'>Yes</button></a> | <a href='Categories.php'><button class='btn btn-primary btn-lg'>No</button></a>
				</div>
			</div>
		";
		$_SESSION['optDeleteCategory'] = null;
		$_SESSION['del_id'] = null;
		$_SESSION['optDeleteCategory'] = null;
		$_SESSION['categoryName'] = null;
		return $opt;

	}
}

function ConfirmLogin () {
	$login = false;
	if ( isset($_SESSION['user_id'])) {
		$login = true;
	}

	if ($login === false) {
		$_SESSION['errorMessage'] = 'Login Required';
		Redirect_To('
		index.php');
	}
}

?>