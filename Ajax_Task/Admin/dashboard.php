  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>CSC</title>
    <style>
      body {
        background-image: url(https://static.pexels.com/photos/371633/pexels-photo-371633.jpeg);
        background-repeat: no-repeat;
        background-size: 100%;
      }

      footer {

        margin-top: 20px;
        padding-top: 20px;
      }

      .bg__card__navbar {
        background-color: #000000;
      }

      .bg__card__footer {
        background-color: #000000 !important;
      }

      #add__new__list {
        top: -38px;
        right: 0px;
      }

      .theActiveBut{
        transition: 0.5s;
        background-color: #0a58ca;
      }

      .theActiveBut:hover span{
  display:none;
 
}

.theActiveBut:hover:before {
  content:" Un Active";
}

.theActiveBut:hover {
  background-color: red;
}

.theActiveBut0{
  transition: 0.5s;
}
.theActiveBut0:hover{
  scale: 1.05;
  background-color: #0a58ca;
}
    </style>
  </head>

  <body>

    <header>
      <div>
        <br>
        <button type="button" style="background-color: silver;" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Add Course
        </button>
        <br>
        <br>
        <button type="button" style="background-color: silver;" class="btn" data-bs-toggle="modal" data-bs-target="#assignCourse" onclick="getAllCourses()">
          Assign Course to Student
        </button>
        <br>
        <br>
        <button type="button" style="background-color: silver;" class="btn" data-bs-toggle="modal" data-bs-target="#assignMark" onclick="getCourses()">
          Assign Mark to Student
        </button>
        <br>
        <br>
        <button type="button" style="background-color: silver;">
        <a href="./adminMsgPage.php">Open Chat</a>
          
        </button>
      </div>
    </header>
    <!---->

    <main>
      <!-- Add course Form -->

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add New Course</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideError()"></button>
            </div>
            <div class="modal-body">
              <form id="addNewCourse-form">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Course Name:</label>
                  <input type="text" class="form-control" id="name-course">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Minimum Mark:</label>
                  <input type="number" class="form-control" id="min-mark">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                  <button type="submit" id="btnAddCourse" class="btn btn-primary">Add Course</button>
                </div>
                <div id="course-message" style="display: none; color: red; margin-left : 10px"></div>
                <div id="course-success-message" style="display: none; color: green; margin-left : 10px"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Assign Form-->

      <div class="modal fade" id="assignCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Assign To Course</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideError()"></button>
            </div>
            <div class="modal-body">
              <form id="assignCourse-form">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Course Name:</label>
                  <select class="form-select" name="crs-name-assign" id="CrsNameAssign">
                    <option value="none"></option>
                  </select>
                </div>
                <div class="mb-3" id="DivStuNameAss" style="display: none;">
                  <label for="message-text" class="col-form-label">Student:</label>
                  <select class="form-select" name="std-name-assign" id="StuNameAss">
                    <option value="none">Select Student In Course</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                  <button type="submit" class="btn btn-primary">Assign Course</button>
                </div>
                <div id="assign-error-message" style="display: none; color: red; margin-left : 10px"></div>
                <div id="assign-success-message" style="display: none; color: green; margin-left : 10px"></div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Assign Mark -->

      <div class="modal fade" id="assignMark" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Assign Mark To Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="hideError()"></button>
        </div>
        <div class="modal-body">
            <form id="assignMark-form">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Course Name:</label>
                    <select class="form-select" name="crs-name-mark" id="CrsNameMark">
                        <option value="none"></option>
                    </select>
                </div>
                <div class="mb-3" id="DivStuNameMark" style="display: none;">
                    <label for="message-text" class="col-form-label">Student:</label>
                    <select class="form-select" name="std-name-mark" id="StuNameMark">
                        <option value="none">Select Student In Course</option>
                    </select>
                </div>
                <div class="mb-3" id="DivMark" style="display: none;">
                    <label for="message-text" class="col-form-label">Mark:</label>
                    <input require type="number" class="form-control" id="mark">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Mark</button>
                </div>
                <div id="mark-message" style="display: none; color: red; margin-left : 10px"></div>
                <div id="mark-success-message" style="display: none; color: green; margin-left : 10px"></div>
            </form>
        </div>
        </div>
    </div>
    </div>


      <br>


      <!-- Logout button -->
      <div>
        <a href="../BackEnd/logout.php"><button class="btn btn-info">LOGOUT</button></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>


      <div class="container my-5">
        <h2 class="card-title">CSC System</h2>
        <div class="card-body text-center">
        </div>
        <div class="card">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">User name</th>
                <th scope="col">Email</th>
                <th scope="col">Edit </th>
                <th scope="col">Delete</th>
                <th scope="col">Make Active</th>

              </tr>
            </thead>
            <!-- <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>
                      <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> edit</a>
                      <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i> delete</a>    
                  </td>
                  <td><a class="btn btn-sm btn-info" href="#"><i class="fas fa-info-circle"></i> Make Active</a> </td>
                  
                  <td><a class="btn btn-sm btn-info" href="#"><i class="fas fa-info-circle"></i> Make unActive</a> </td>
                </tr>

              </tbody> -->
            <tbody id="body-table">

            </tbody>
          </table>
        </div>

        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hanErrors()"></button>
              </div>
              <div class="modal-body">
                <form id="update-form">
                  <input type="hidden" id="user_id">
                  <input type="hidden" id="old_email">
                  <input type="hidden" id="old_username">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Username:</label>
                    <input type="text" class="form-control" id="nameEdit">
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="editEmail">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hanErrors()">Close</button>
                    <a href="updateUserInfo.php"><button type="submit" class="btn btn-primary">Update</button></a>
                  </div>
                  <div id="error-message-update" style="display: none; color: red; margin-left : 10px"></div>
                  <div id="success-message" style="display: none; color: green; margin-left : 10px"></div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hanErrors()"></button>
              </div>
              <form id="delete-form">
                <input type="hidden" id="idInput">

                <div class="modal-body">
                  Are you sure do you want to remove this user ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hanErrors()">Close</button>
                  <button type="submit" class="btn btn-primary">Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <script>

          function hanErrors() {

            document.getElementById('StuNameMark').value = 'none'
            document.getElementById('CrsNameMark').value = 'none'
            document.getElementById('StuNameAss').value = 'none'
            document.getElementById('CrsNameAssign').value = 'none'
            document.getElementById('mark').value = 'none'
            document.getElementById('DivStuNameAss').style.display = 'none'

            // document.getElementById('error-message').style.display = 'none'
            
            document.getElementById('DivStuNameMark').style.display = 'none'
            document.getElementById('DivMark').style.display = 'none'
            document.getElementById('error-message-update').style.display = 'none'
            document.getElementById('course-message').style.display = 'none'
            document.getElementById('name-course').value = ''
            document.getElementById('min-mark').value = 'none'
            
            document.getElementById('assign-success-message').style.display = 'none'
            document.getElementById('mark-success-message').style.display = 'none'
            document.getElementById('course-success-message').style.display = 'none'
            document.getElementById('success-message').style.display = 'none'


            document.getElementById('error-message').style.display = 'none'
            document.getElementById('assign-error-message').style.display = 'none'
            document.getElementById('mark-message').style.display = 'none'
          }


          window.onclick = function(event) {
            if (event.target == document.getElementById("editUser") || event.target == document.getElementById("staticBackdrop") || 
            event.target == document.getElementById("assignCourse") || event.target == document.getElementById("assignMark")) {
              hanErrors();
            }
          }

          // Display all users

          function setUserDataInTable() {
            $(document).ready(function() {
              $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/users.php',
                success: function(response) {
                  var returnedData = JSON.parse(response);
                  var data = "";
                  var i = 1;
                  returnedData.forEach((element => {
                    data += `<tr>
                  <td>${i++}</td>
                  <td>${element.user_name}</td>
                  <td>${element.email}</td>`

                    // Edit User button
                    data += `<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser" data-bs-whatever="@mdo" onclick="myFunc(${element.user_id})">Edit User</button></td>`

                    // Delete User button
                    data += `<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser" onclick="rem(${element.user_id})">Delete User</button></td>`

                    // Make Active button
                    if (element.is_active == "notActive") {
                      data += `<td><button class="btn btn-success theActiveBut0 " onclick='makeActive(${element.user_id})'>Make Active</button></td>`
                    } else {
                      data += `<td><button class="btn btn-success theActiveBut" onclick='makeUnActive(${element.user_id})'><span>Is Active</span> </button></td>`
                    }

                    data += `</tr>`
                  }))
                  $('#body-table').html(data);

                }
              });
            });
          }

          setUserDataInTable()


          // Make Active Func

          function makeActive(id) {
            $(document).ready(function() {
              $.ajax({
                type: 'POST',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/makeActive.php',
                data: {
                  id: id
                },
                success: function(response) {
                  setUserDataInTable()
                }
              });
            });
          }


         // Make unActive Func

          function makeUnActive(id) {
            $(document).ready(function() {
              $.ajax({
                type: 'POST',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/makeUnActive.php',
                data: {
                  id: id
                },
                success: function(response) {
                  setUserDataInTable()
                }
              });
            });
          }

          // Delete user Func

          $(document).ready(function() {
            $('#delete-form').submit(function(e) {
              e.preventDefault();

              var id = $('#idInput').val();

              $.ajax({
                type: 'POST',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/deleteUser.php',
                data: {
                  id: id,
                },
                success: function(response) {
                  $("#deleteUser").modal('hide');
                  setUserDataInTable()
                }
              });
            });
          });

          // user POP

          function myFunc(id) {
            $(document).ready(function() {
              $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/userPop.php',
                data: {
                  id: id
                },
                success: function(response) {
                  var userInfo = JSON.parse(response);
                  document.getElementById('nameEdit').value = userInfo.user_name
                  document.getElementById('editEmail').value = userInfo.email
                  document.getElementById('user_id').value = userInfo.user_id
                  document.getElementById('old_email').value = userInfo.email
                  document.getElementById('old_username').value = userInfo.user_name
                }
              });
            });
          }

          function closeForm() {
            document.getElementById("popUp-form").style.display = "none";
          }

          // Edit user

          function rem(id) {
            document.getElementById('idInput').value = id
          }

          $(document).ready(function() {
            $('#update-form').submit(function(e) {
              e.preventDefault();

              var name = $('#nameEdit').val();
              var email = $('#editEmail').val();
              var id = $('#user_id').val();
              var old_email = $('#old_email').val();
              var old_username = $('#old_username').val();

              console.log(id,"id")

              $.ajax({
                type: 'POST',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/userUpdate.php',
                data: {
                  username: name,
                  email: email,
                  id: id,
                  old_email: old_email,
                  old_username: old_username,
                },
                success: function(response) {
                  console.log(response)
                  if (response.startsWith('Error : ')) {
                    var errors = response;
                    $('#error-message-update').html(errors).show();
                  } else {
                    $("#editUser").modal('hide');
                    setUserDataInTable()
                    // $('#success-message').html(response).show();
                    $('#dup-message').html(errors).hide();
                    $('#error-message-update').html(errors).hide();
                  }
                }
              });
            });
          });

          //  Add course Dashboard

          $(document).ready(function() {

            $('#addNewCourse-form').submit(function(e) {
              e.preventDefault();
              var nameOfCourse = $('#name-course').val();
              var minMark = $('#min-mark').val();

              $.ajax({
                type: 'POST',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/addCourse.php',
                data: {
                  nameOfCourse: nameOfCourse,
                  minMark: minMark,
                },
                success: function(response) {
                  if (response.startsWith('Error : ')) {
                    var errors = response;
                    $('#course-message').html(errors).show();
                  } else {
                    $("#staticBackdrop").modal('hide');
                    document.getElementById('name-course').value = ""
                    document.getElementById('min-mark').value = ""
                    setUserDataInTable()
                    $('#course-success-message').html(response).show();
                    $('#course-message').html(errors).hide();
                  }
                }
              });
            });
          });

          // Display All courses

          function getAllCourses() {
            $(document).ready(function() {
              $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/getAllCourses.php',
                success: function(response) {
                  var coursesInfo = JSON.parse(response);
                  var data = "";
                  var i = 1;
                  data += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="crs-name-assign" id="CrsNameAssign">
                    <option value="none" selected >Select Course</option>
                    `

                  coursesInfo.forEach((element => {
                    data += `<option value="${element.course_id}" name="${element.course_id}" id="${element.course_id}" >${element.course_name}</option>`
                  }))

                  data += `</select>`
                  $('#CrsNameAssign').html(data);
                }
              });
            });
          }

          // Assign Course to student

          document.getElementById("CrsNameAssign").onchange = function load() {
            var courseID = document.getElementById('CrsNameAssign').value;
            document.getElementById('DivStuNameAss').style.display = 'block'
            $(document).ready(function() {
              var id = $('#CrsNameAssign').val();
              $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/getNotAssignedStu.php',
                data: {
                  id: id
                },
                success: function(response) {
                  var studentsNotInCourse = JSON.parse(response);
                  var stu = "";
                  var i = 1;

                  stu += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="std-name-assign" id="StuNameAss">
                <option value="none" selected >Select Student</option>
                `
                  studentsNotInCourse.forEach((element => {
                    stu += `<option value="${element.user_id}" name="${element.user_id}" id="${element.user_id}" >${element.user_name}</option>`
                  }))
                  stu += `</select>`
                  $('#StuNameAss').html(stu);
                }
              });
            });
          }

          // Assign form

          $(document).ready(function() {
            $('#assignCourse-form').submit(function(e) {
              e.preventDefault();
              var nameOfCourse = $('#CrsNameAssign').val();
              var stuName = $('#StuNameAss').val();

              $.ajax({
                type: 'POST',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/addStudentToCourse.php',
                data: {
                  nameOfCourse: nameOfCourse,
                  stuName: stuName,
                },
                success: function(response) {
                  console.log(response)
                  if (response.startsWith('Error : ')) {
                    var errors = response;
                    $('#assign-error-message').html(errors).show();
                  } else {
                    $("#assignCourse").modal('hide');
                    document.getElementById('CrsNameAssign').value = ""
                    document.getElementById('StuNameAss').value = ""
                    setUserDataInTable()
                    $('#assign-success-message').html(response).show();
                    $('#course-message').html(errors).hide();
                  }
                }
              });
            });
          });

          
          // Assign Mark
          
          
        function getCourses(){
            $(document).ready(function() {  
            $.ajax({
            type: 'GET',
            url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/getAllCourses.php',
            success: function(response) {
                var coursesInfo = JSON.parse(response);
                var data = "";
                    var i = 1;
                    data += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="crs-name-assign" id="CrsNameMark">
                    <option value="none" selected >Select Course</option>
                    `
                    coursesInfo.forEach((element=>{
                     data += `<option value="${element.course_id}" name="${element.course_id}" id="${element.course_id}" >${element.course_name}</option>`
                    }))
                    data += `</select>`
                    $('#CrsNameMark').html(data);
                }
                });
        });
        }



        document.getElementById("CrsNameMark").onchange = function load(){
            var courseID = document.getElementById('CrsNameMark').value;
            document.getElementById('DivStuNameMark').style.display = 'block'
            document.getElementById('DivMark').style.display = 'block'
            $(document).ready(function() {  
            var id = $('#CrsNameMark').val();
            $.ajax({
            type: 'GET',
            url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/getAssignedStu.php',
            data : {id : id},
            success: function(response) {
                var studentsInCourse = JSON.parse(response);
                var stu = "";
                var i = 1;
                stu += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="std-name-assign" id="StuNameMark">
                <option value="none" selected >Select Student</option>
                `
                studentsInCourse.forEach((element=>{
                    stu += `<option value="${element.user_id}" name="${element.user_id}" id="${element.user_id}" >${element.user_name}</option>`
                }))
                stu += `</select>`
                $('#StuNameMark').html(stu);
            }
            });
        });
        }




        $(document).ready(function() {
            $('#assignMark-form').submit(function(e) {
            e.preventDefault();
            var nameOfCourse = $('#CrsNameMark').val();
            var StuNameMark = $('#StuNameMark').val();
            var stuMark = $('#mark').val();
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/assignMark.php',
            data: {
                nameOfCourse : nameOfCourse,
                StuNameMark : StuNameMark,
                stuMark : stuMark
            },
            success: function(response) {
                console.log(nameOfCourse)
                console.log(StuNameMark)
                console.log(stuMark)
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#mark-message').html(errors).show();
                } else {
                    console.log('success')
                    $("#assignMark").modal('hide');
                    document.getElementById('mark').value = ""
                    document.getElementById('StuNameMark').value = ""
                    document.getElementById('CrsNameMark').value = ""
                    setUserDataInTable()
                    $('#mark-success-message').html(response).show();
                    $('#mark-message').html(errors).hide();
                }
            }
            });
        });
        });


        </script>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="card-body text-center">
                <h4 class="card-title">Special title treatment</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              </div>
              <div class=" card col-8 offset-2 my-2 p-3">
                <form>
                  <div class="form-group">
                    <label for="listname">List name</label>
                    <input type="text" class="form-control" name="listname" id="listname" placeholder="Enter your listname">
                  </div>
                  <div class="form-group">
                    <label for="datepicker">Deadline</label>
                    <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Pick up a date">
                  </div>
                  <div class="form-group">
                    <label for="datepicker">Add a list item</label>
                    <div class="input-group">

                      <input type="text" class="form-control" placeholder="Add an item" aria-label="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!---->

    <!---->
    <footer>
      <div class="container bg-info p-5">

      </div>
    </footer>
  </body>

  </html>