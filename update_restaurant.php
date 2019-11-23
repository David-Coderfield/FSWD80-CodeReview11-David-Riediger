<?php
session_start();

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  require_once 'actions/dbconnect.php';

  $sql = "SELECT * FROM `locations`
  INNER JOIN `restaurants` ON restaurants.location_id=locations.id
  WHERE id=$id";

  $result = $conn->query($sql);

  //There can only be 1 row returned if the DB is intact
  $row = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'components/head.php' ?>
</head>

<body>
  <div class="container">
    <?php require_once 'components/nav.php'; ?>
    <div class="w-50 mx-auto my-5" id="formcontent">
      <form action="actions/update_restaurant_a.php" method="post" accept-charset="utf-8" id="insertform">
        <!-- hidden input to post id -->
        <input type="hidden" name="id" value="<?= $id ?>">
        <table class="table table-secondary">
          <tr>
            <th colspan="2">
              <h3 class="text-center">Update Restaurant</h3>
            </th>
          </tr>

          <tr>
            <td>Title</td>
            <td><input class="form-control" name="title" value="<?=$row['title'] ?>"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input class="form-control" name="address" value="<?=$row['address'] ?>"></td>
          </tr>
          <tr>
            <td>Homepage</td>
            <td><input class="form-control" name="www" value="<?=$row['www'] ?>"></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="description" class="w-100"><?=$row['description'] ?></textarea></td>
          </tr>
          <tr>
              <td>Local Image</td>
              <td><input class="form-control" name="image" value="<?=$row['image'] ?>"></td>
          </tr>
          <tr>
            <td>Kitchen</td>
            <td><input class="form-control" name="kitchen" value="<?=$row['kitchen'] ?>"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input class="form-control" name="phone" value="<?=$row['phone'] ?>"></td>
          </tr>
          <tr>
            <td></td>
            <td><button class="form-control btn-primary" type="submit">update</button></td>
          </tr>
        </table>
      </form>
    </div>
    <?php require_once 'components/footer.php' ?>
  </div>
</body>

</html>