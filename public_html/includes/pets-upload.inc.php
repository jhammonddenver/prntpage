<?php 
session_start();
include_once 'db_connect.php';

  $id = $_SESSION['id'];
        $lid = $_SESSION['lid'];

if (isset($_POST['submit'])){
      
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png');
		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0){
				if ($fileSize < 2000000){
				$fileNameNew = "pets-main-".$lid."-".$fileName;
				$fileDestination = '../pets/photos/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$photo = 0;
				$sql = "UPDATE pets SET main_pic='$fileNameNew' WHERE id='$lid';";
				$result = mysqli_query($conn, $sql);
				header("Location: ../add-pets-finish.php?uploadsuccessful");
				} else {
				echo "File is too big!";
				}
			} else { 
			echo "There was an error uploading the file!";}
} else {
	
	echo "File type not allowed!";
	 header("Location: ../add-pets.php?=file-not-allowed");
          exit();
}
}
?>
