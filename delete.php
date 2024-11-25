<?php
    include_once 'connection.php'; 

   
    if (isset($_GET['id']))
     {
        $id = $_GET['id'];

       
        $query = "DELETE FROM personal_info WHERE id = '$id'";
        $data = mysqli_query($conn, $query); 

        if (mysqli_query($conn, $query))
         {
           
          header("Location: displayinfo.php"); 

              echo"Record deleted";

            exit();

        } 
        else
        {
            echo "Failed to delete record: " . mysqli_error($conn);
        }
    } 
    else 
    {
        echo "Invalid ID provided for deletion.";
    }
?>
