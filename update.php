<?php
include_once 'connection.php';

// Check if ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];


        $updateQuery = "UPDATE personal_info SET fname = '$fname', lname = '$lname', gender = '$gender', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";
        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            echo "<script>alert('Records Updated successfully!!')</script>";

            // Update successful, redirect to the page where the table is displayed
            header("Location: displayinfo.php");

        } 
        else 
        {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Fetch the existing record from the database
    $fetchQuery = "SELECT * FROM personal_info WHERE id = $id";
    $data = mysqli_query($conn, $fetchQuery);
    $result = mysqli_fetch_assoc($data);
} else {
    echo "Invalid ID for updating.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_new.css">
    <title>Personal Information| www.ICSCbank.com</title>
    <style>
        
        /* CSS for styling the card container */
        .card {
            width: 50%;
            margin: 20px auto;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin top: 5px;
        }

        .card-header {
            background: #f2f2f2;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin bottom:  5px;
            
        }

        .card-body {
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif, sans-serif;
        }
        

        .right-section {      /* Style the right section containing search bar, select bar, login, and signup */
       display: flex;
        }
        .search-bar{
    width: 300px;
    height: 15px;
    background-color: white;
    border-radius: 30px;
    display: flex;
    align-items: center;
    padding: 20px;
    margin-right: 10px;
}
/* Style the search bar */
.search-bar input {
    padding: 5px;
    margin-right: 10px;
    border: none;
    border-radius: 3px;
}
/*icon color*/
.search-bar i{
    color: black;
}

/* Style the select bar */
.select-bar select {
    padding: 5px;
    margin-right: 10px;
    border: none;
    border-radius: 10px;
    margin-left: 10px;
}

/* Style the login and signup buttons */
.login button, .signup button, .logout button{
    padding: 10px 10px;
    font-size: 15px;
    background-color: #ff6600;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    margin-right: 10px;
}

/* Add some spacing */
.right-section > *:last-child {
    margin-right: 0;
}
.container-left{
  display: grid;
  left: 0;
  top: 10%;
  height: 80%;
  width: 15%;
}
* {                /*header styles*/
	padding: 0;
	margin: 0;
	text-decoration: none;
	outline: none;
	border: none;
	list-style: none;
	box-sizing: border-box;
}
.container-header , .container-left ,.container-body,.container-right , .container-footer{
  position: absolute;
  display: grid;
}
.container-header{
  display: grid;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 20%;
}
header{            /*header background styles*/
	float: left;
	width: 100%;
	height: 90px;
    display: flex;
    font-size: 25px;
    align-items: center;
    justify-content: space-between;
    background-color: #333;
    color: white;
    padding: 10px 20px;
}
.site-name{
    text-align: left;
    flex-grow: 1;
    padding-left: 10px;
}
.logo img{
    display: block;
    padding-top: 10px;
    padding-bottom: 10px;
    max-width: 100px; 
    height: auto;
}
form {
    display: grid;
    gap: 10px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 70%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.styled-button {/*update button styles*/
   
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 15px;
    background-color: #ff6600;
    width:100%
}

/* Style the search icon */
.fa-search {
    font-size: 16px;
    margin-right: 5px;
}
 </style>

   <title>Personal Information| www.ICSCbank.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo" height="75" width="75">
        </div>
        <div class="site-name">
            <h1>ICSC Bank</h1>
        </div>
        <div class="right-section">
            <div class="search-bar">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" placeholder="Search">
            </div>
            <div class="select-bar">
                <select>
                    <option value="option1">Account Type</option>
                    <option value="option2">Savings Account</option>
                    <option value="option3">Current Account</option>
                    <option value="option4">Joint Account</option>
                    <option value="option5">Fixed Deposit</option>
                </select>
            </div>
            <div class="login">
                <button>Login</button>
            </div>
            <div class="signup">
                <button>Sign Up</button>
            </div>
            <div class="logout">
                <button>Logout</button>
            </div>
        </div>
    </header>

    <div class="card">
        <div class="card-header">
            <h2>Update Personal Information</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                
                <label for="fname">First Name:</label>
                <input type="text" name="fname" value="<?php echo $result['fname']; ?>" required><br><br>

                <label for="lname">Last Name:</label>
                <input type="text" name="lname" value="<?php echo $result['lname']; ?>" required><br><br>

                <label for="gender">Gender:</label>
                <input type="text" name="gender" value="<?php echo $result['gender']; ?>" required><br><br>

                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $result['email']; ?>"><br><br>

                <label for="phone">Phone No:</label>
                <input type="text" name="phone" value="<?php echo $result['phone']; ?>" required><br><br>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $result['address']; ?>"><br><br>

           
                <input type="submit" name="submit" value="Update" button class='styled-button'>
                
            </form>
        </div>
    </div>
</body>
</html>
