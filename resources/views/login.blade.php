<style>
    /* Basic styles for the login form */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-form {
    max-width: 300px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

.btn-login {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 3px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.btn-login:hover {
    background-color: #0056b3;
}

.form-options {
    margin-top: 10px;
    text-align: center;
}

.divider {
    margin: 0 5px;
    color: #999;
}
.error
{
    color:red;
}

</style>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page-Task Manager</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="container">
    <form class="login-form" action="/LoginCheck" method="post">
        <h2>Login</h2>
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" >
        </div>
        <button type="submit" class="btn-login">Login</button>
        <div class="form-options">
            <a href="/forgot" style="text-decoration:none"; class="forgot-password">Forgot Password?</a>
            <span class="divider">|</span>
            <a href="/register"  style="text-decoration:none"; class="register">Register</a>
        </div>
        <ul class="error"> 
        @foreach($errors->all() as $error) 
        <li>{{ $error }}</li> 
        @endforeach 
    </ul>
    </form>
</div>

        @if(Session::has('invalid'))
            <script>
            swal('fail',"{!!Session::get('invalid')!!}",'error');
            </script>
        @endif

    
</body>
</html>