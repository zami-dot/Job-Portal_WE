<?php

session_start();

require_once("../db.php");

//If user clicked Edit Post button
if(isset($_POST)) {

	$stmt = $conn->prepare("UPDATE job_post SET jobtitle=?, description=?, minimumsalary=?, maximumsalary=?, experience=?, qualification=? WHERE id_jobpost=? AND id_company=?");

	$stmt->bind_param("ssssssii", $jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $qualification, $_POST['target_id'], $_SESSION['id_user']);

	$jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$minimumsalary = mysqli_real_escape_string($conn, $_POST['minimumsalary']);
	$maximumsalary = mysqli_real_escape_string($conn, $_POST['maximumsalary']);
	$experience = mysqli_real_escape_string($conn, $_POST['experience']);
	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

	if($stmt->execute()) {
		//If data Updated successfully then redirect to dashboard
		$_SESSION['jobPostUpdateSuccess'] = true;
		header("Location: dashboard.php");
		exit();
	} else {
		//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
		echo "Error " . $sql . "<br>" . $conn->error;
	}

	$stmt->close();

	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click Edit Post button
	header("Location: dashboard.php");
	exit();
}