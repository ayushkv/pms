<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css">
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
  .fancy-flash {
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 1050;
  padding: 15px 20px;
  border-radius: 8px;
  background-color: #4caf50;
  color: white;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  opacity: 0;
  transform: translateY(-20px);
  animation: slideIn 0.5s forwards;
}

.fancy-flash .close {
  color: white;
  opacity: 0.8;
  font-size: 1.2rem;
  border: none;
  background: none;
  cursor: pointer;
}

.fancy-flash .close:hover {
  opacity: 1;
}

@keyframes slideIn {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeOut {
  to {
    opacity: 0;
    transform: translateY(-20px);
  }
}

  </style>
</head>

<body>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show fancy-flash" id="flash-message">
    {{session('success') }}
</div>

@endif

  <div class="container">
    <div class="card">
      <h2>Login</h2>
      <form id="login_form">
        @csrf
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit" id="submit">Login</button>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.js"></script>
  <script>
    $(document).ready(function() {
      if($('#flash-message').length) {
        setTimeout(function() {
          $('#flash-message').css('animation', 'fadeOut 1s forwards');
        }, 2000);  
      }
    });
  </script>

<script>
  $(document).ready(function(){
      $("#submit").click(function(){
        event.preventDefault();
         
          $.ajax({
              url : '/user_check',
              type : 'POST',
              data : $('#login_form').serialize(),
              success: function(response){
                console.log(response,"dijsdfjsfd");
                if(response.success == true){
                  window.location.href = response.redirect; 
                }else{
                  Swal.fire({
                        title: "Error!",
                        text: response.message,
                        icon: "error",
                    });
                }
              },
              error: function(response){
                  Swal.fire({
                  title: "OOPS!",
                  text: response.message,
                  icon: "error"
                  });
                  // alert(response.responseJSON.message);
              }

          });
      });
  });
</script>
  
</body>
</html>