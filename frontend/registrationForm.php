<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="row">
    <div class="col-75">
        <div class="container1">
            <center><h2>User Registration Form</h2></center>
            <form action="/backend/register.php" method="POST">

                <div class="row">
                    <div class="col-50">
                        <input type="text" name="first_name" required placeholder="First Name">
                    </div>
                    <div class="col-50">
                        <input type="text" name="middle_name" required placeholder="Middle Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-50">
                        <input type="text" name="last_name" required placeholder="Last Name">
                    </div>
                    <div class="col-50">
                        <input type="email" name="user_name" required placeholder="Email Address">
                    </div>
                </div>


                <div class="row">
                    <div class="col-50">
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                    <div class="col-50">
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-50"><textarea name="full_address"  placeholder="Full Address"></textarea></div>
                </div>
                <input type="submit" value="Submit Application" class="btn">
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>

</body>
</html>