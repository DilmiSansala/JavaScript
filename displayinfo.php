<?php
include_once 'connection.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Personal Information| www.ICSCbank.com</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            /* display: flex; */
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }

        .content {
            text-align: center;
        }
        .styled-button {
            background-color: #007BFF; /* Background color */
            color: #fff; /* Text color */
            border: none; /* Remove button border */
            padding: 8px 16px; /* Padding inside the button */
            cursor: pointer; /* Add pointer cursor on hover */
            border-radius: 4px; /* Add rounded corners */
            transition: background-color 0.3s ease; /* Smooth background color transition */
        }

        .styled-button:hover {
            background-color: #0056b3; /* Change background color on hover */
        }
        .delete-button {
            background-color: #FF0000; /* Background color for deletion */
            color: #fff; /* Text color */
            border: none; /* Remove button border */
            padding: 8px 16px; /* Padding inside the button */
            cursor: pointer; /* Add pointer cursor on hover */
            border-radius: 4px; /* Add rounded corners */
            transition: background-color 0.3s ease; /* Smooth background color transition */
        }

        .delete-button:hover {
            background-color: #CC0000; /* Change background color on hover */
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

    </style>
    <title>Personal Information | www.ICSCbank.com</title>
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

    <div class="content">
        <?php
        $query = "SELECT * FROM personal_info";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);

        if ($total != 0) {
        ?>

        <h2 align="center">Personal Information</h2>
        <br/><br/>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
            <?php
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr> 
                    <td>" . $result['id'] . "</td>
                    <td>" . $result['fname'] . "</td>
                    <td>" . $result['lname'] . "</td>
                    <td>" . $result['gender'] . "</td>
                    <td>" . $result['email'] . "</td>
                    <td>" . $result['phone'] . "</td>
                    <td>" . $result['address'] . "</td>
                    <td>
                    <a href='update.php?id=$result[id]&fname=$result[fname]&lname=$result[lname]&gender=$result[gender]&email=$result[email]&phone=$result[phone]&address=$result[address]'>
                        <button class='styled-button'>Update</button>
                    </a>
                    <a href='javascript:void(0);' onclick='confirmDelete(\"delete.php?id=$result[id]\")'>
                        <button class='styled-button delete-button'>Delete</button>
                    </a>
                    </td>
                    
                </tr>";
            }
        } else {
            echo "No personal information available.";
        }
        ?>
        </table>
    </div>
</body>

<script>
        function confirmDelete(deleteUrl) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = deleteUrl; // Redirect to the delete URL if confirmed
            }
        }
    </script>


</html>
