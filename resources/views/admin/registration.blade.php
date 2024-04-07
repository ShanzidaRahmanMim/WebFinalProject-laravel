<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        .form-label {
            display: block;
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
            background-color:green;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Registration Form</h3>
    <form action="{{route('registrationsubmit')}}" method="post">
        @csrf
        
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="retype_password" class="form-label">Retype Password</label>
            <input type="password" id="retype_password" name="retype_password" required>
        </div>
        <input type="submit" class="btn" value="Make Registration">
    </form>
</div>

</body>
</html>
