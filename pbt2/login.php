<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Login Page</title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #EFD5CF;  
}  

button {   
  padding: 10px 20px;
  margin-right: 10px;
  border: none;
  border-radius: 3px;
  background-color: #7963B6;
  color: white;   
  cursor: pointer;   
}   

button a {
  color: white;
  text-decoration: none;
}

form {   
  border: 3px solid #f1f1f1;   
  max-width: 500px;
  margin: 0 auto;
  padding: 60px;
}   

input[type=text], input[type=password] {   
  width: 100%;   
  margin: 8px 0;  
  padding: 12px 20px;   
  display: inline-block;   
  border: 2px solid green;   
  box-sizing: border-box;   
}  

button:hover {   
  opacity: 0.7;   
}   

.container {   
  padding: 25px;   
  background-color: #CBC3E3;  
}   
</style>   
<script>
function navigateTo(url) {
  window.location.href = url;
}
</script>
</head>    

<body>    
  <center><h1>Login Form</h1></center>   
  <form method="post" action="dbpbt2.php">
    <div class="container">   
      <label>Username: </label>   
      <input type="text" placeholder="Enter Username" name="user_name" required>  
      <label>Password: </label>   
      <input type="password" placeholder="Enter Password" name="password" required>
      <br> <br>
      <button type="submit">Login</button>   
      <hr>
      <button type="button" onclick="navigateTo('sepRegister.php')">Create New Account</button>   
    </div>   
  </form>     
</body>     
</html>
