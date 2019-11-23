var request;

//form load
$("#form").ready(function(event) {
  if (request) {
    request.abort(); // Abort any pending request
  }
  // AJAX
  request = $.ajax({
    url: "actions/events_query.php",
    type: "post",
    data: ""
  });

  // Callback handler that will be called on success
  request.done(function(response, textStatus, jqXHR) {
    //response
    document.getElementById('content').innerHTML = response;
  });

  // Callback handler that will be called on failure
  request.fail(function(jqXHR, textStatus, errorThrown) {
    // Log the error to the console
    console.error(
      "The following error occurred: " +
      textStatus, errorThrown
    );
  });
});

//form keyup
$("#form").keyup(function(event) {
  event.preventDefault(); // Prevent default posting of form - put here to work in case of errors
  if (request) {
    request.abort(); // Abort any pending request
  }
  var $form = $(this); // setup some local variables
  var $inputs = $form.find("input, select, button, textarea"); // Let's select and cache all the fields
  var serializedData = $form.serialize(); // Serialize the data in the form

  // Disable the inputs for the duration of the Ajax request.
  // Note: we disable elements AFTER the form data has been serialized.
  // Disabled form elements will not be serialized.
  $inputs.prop("disabled", true);

  // AJAX
  request = $.ajax({
    url: "actions/events_query.php",
    type: "post",
    data: serializedData
  });

  // Callback handler that will be called on success
  request.done(function(response, textStatus, jqXHR) {
    // response
    document.getElementById('content').innerHTML = response;
  });

  // Callback handler that will be called on failure
  request.fail(function(jqXHR, textStatus, errorThrown) {
    // Log the error to the console
    console.error(
      "The following error occurred: " +
      textStatus, errorThrown
    );
  });

  // Callback handler that will be called regardless
  // if the request failed or succeeded
  request.always(function() {
    // Reenable the inputs
    $inputs.prop("disabled", false);
  });
});