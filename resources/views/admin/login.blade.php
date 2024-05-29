
<!--<h3>Login</h3>
<form action="" method="post">
    @csrf
<div>Email Address</div>
<div>
    <input type="text" name="email">
</div>
<div>Password</div>
<div>
    <input type="password" name="password">
</div>
<div>
    <input type="submit" value="Login">
</div>
</form>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h3 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-label, div {
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Login</h3>
    <form action="{{route('login_submit')}}" method="post">
        @csrf
        <div>
            <label for="email" class="form-label">Email Address</label>
            <input type="text" id="email" name="email" autocomplete="off" required>
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" autocomplete="off" required>
        </div>
        <input type="submit" class="btn" value="Login">
        <br>
        <a href="{{route('forget_password')}}">Forget Password</a>
    </form>
</div>
<script>
    // Clear input fields on page load
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
    });
</script>

</body>
</html>
