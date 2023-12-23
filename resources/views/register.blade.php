<style>
    /* Basic styles for the registration form */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.register-form {
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

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

.btn-save {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 3px;
    background-color: #28a745;
    color: #fff;
    cursor: pointer;
}
.btn-back {
    width: 100%;
    margin-top:10px;
    padding: 10px;
    border: none;
    border-radius: 3px;
    background-color: orange;
    color: #fff;
    cursor: pointer;
}

.btn-save:hover {
    background-color: #218838;
}
.error { 
            color: red; 
            font-size: 18px; 
        }

</style>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page -Task Manager</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="container">
    <form class="register-form" method="post" action="/save">
        @csrf
        <h2>Register</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password"  required>
        </div>
        <button type="submit" class="btn-save">Save</button>
        <br>
        <a href="/login"><button type="button" class="btn-back">Back</button></a>
    </form>

          @if(Session::has('message'))
            <script>
            swal('Done',"{{!!Session::get('message')!!}}",'success');
            </script>
         @endif

    <ul class="error"> 
        @foreach($errors->all() as $error) 
        <li>{{ $error }}</li> 
        @endforeach 
    </ul>

</div>

    
</body>
</html>