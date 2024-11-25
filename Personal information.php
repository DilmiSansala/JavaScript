<?php
    include_once 'connection.php'; // Include the database connection file
?>
<?php
    if(isset($_POST['save']))
    {
       $first_name  = $_POST['fname'];
       $last_name   = $_POST['lname'];
       $gender      = $_POST['gender'];
       $email       = $_POST['email'];
       $phone       = $_POST['phone'];
       $address     = $_POST['address'];

       $query = "INSERT INTO personal_info (fname,lname,gender,email,phone,address) values('$first_name','$last_name','$gender','$email','$phone','$address')";
       $data = mysqli_query($conn,$query); 

       if($data)
       {
        echo "<script>alert'Data recorded successfully!!'</script>";
       }
       else{
        echo "Failed" ;
       }
    }
?>