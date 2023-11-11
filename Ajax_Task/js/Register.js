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
          }
        }
      });
    });
  });