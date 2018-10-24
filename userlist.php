<?php 
include 'lib/header.php'; 
include_once 'classes/DB.php';
include_once 'classes/User.php';

$usr = new User();
$listOfUsr = $usr->listUser();
?>
<div class="container" style="margin-top: 200px;">
  <h2>Registered Users List</h2>
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>User Type</th>
      </tr>
    </thead>
    <tbody>
 <?php
 if ($listOfUsr) {
                $i = 0;
                while ($result = $listOfUsr->fetch_assoc()) {
                    $i++;
                    
?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result['user_fname']; ?></td>
        <td><?php echo $result['user_lname']; ?></td>
        <td><?php echo $result['user_email']; ?></td>
        <td><?php echo $result['user_phone']; ?></td>
        <td><?=($result['user_type']==='1'? 'User':'Administrator'); ?></td>
      </tr>
      
<?php
    }
} 
else{?>
      <tr>
          <td colspan="5" align="center">No Registered User Found!</td>
      </tr>
<?php
}
?>
    </tbody>
  </table>
  </div>
</div>

<?php include 'lib/footer.php'; ?>
