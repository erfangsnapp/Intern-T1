<div class="log-form">
  <h2>Login to your account</h2>
<?php
    if(isset($error)){
        echo "<p style='color:red;'>Error: $error</p><br>";
    }
?>
  <form method="POST" action="login">
    <input name = "username" type="text" title="username" placeholder="username" /><br>
    <input name = "password" type="password" title="password" placeholder="password" /><br>
    <button type="submit">Login</button>
  </form>
</div>
