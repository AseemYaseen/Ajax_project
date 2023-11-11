<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Hello user</h1>

    <style>
      .chatBut{
        border-radius: 10px;
        border: 1px black solid;
        background-color: white;
        transition: 0.3s;
        height: 120%;
  
      }

      .chatBut:hover{
        scale: 1.06;
        background-color: #0dcaf0;
        color: white;
      }

      .chatBut a{
        color: black;
        text-decoration: none;
      }
      .chatBut a:hover{
        color: white;
        text-decoration: none;
      }

      .notChatBut{
        border-radius: 10px;
        border: 1px black solid;
        background-color: white;
        transition: 0.3s;
        height: 120%;
        color: silver;
      }

      .notChatBut a{
        color: silver;
        text-decoration: none;
      }

    </style>

    <!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->


<div class="container" style="margin-top: 2vw;">

    <h3>user Table</h3>
    <table class="table table-striped table-hover" style="text-align: center; margin-bottom:100px">

        <thead>
            <tr>
                <th scope="col">Your ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">My Chat</th>

            </tr>
        </thead>
        <tbody id="info-table">
            
        </tbody>
    </table>
    
    <h1>Your Courses</h1>
    <table class="table table-striped table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">Name of Course</th>
                <th scope="col">Min Mark of Course</th>
                <th scope="col">Your Mark</th>
            </tr>
        </thead>
        <tbody id="course-table">
            
        </tbody>
    </table>


    </div>

    <script>

        $(document).ready(function() {      
                $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_Project/Ajax_Task/BackEnd/userHomeData.php',
                success: function(response) {
                    var returnedData = JSON.parse(response);
                    var data = "";
                    returnedData.forEach((element=>{
                       data += `<tr>
                                    <td>${element.user_id}</td>
                                    <td>${element.user_name}</td>
                                    <td>${element.email}</td>`
                                    

                        if(element.is_active == "notActive"){
                            data += `<td style="color:red">notActive</td>`
                        } else {
                            data += `<td style="color:green">Active</td>`
                        }

                        if(element.is_active == "notActive"){
                          data += `<td><button class="notChatBut"><a href="#"> Go to chats </a></button></td>`
                        } else {
                          data += `<td><button class="chatBut"><a target="_blank" href="./messages.php"> Go to chats </a></button></td>`
                        }
                        data += `</tr>`
                            
                    }))
                    $('#info-table').html(data);
                }
                });
            });

           
        $(document).ready(function() {      
                $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/userHomeMark.php',
                success: function(response) {
                    var returnedData = JSON.parse(response);
                    var data = "";
                    returnedData.forEach((element=>{
                    if(element.is_active == "Active"){
                       data += `<tr>
                                    <td>${element.course_name}</td>
                                    <td>${element.min_mark}</td>
                                    <td>${element.mark}</td></tr>`
                            
                }else{
                  data = `<h1 style  = "margin:20px 0px 0px 250px; color:Red;">Sorry you will need the Admin approval please be patient !</h1>`
                }

              }))
                    $('#course-table').html(data);
                }
                });
            });
    </script>

<div>
        <a href="../BackEnd/logout.php"><button class="btn btn-info">LOGOUT</button></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
</body>
</html>