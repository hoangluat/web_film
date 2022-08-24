<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Chào Mừng Bạn Đến Với Chúng Tôi</h3>
    <p>Mật khẩu của bạn là : {{$password}}</p>
    <a href="{{route("auth.verifyRegis",$verification_code)}}">Xin vui lòng cick vào đây để xác thực tài khoản</a>
</body>
</html>
