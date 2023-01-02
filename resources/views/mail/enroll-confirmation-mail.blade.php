<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .div-one{
            height: auto;
            width: 60%;
            margin: 0 auto;
            color: black;
            text-align: center;
            padding: 20px;
        }
        .div-one h4, h5{
            font-weight: bold;
        }
        .div-one p span{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="div-one">
        <h4>Congratulations {{$value['name']}}, your enroll submit successfully,
            You may see your enroll status
        </h4>
        <h5>Your login credential is givel bellow:</h5>
        <p><span>login url:</span> <a href="{{$value['login_url']}}" target="_blank">Click Here For Login</a></p>
        <p><span>Email:</span> {{$value['email']}}</p>
        <p><span>Password:</span> {{$value['password']}}</p>
        <hr/>
        <p>Thank You..</p>
    </div>
</body>
</html>
