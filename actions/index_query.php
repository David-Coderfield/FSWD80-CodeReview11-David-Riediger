<?php
session_start();

$searchbar = isset($_POST['searchbar']) ? $_POST['searchbar'] : '';
$searchbar = strip_tags($searchbar);
$searchbar = trim($searchbar);

require_once 'dbconnect.php';

$sql = "SELECT * FROM `locations`
LEFT JOIN `sights` ON sights.location_id=locations.id
LEFT JOIN `restaurants` ON restaurants.location_id=locations.id
LEFT JOIN `concerts` ON concerts.location_id=locations.id
WHERE title LIKE '%{$searchbar}%'";

$result = $conn->query($sql);
// print_r($result);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// print_r($rows);

//check if user is admin
$admin = false;
if (isset($_SESSION['role'])) {
	if ($_SESSION['role']==='admin') {
		$admin = true;
	}
}

if ($result->num_rows > 0) {
	foreach($rows as $row) {
		//generate admin buttons
		if ($admin) {
			$delete = "<a href='delete.php?id={$row['id']}' class='btn btn-danger mt-3'>Delete</a>";
			//link to ?id and ?tablename to enable $_GET in update_a.php by checking which table's PK the row has
			if ($row['sight_id']) {
				$update="<br><a href='update_sight.php?id={$row['id']}&tablename=sights' class='btn btn-primary mr-3 mt-3'>Update</a>";
			}
			else if ($row['concert_id']) {
				$update="<br><a href='update_concert.php?id={$row['id']}&tablename=concerts' class='btn btn-primary mr-3 mt-3'>Update</a>";
			}
			else if ($row['restaurant_id']) {
				$update="<br><a href='update_restaurant.php?id={$row['id']}&tablename=restaurants' class='btn btn-primary mr-3 mt-3'>Update</a>";
			}
			else $update = 'error'; //just in case
		}
		else {
			$update=''; $delete='';
		}

		// check optional columns
		$kitchen = (!$row['kitchen']) ? '' : "<li class='list-group-item'><i class='fas fa-utensils'></i> {$row['kitchen']}</li>";
    $phone = (!$row['phone']) ? '' : "<li class='list-group-item'><i class='fas fa-phone'></i> {$row['phone']}</li>";
    $datetime = (!$row['date'] || !$row['time']) ? '' : "<li class='list-group-item'><i class='far fa-calendar-alt'></i> {$row['date']}, ". substr($row['time'],0,-3) . "</li>";
    $ticket = (!$row['ticket']) ? '' : "<li class='list-group-item'><i class='fas fa-ticket-alt'></i> Tickets: {$row['ticket']}€</li>";

		echo "
<div class='col-12 col-md-6 col-xl-4 my-4'>
	<div class='card mx-auto' style='width: 20rem;'>
	  <img src='img/{$row['image']}' class='card-img-top' alt='image'>
	  <div class='card-body'>
	    <h5 class='card-title'>{$row['title']}</h5>
	    <p class='card-text'>{$row['description']}</p>
	  </div>
	  <ul class='list-group list-group-flush'>
	    <li class='list-group-item'><i class='fas fa-map-marker-alt'></i> {$row['address']}</li>
	    $kitchen
	    $phone
	    $datetime
	    $ticket
	  </ul>
	  <div class='card-body'>
	    <a href='{$row['www']}' class='card-link'><i class='fas fa-globe'></i> Visit</a>
	 			$update $delete
	  </div>
	</div>
</div>
";
	}
}

else {
	echo "Sorry, no results for this search.";
} 

$conn->close();

?>
