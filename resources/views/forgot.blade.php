<style>

/* Basic styles for the forgot password form */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.forgot-password-form {
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

.btn-reset {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 3px;
    background-color: #dc3545;
    color: #fff;
    cursor: pointer;
}

.btn-reset:hover {
    background-color: #c82333;
}


</style>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password -Tak Manager </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="container">
    <form class="forgot-password-form" action="/PasswordForgot" method="post">
        @csrf
        <h2>Forgot Password</h2>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" placeholder="Enter new password" required>
        </div>
        <button type="submit" class="btn-reset">Reset Password</button>
    </form>
</div>


    @if(Session::has('message'))
         <script>
             swal('Done',"{!!Session::get('message')!!}",'success');
         </script>
    @endif   
    
    @if(Session::has('invalid'))
         <script>
             swal('Sorry',"{!!Session::get('invalid')!!}",'warning');
         </script>
    @endif  

    
</body>
</html>