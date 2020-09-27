<?php
require_once ('config.php');

/**
 * insert, update, delete -> su dung function
 */
function execute($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	//query
	$ret = mysqli_query($conn, $sql);

	//dong connection
    mysqli_close($conn);
	if(!$ret)
	return 0;
	return 1;
}

/**
 * su dung cho lenh select => tra ve ket qua
 */
function executeResult($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	//query
	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	//dong connection
	mysqli_close($conn);

	return $list;
}