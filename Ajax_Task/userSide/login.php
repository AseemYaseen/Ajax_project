<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Document</title>
  </head>
  
  <body>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form id="loginForm">
                <h1>Sign in</h1>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example13">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />
                  <?php
                  ?>
                  <label class="form-label" for="form1Example23">Password</label>
                </div>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                  <a href="#!">Forgot password?</a>
                </div>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                <span> OR Dont you have Account ?</span>
                <a style="text-decoration: none; color:Green; font-weight:600;"  href="./index.php">Register</a>
      
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>
      
                <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!"
                  role="button">
                  <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                </a>
                <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!"
                  role="button">
                  <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>
              </form>

              <div id="error-message" style="display: none; color: red;"></div>
            <div id="success-message" style="display: none; color: green;"></div>

            </div>
          </div>
        </div>
      </section>    

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script>
        $(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        
        var email = $('#email').val();
        var password = $('#password').val();

        console.log(password)
        
        $.ajax({
            type: 'POST',
            url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/Login.php',
            data: {
                email: email,
                password: password,
            },
            success: function(response) {
                response = response.trim();
                if (response.startsWith('Error :')) {
                    var errors = response;
                    $('#error-message').html(errors).show();
                } 
                else {
                  
                    if (response.startsWith('Alert :')){
                        alert('Your Account Still Not Active')
                        window.location = "http://localhost/Ajax_project/Ajax_Task/userSide/login.php";
                    }
                    else {
                        console.log(response);
                        if (response.startsWith('1')){
                            console.log("Admin");
                            window.location = "http://localhost/Ajax_project/Ajax_Task/Admin/dashboard.php";
                        } 
                        else {
                            console.log("User");
                            window.location = "http://localhost/Ajax_project/Ajax_Task/userSide/home.php";
                        }
                    }

                    // console.log(response);
                    //     if (response.startsWith('1')){
                    //         console.log("Admin");
                    //         window.location = "http://localhost/Ajax_project/Ajax_Task/Admin/dashboard.php";
                    //     } 
                    //     else {
                    //         console.log("User");
                    //         window.location = "http://localhost/Ajax_project/Ajax_Task/userSide/home.php";
                    //     }
                }
            }
        });
    });
});

      </script>
</body>
</html>


