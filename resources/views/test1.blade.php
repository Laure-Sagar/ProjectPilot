<!DOCTYPE html>
<html>
<head>
  <title>Modal Example</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Task</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="end-date">Deadline:</label>
                <input type="date" class="form-control" id="end-date" name="end-date">
              </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Select Members
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <form class="px-4 py-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="member1" id="member1">
                      <label class="form-check-label" for="member1">
                        Member 1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="member2" id="member2">
                      <label class="form-check-label" for="member2">
                        Member 2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="member3" id="member3">
                      <label class="form-check-label" for="member3">
                        Member 3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="member4" id="member4">
                      <label class="form-check-label" for="member4">
                        Member 4
                      </label>
                    </div>
                  </form>
                  <div class="dropdown-divider"></div>
                  <button class="dropdown-item" type="button">Add Selected Members</button>
                </div>
              </div>
              
            {{-- <div class="form-group">
                <label for="members">Add Member:</label>
                <select class="form-control" id="members" multiple>
                  <option>Member 1</option>
                  <option>Member 2</option>
                  <option>Member 3</option>
                  <option>Member 4</option>
                  <option>Member 5</option>
                </select>
              </div> --}}
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
