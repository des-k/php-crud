<?php
#change to crud_mysqli to switch to mysqli but still pdo is the best
include_once("crud_pdo.php");
?>
<html>
  <head>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Password Manager</title>
  </head>

  <body>
    
    <div class="header">
      <div class="container">
        <h1>My First CRUD Application</h1>
      </div>
    </div>
    
    <div class="form-data">
      <div class="container">
        
        <?php 
          if (isset($_GET['edit'])) {
            echo '<h2>Update Data</h2>';
          } else {
            echo '<h2>Insert New Data</h2>';
          }
          ?>
        <form method="post">
          
          <input class="form-input" placeholder="Host" type="text" name="host" id="host" value="<?php if (isset($_GET['edit'])) echo $singleRow['host']; ?>"/>
          
          <input class="form-input" placeholder="User" type="text" name="user" id="user" value="<?php if (isset($_GET['edit'])) echo $singleRow['user']; ?>" />
          
          <input class="form-input" placeholder="Password" type="text" name="password" id="password" value="<?php if (isset($_GET['edit'])) echo $singleRow['password']; ?>" />
          
          <?php 
          if (isset($_GET['edit'])) {
            echo '<button type="submit" name="update">Update</button>';
          } else {
            echo '<button type="submit" name="create">Save</button>';
          }
          ?>
          
        </form>
      </div>
    </div>
    
    <div class="table-crud">
      <div class="container">
        
        <table class="center">
          <thead>
            <tr><th colspan="4">All Password</th></tr>
            <tr>
              <th>Host</th>
              <th>User</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
        
          <tbody>
          <?php
            
           foreach($data as $row) {
                
                echo "<tr>";
                echo "<td>".$row['host']."</td>";
                echo "<td>".$row['user']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td><a href='?edit=".$row['id']."'>Edit  </a>";
                echo "<a href='?delete=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
              }
            ?>
            
          </tbody>
        </table>
      </div>
    </div>
    
    
  </body>
</html>