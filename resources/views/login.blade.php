<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('images/back-login.png') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #ffffff;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .login-container {
            width: 400px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #ffffff;
        }

        .login-container h2 {
            text-align: center;
            color: #ffffff;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            box-sizing: border-box;
            border: 2px solid #ffffff;
            border-radius: 8px;
            font-size: 18px;
            color: #000000;
            background: #ffffff;
            outline: none;
            position: relative;
            transition: border-color 0.3s;
        }

        .login-container input:focus {
            border-color: #000000;
        }

        .login-container input::after {
            content: '';
            position: absolute;
            height: 2px;
            width: 0;
            bottom: 0;
            left: 0;
            background-color: #000000;
            transition: width 0.3s;
        }

        .login-container input:focus::after {
            width: 100%;
        }

        .login-container button {
            width: 100%;
            padding: 15px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 20px;
            transition: background-color 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }

        .login-container button:hover {
            background-color: #333333;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
        }

        .login-container button:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #000000, #333333);
            opacity: 0;
            transition: opacity 0.3s;
            z-index: -1;
        }

        .login-container button:hover:before {
            opacity: 1;
        }

        .login-container a {
            display: block;
            text-align: center;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
        }

        .login-container a:hover {
            color: #cccccc;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form action="userlogin" method="post">
            @csrf
            <h2>Login</h2>
            <input type="text" placeholder="Enter UserId" name="userId" required>
            <input type="password" required placeholder="Enter Password" name="password">
            <button type="submit">Login</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Check for success message
            if ('{{ session('success') }}') {
                toastr.options = {
                    "closeButton": true,
                    "timeOut": 3000
                };
                toastr.success('{{ session('success') }}');
            }

            // Check for error message
            if ('{{ session('error') }}') {
                toastr.options = {
                    "closeButton": true,
                    "timeOut": 3000
                };
                toastr.error('{{ session('error') }}');
            }
        });
    </script>
</body>

</html>
