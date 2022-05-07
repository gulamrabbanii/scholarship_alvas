<?php
include("admin-layout.php");
require_once("../db/config.php");

$sql = "SELECT * FROM users WHERE username NOT REGEXP '^4[Aa][Ll][0-9]{2}[A-Za-z]{2}[0-9]{3}' AND username !='admin' ";
?>
<title>ADMIN USERS</title>

    <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">LIST OF ADMINISTRATOR USERS</span>
                </div>
            </div>
    
            <div class="activity">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col"><label>#</label></th>
      <th scope="col"><label> Username</label></th>
      <th scope="col"><label>First Name</label></th>
      <th scope="col"><label>Last Name</label></th>
      <th scope="col"><label>Remove</label></th>
    </tr>
  </thead>
  <tbody>
      <?php
        if($result = $link->query($sql)){
            $id = 1;
            if($result->num_rows > 0){
                while($row = $result->fetch_array()){ ?>
        <tr>
            <th scope="row"><label><?php echo $id ?></label></th>
            <td><label><?php echo $row['username']?></label></td>
            <td><label><?php echo $row['first_name']?></label></td>
            <td><label><?php echo $row['last_name']?></label></td>
            <td>
                <?php echo "<a class='btn btn-outline-danger' onclick=\"return confirm('Do you really want to delete this user?')\" href=\"user-delete.php?id=" . $row['id'] . " \">Remove</a>"; ?>
                            <script>
                                document.getElementById('a.delete').on('click', function() {
                                    var choice = confirm('Delete this user?');
                                    if (choice === true) {
                                        return true;
                                    }
                                    return false;
                                });
                            </script>
            </td>
        </tr>
        <?php $id++; 
        }
        // Free result set
        $result->free();
        } else{
        echo "No records matching your query were found.";
        }
    } else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
    // Close connection
    $link->close();
?>
  </tbody>
</table>
</div>
</div>
</section>