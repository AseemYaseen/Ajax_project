<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>Register</title>
</head>
<body>
  </script>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4 " id="registerForm">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="user_name" id="user_name" class="form-control" />
                        <label class="form-label" for="form3Example1c">Your Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" id="email" class="form-control" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" id="password" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="re_password" id="re_password" class="form-control" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>
                    <span> OR Do you have Account ?</span>
                    <a style="text-decoration: none; color:Green; font-weight:600;"  href="./login.php">Login</a>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" >
                      </div>
                      <!-- <a href="./login.php" class="btn btn-primary btn-sm"><span>Do you have account ?</span>Login</a> -->
                  </form>
                  <div id="error-message" style="display: none; color: red;"></div>
                  <div id="dup-message" style="display: none; color: red;">This is email is already choosen</div>
                  <div id="success-message" style="display: none; color: green;"></div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
    console.log("form")
    $('#registerForm').submit(function(e) {
      console.log("form")
      e.preventDefault();

      var name = $('#user_name').val();
      console.log(name)
      var email = $('#email').val();
      console.log(email)
      var password = $('#password').val();
      console.log(password)
      var re_password = $('#re_password').val();
      console.log(re_password)
      
      $.ajax({
        type: 'POST',
        url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/Register.php',
        data: {
          user_name: name,
          email: email,
          password: password,
          re_password: re_password,
        },
        success: function(response) {
          if (response.startsWith('Error : ')) {
            var errors = response;
            $('#error-message').html(errors).show();
          } else if (response.startsWith('Alert : ')) {
            alert('Your Account Still Not Active')
          } else {
            $('#success-message').html(response).show();
            $('#dup-message').html(errors).hide();
            $('#error-message').html(errors).hide();
            window.location = "http://localhost/Ajax_project/Ajax_Task/userSide/login.php";
          }
        }
      });
    });
  });


  </script>
   
</body>

</html>


