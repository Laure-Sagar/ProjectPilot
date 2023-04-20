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
    <form action="/board/{{auth()->user()->current_team_id}}/create" method="POST">
      @csrf
      {{-- <script>
        let task-id = 1
        </script> --}}
      <div class="form-group">
        <label for="task-name">Task Name:</label>
        <input type="text" class="form-control" id="task_name" name="task_name">
      </div>
      <div class="form-group">
        <label for="task-description">Task Description:</label>
        <textarea class="form-control" id="task-description" name="task_description" rows="3"></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="task-duration-days">Duration (days):</label>
          <input type="number" class="form-control" id="task_days" name="task_days" min="0">
        </div>
      </div>
      <div class="form-group">
        <label>Dependencies Task ID:</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="dependency1" value="task1">
          <label class="form-check-label" for="dependency1">
            Task 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="dependency2" value="task2">
          <label class="form-check-label" for="dependency2">
            Task 2
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="dependency3" value="task3">
          <label class="form-check-label" for="dependency3">
            Task 3
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="dependency4" value="task4">
          <label class="form-check-label" for="dependency1">
            Task 4
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="dependency5" value="task5">
          <label class="form-check-label" for="dependency2">
            Task 5
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="dependency6" value="task6">
          <label class="form-check-label" for="dependency3">
            Task 6
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="task_dependencies[]" id="dependency6" value="task7">
          <label class="form-check-label" for="dependency3">
            Task 7
          </label>
        </div>
      </div>
  </div>
  <div class = "button">
        {{-- <button type="button" class="btn btn-primary mx-auto d-block" id="add-task-button">+ Add another task</button> --}}
      <input type="submit" value="Save" class="btn btn-primary float-right">
</div>
</from>
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
