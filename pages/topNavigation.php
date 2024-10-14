<div class="login-container">
         <form method="post" action="login.php"> 
             <div><input type="text" name="username" placeholder="Username"></div>
             <div><input type="password" name="password" placeholder="Password"></div>
             <button type="submit">Login</button>
         </form>
         <?php
         // Display "My Account" if logged in
         if (isset($_SESSION['username'])) {
             echo '<p>Welcome, ' . $_SESSION['username'] . '!</p>';
             echo '<a href="logout.php">My Account</a>';
         }
         ?>
     </div>