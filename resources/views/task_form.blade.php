<!DOCTYPE html>
<html>
<head>
  <title>Task Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    label {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Task Form</h2>
    <form>
      {{-- <script>
        let task-id = 1
        </script> --}}
      <div class="form-group">
        <label for="task-id">ID:</label>
        <input type="text" class="form-control" id="task-id" name="task-id" readonly>
      </div>
      <div class="form-group">
        <label for="task-name">Task Name:</label>
        <input type="text" class="form-control" id="task-name" name="task-name">
      </div>
      <div class="form-group">
        <label for="task-description">Task Description:</label>
        <textarea class="form-control" id="task-description" name="task-deescription" rows="3"></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="task-duration-months">Duration (months):</label>
          <input type="number" class="form-control" id="task-duration-months" name="task-duration-months" min="0">
        </div>
        <div class="form-group col-md-6">
          <label for="task-duration-days">Duration (days):</label>
          <input type="number" class="form-control" id="task-duration-days" name="task-duration-days" min="0">
        </div>
      </div>
      <div class="form-group">
        <label>Dependencies Task ID:</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task-dependencies[]" id="dependency1" value="dependency1">
          <label class="form-check-label" for="dependency1">
            Task 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task-dependencies[]" id="dependency2" value="dependency2">
          <label class="form-check-label" for="dependency2">
            Task 2
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task-dependencies[]" id="dependency3" value="dependency3">
          <label class="form-check-label" for="dependency3">
            Task 3
          </label>
        </div>
      </div>
    </form>
  </div>
  <div class = "button">
    <form>
        <button type="button" class="btn btn-primary mx-auto d-block" id="add-task-button">+ Add another task</button>
      <button type="submit" class="btn btn-primary float-right" >Submit</button>
    </form>
</div>
  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom JavaScript -->
  <script>
    // let task-id = 1;
    $(document).ready(function() {
      let taskId = 1;
      // Handle click on "Add another task" button
      $('#add-task-button').click(function() {
        taskId++;
        // Clone the first form and append it to the container
        $('.container').append($('.container form:first').clone());
      })
    })
    </script>
 
</body>
</html>
