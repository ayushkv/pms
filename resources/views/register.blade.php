<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
    body {
    font-family: "Poppins", sans-serif;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: #f5f5f5;
    color: #333;
  }
  
  .container {
    width: 100%;
    max-width: 400px;
  }
  
  .card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  h2 {
    text-align: center;
    color: #333;
  }
  
  form {
    display: flex;
    flex-direction: column;
  }
  
  input {
    padding: 10px;
    margin-bottom: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: border-color 0.3s ease-in-out;
    outline: none;
    color: #333;
  }
  
  input:focus {
    border-color: #555;
  }
  
  button {
    background-color: #3498db;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }
  
  button:hover {
    background-color: #2980b9;
  }
  
  </style>
  </head>
  <body>
  <div class="container">
    <div class="card">
      <h2>Register</h2>
      <form method="POST" action={{route('user.register')}} id="register_form" onsubmit="return validateForm()">
        @csrf
        <input type="text" id="first_name" name="first_name" placeholder="Firstname" class="form-control @error('first_name') is-invalid @enderror" >  
        <span id="first_name_error" class="text-danger">@error('first_name') {{$message}} @enderror</span>
        <input type="text" id="last_name" name="last_name" placeholder="Lastname" class="form-control @error('last_name') is-invalid @enderror" >
        <span id="last_name_error" class="text-danger">@error('last_name') {{$message}} @enderror</span>
        <input type="email" id="email" name="email" placeholder="Email id" class="form-control @error('email') is-invalid @enderror" >
        <span id="email_error" class="text-danger">@error('email') {{$message}} @enderror</span>
        <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" >
        <span id="phone_error" class="text-danger">@error('phone') {{$message}} @enderror</span>
        <input type="text" id="username" name="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" >
        <span id="username_error" class="text-danger">@error('username') {{$message}} @enderror</span>
        <input type="password" id="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" >
        <span id="password_error" class="text-danger">@error('password') {{$message}} @enderror</span>
        <button type="submit" id="submit">Register</button>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.js"></script>
  <script>
$(document).ready(function(){

})

function validateForm(){
  let fname = $('#first_name').val();
  let lname = $('#last_name').val();
  let email = $('#email').val();
  let phone = $('#phone').val();
  let username = $('#username').val();
  let password = $('#password').val();
  let password_error = $('#password_error');
  let email_error = $('#email_error');
  let phone_error = $('#phone_error');
  let username_error = $('#username_error');
  let last_name_error = $('#last_name_error');
  let first_name_error = $('#first_name_error');
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  const phoneRegex = /^(\+?\d{1,2}\s?)?(\(?\d{3}\)?[\s\-]?)?[\d\-]{7,}$/;

  if(fname == ''){
    $('#first_name').focus();
    first_name_error.text('First Name is required');
    return false;
  }else if(lname == ''){
    $('#last_name').focus();
    last_name_error.text('Last Name is required');
    return false;
  }else if(email == ''){
    $('#email').focus();
    email_error.text('Email is required');
    return false;
  }else if(!emailRegex.test(email)){
    $('#email').focus();
    email_error.text('Invalid email format');
    return false;
  }else if(phone == ''){
    $('#phone').focus();
    phone_error.text('Phone is required');
    return false;
  }else if(!phoneRegex.test(phone)){
    $('#phone').focus();
    phone_error.text('Invalid phone number');
    return false;
  }else if(username == ''){
    $('#username').focus();
    username_error.text('Username is required');
    return false;
  }else if(password == ''){
    $('#password').focus();
    password_error.text('Password is required');
    return false;
  }else if(password.length < 6){
    $('#password').focus();
    password_error.text('Password must be at least 6 characters');
    return false;
  }
}
  </script>
</body>
</html>