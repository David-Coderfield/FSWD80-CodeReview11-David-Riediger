<?php
session_start();

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  require_once 'actions/dbconnect.php';

  $sql = "SELECT * FROM `locations`
  INNER JOIN `concerts` ON concerts.location_id=locations.id
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
      <form action="actions/update_concert_a.php" method="post" accept-charset="utf-8" id="insertform">
        <!-- hidden input to post id -->
        <input type="hidden" name="id" value="<?= $id ?>">
        <table class="table table-secondary">
          <tr>
            <th colspan="2">
              <h3 class="text-center">Update Concert</h3>
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
            <td>Date</td>
            <td><input type="date" class="form-control" name="date" value="<?=$row['date'] ?>"></td>
          </tr>
          <tr>
            <td>Time</td>
            <td><input type="time" class="form-control" name="time" value="<?=$row['time'] ?>"></td>
          </tr>
          <tr>
            <td>Ticket Price</td>
            <td><input class="form-control" name="ticket" value="<?=$row['ticket'] ?>"></td>
          </tr>
          <tr>
            <td></td>
            <td><button class="form-control btn-success" type="submit" name="submitBtn">update</button></td>
          </tr>
        </table>
      </form>
    </div>
    <?php require_once 'components/footer.php' ?>
  </div>
</body>

</html>