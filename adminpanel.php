<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'components/head.php' ?>
</head>

<body>
  <div class="container">
    <?php require_once 'components/nav.php'; ?>
    <div class="w-50 mx-auto my-5" id="formcontent">
      <form action="actions/insert_a.php" method="post" accept-charset="utf-8" id="insertform">
        <table class="table table-secondary">
          <tr>
            <th colspan="2">
              <h3 class="text-center">New Item</h3>
              <h6>Could do so much more here, but for now it's just the page for inserting...</h6>
              <h6>Select a table and see it change. Also try the dummy button :)</h6>
            </th>
          </tr>
          <tr>
            <td>Select Table</td>
            <td>
              <select class="form-control" id="tableselect" name="tablename">
                <option value="sights">Sights</option>
                <option value="concerts">Concerts</option>
                <option value="restaurants" selected="selected">Restaurants</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Title</td>
            <td><input class="form-control" name="title"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input class="form-control" name="address"></td>
          </tr>
          <tr>
            <td>Homepage</td>
            <td><input class="form-control" name="www"></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="description" class="w-100"></textarea></td>
          </tr>
          <tr>
          		<td>Local Image</td>
          		<td><input class="form-control" name="image"></td>
          <tr>
            <td>Kitchen</td>
            <td><input class="form-control" name="kitchen"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input class="form-control" name="phone"></td>
          </tr>
          <tr>
            <td><button class="form-control" type="button" id="dummyBtn">dummy</button></td>
            <td><button class="form-control btn-success" type="submit" name="submitBtn">create</button></td>
          </tr>
        </table>
      </form>
    </div>
    <?php require_once 'components/footer.php' ?>
  </div>
  <script>
  function addEvent() {
    document.getElementById('tableselect').addEventListener('change', changeform);
    document.getElementById('dummyBtn').addEventListener('click', dummy);
  }
  addEvent();

  function changeform() {
    var table = this.value;
    console.log(table);

    switch (table) {
      case 'sights':
        sights();
        break;
      case 'concerts':
        concerts();
        break;
      case 'restaurants':
        restaurants();
        break;
    }
  }

  function sights() {
    var html = `<form action="actions/insert_a.php" method="post" accept-charset="utf-8" id="insertform">
        <table class="table table-secondary">
          <tr>
            <th colspan="2">
              <h3 class="text-center">New Item</h3>
            </th>
          </tr>
          <tr>
            <td>Select Table</td>
            <td>
              <select class="form-control" id="tableselect" name="tablename">
                <option value="sights" selected="selected">Sights</option>
                <option value="concerts">Concerts</option>
                <option value="restaurants">Restaurants</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Title</td>
            <td><input class="form-control" name="title"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input class="form-control" name="address"></td>
          </tr>
          <tr>
            <td>Homepage</td>
            <td><input class="form-control" name="www"></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="description" class="w-100"></textarea></td>
          </tr>
          <tr>
          	<td>Local Image</td>
          	<td><input class="form-control" name="image"></td>
          <tr>
            <td>Sight type</td>
            <td><input class="form-control" name="type"></td>
          </tr>
          <tr>
            <td><button class="form-control" type="button" id="dummyBtn">dummy</button></td>
            <td><button class="form-control btn-success" type="submit" name="submitBtn">create</button></td>
          </tr>
        </table>
      </form>`;
    document.getElementById('formcontent').innerHTML = html;
    addEvent();
  }

  function concerts() {
    var html = `<form action="actions/insert_a.php" method="post" accept-charset="utf-8" id="insertform">
        <table class="table table-secondary">
          <tr>
            <th colspan="2">
              <h3 class="text-center">New Item</h3>
            </th>
          </tr>
          <tr>
            <td>Select Table</td>
            <td>
              <select class="form-control" id="tableselect" name="tablename">
                <option value="sights">Sights</option>
                <option value="concerts" selected="selected">Concerts</option>
                <option value="restaurants">Restaurants</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Title</td>
            <td><input class="form-control" name="title"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input class="form-control" name="address"></td>
          </tr>
          <tr>
            <td>Homepage</td>
            <td><input class="form-control" name="www"></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="description" class="w-100"></textarea></td>
          </tr>
          <tr>
          	<td>Local Image</td>
          	<td><input class="form-control" name="image"></td>
          <tr>
            <td>Date</td>
            <td><input type="date" class="form-control" name="date"></td>
          </tr>
          <tr>
            <td>Time</td>
            <td><input type="time" class="form-control" name="time"></td>
          </tr>
          <tr>
            <td>Ticket Price</td>
            <td><input class="form-control" name="ticket"></td>
          </tr>
          <tr>
            <td><button class="form-control" type="button" id="dummyBtn">dummy</button></td>
            <td><button class="form-control btn-success" type="submit" name="submitBtn">create</button></td>
          </tr>
        </table>
      </form>`;
    document.getElementById('formcontent').innerHTML = html;
    addEvent();
  }

  function restaurants() {
    var html = `<form action="actions/insert_a.php" method="post" accept-charset="utf-8" id="insertform">
        <table class="table table-secondary">
          <tr>
            <th colspan="2">
              <h3 class="text-center">New Item</h3>
            </th>
          </tr>
          <tr>
            <td>Select Table</td>
            <td>
              <select class="form-control" id="tableselect" name="tablename">
                <option value="sights">Sights</option>
                <option value="concerts">Concerts</option>
                <option value="restaurants selected="selected"">Restaurants</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Title</td>
            <td><input class="form-control" name="title"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input class="form-control" name="address"></td>
          </tr>
          <tr>
            <td>Homepage</td>
            <td><input class="form-control" name="www"></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="description" class="w-100"></textarea></td>
          </tr>
          <tr>
          	<td>Local Image</td>
          	<td><input class="form-control" name="image"></td>
          <tr>
            <td>Kitchen</td>
            <td><input class="form-control" name="kitchen"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input class="form-control" name="phone"></td>
          </tr>
          <tr>
            <td><button class="form-control" type="button" id="dummyBtn">dummy</button></td>
            <td><button class="form-control btn-success" type="submit" name="submitBtn">create</button></td>
          </tr>
        </table>
      </form>`;
    document.getElementById('formcontent').innerHTML = html;
    addEvent();
  }

  function dummy() {
    var inputs = document.getElementsByTagName('input');
    var textareas = document.getElementsByTagName('textarea');
    for (let i = 0; i < inputs.length; i++) {
			inputs[i].value="test test test";
    }
    textareas[0].value="test test test";
    
  }
  </script>
</body>

</html>