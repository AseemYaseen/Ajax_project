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

    <style>
        body {
            background-color: #f4f7f6;
            margin-top: 20px;
        }

        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }

        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }

        .chat-app .chat {
            margin-left: 280px;
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        .btn-info{
            margin-top: 325px;
            margin-left: 65px;
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }

            .chat-app .people-list.open {
                left: 0
            }

            .chat-app .chat {
                margin: 0
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/msgUsers.php',
                success: function(response) {
                    var returnedData = JSON.parse(response);
                    var data = '<ul class="list-unstyled chat-list mt-2 mb-0">';
                    returnedData.forEach((element => {
                        data += `<li class="clearfix" id="${element.user_id}" name="${element.user_name}" onclick="showMsgThisUser(${element.user_id})">
                            <input type='hidden' id="forSetInterval${element.user_id}" value=${element.user_id} name="${element.user_name}">
                            <div class="about">
                                <div class="name">${element.user_name}</div>                                        
                            </div>
                        </li>`
                    }))
                    // data += '<a class="logOutBtn" href="../BackEnd/logout.php"><button class="btn btn-info">LOGOUT</button></a>'
                    data += '<a class="" href="./home.php"><button class="btn btn-info">Back To Home</button></a>'

                    data += '</ul>';

                    $('#AdminAndUserInGroup').html(data);
                }
            });
        });

        $(document).ready(function() {
            $('#sendMSG').submit(function(e) {
                e.preventDefault();
                var reciverID = $('#reciver').val();
                var content = $('#content').val();

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/sendMSG.php',
                    data: {
                        reciverID: reciverID,
                        content: content,
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.startsWith('Error : ')) {
                            var errors = response;
                            $('#error-message').html(errors).show();
                        } else {
                            document.getElementById('content').value = "";
                            $('#error-message').html(errors).hide();
                            showMsgThisUser(reciverID)
                        }
                    }
                });
            });
        });

        function showMsgThisUser(ids) {
            console.log(ids)
            document.getElementById('sendMSG').style.display = 'block'
            id = document.getElementById(`forSetInterval${ids}`).value
            name = document.getElementById(`forSetInterval${ids}`).name
            // setInterval(function(){showMsgThisUser(id , name)} , 5000)
            var rec = `<input type="hidden" id='reciver' value=${id}>`
            $('#hiddenRec').html(rec);
            $.ajax({
                type: 'GET',
                url: 'http://localhost/Ajax_project/Ajax_Task/BackEnd/msgBetweenUsers.php',
                data: {
                    reciverID: id
                },
                success: function(response) {
                    var returnedData = JSON.parse(response);
                    if (returnedData[0] == 'Start Conversation') {
                        var msg = `<div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    </a>
                                    </div>
                            </div>
                        </div>
                        <div class="chat-history">
                            Start Conversation with ${name}
                        </div> 
                        `
                        var nameOfRCV = `<div class="chat-about">
                                        <h2 class="m-b-0" id="NOR">${name}</h2>
                                    </div>`
                        $('#chatting').html(msg);
                        $('#nameOfReciver').html(nameOfRCV);
                    } else {
                        var msg = `<div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="scrollChat" class="chat-history">
                            <ul class="m-b-0">
                        `
                        returnedData.forEach((sms => {

                            msg += `
                                            <li class="clearfix">`
                            if (sms.user_id == id) {
                                msg += `
                                    <div class="message-data">
                                        <span class="message-data-time">${sms.created_at}</span>
                                    </div>
                                    <div class="message my-message">${sms.content}</div>`
                            } else {
                                msg += `
                                    <div class="message-data">
                                        <span class="message-data-time" style="display: flex; justify-content: end;">${sms.created_at}</span>
                                    </div>
                                    <div class="message other-message float-right">${sms.content}</div>`
                            }
                            msg += `</li>`


                        }))
                        msg += `</ul>
                                    </div>`
                        var nameOfRCV = `<div class="chat-about">
                                        <h2 id="NOR">${name}</h2>
                                    </div>`
                        $('#chatting').html(msg);
                        $('#nameOfReciver').html(nameOfRCV);
                    }



                    id = id
                    name = name

                    // $('#AdminAndUserInGroup').html(data);
                }
            });
        }





    </script>

    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">

                    <div id="plist" class="people-list">

                        <div id="AdminAndUserInGroup"></div>
                    </div>

                    <div class="chat">
                        <div id="nameOfReciver"></div>
                        <hr>
                        <div id="chatting" style='height : 74vh'></div>

                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <form id="sendMSG" style="display: none;">
                                    <div id="hiddenRec"></div>
                                    <div class="d-flex">
                                        <input type="text" style="width : 47vw; border : 1px solid silver" id="content" class="form-control" placeholder="Enter text here...">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                                <div id="error-message" style="display: none; color: red;"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card chat-app">
                        <div id="plist" class="people-list">
                            <div id="AdminAndUserInGroup"></div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                            <ul class="list-unstyled chat-list mt-2 mb-0">
                                <li class="clearfix">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                                    <div class="about">
                                        <div class="name">Dean Henry</div>
                                        <div class="status"> <i class="fa fa-circle offline"></i> offline since Oct 28 </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="chat">

                            <div class="chat-history">
                                <ul class="m-b-0">
                                    <li class="clearfix">

                                        <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                                    </li>
                                    <li class="clearfix">

                                        <div class="message my-message">Are we meeting today?</div>
                                    </li>
                                    <li class="clearfix">

                                        <div class="message my-message">Project has been already finished and I have results to show you.</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-message clearfix">
                                <div class="input-group mb-0">
                                    <form id="sendMSG" style="display: none;">
                                        <div id="hiddenRec"></div>
                                        <div class="d-flex">
                                            <input type="text" style="width: 47vw; border: 1px solid silver" id="content" class="form-control" placeholder="Enter text here...">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                    <div id="error-message" style="display: none; color: red;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </body>

</html>