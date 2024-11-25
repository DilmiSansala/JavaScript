document.addEventListener("DOMContentLoaded", function ()
 {
    const logoutForm = document.querySelector(".logout-form"); 
    const yesButton = logoutForm.querySelector(".logout-btn button");
    const noButton = logoutForm.querySelector(".cancel-btn button");

    // Function to handle the "Log Out" action
    function logout()
     {
       alert("You are logged out!"); // Display a message 
    }

    // Attach a click event listener to the "Yes" button
    yesButton.addEventListener("click", function () {
        logout();
    });

  
    noButton.addEventListener("click", function () {
        });
});
