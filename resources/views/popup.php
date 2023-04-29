<!DOCTYPE html>
<html>

<head>
  <title>Modal Example</title>
  <!-- Tailwind CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css">
</head>

<body class="bg-gray-100">
  <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- The Modal -->
  <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M1.39 1.393l15.173 15.173m0-15.173L1.393 16.566" />
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Modal Header -->
      <div class="modal-header py-3 px-4 border-b border-gray-300">
        <h4 class="text-xl font-bold text-gray-700">Add Task</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body py-4 px-4">
        <form>
          <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="name">Name:</label>
            <input type="text" class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" id="name">
          </div>
          <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="description">Description:</label>
            <textarea class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" id="description"></textarea>
          </div>
          <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="end-date">Deadline:</label>
            <input type="date" class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" id="end-date" name="end-date">
          </div>
          <div class="mb-4">
            <div class="relative inline-block w-full text-gray-700">
              <button class="py-2 px-4 rounded inline-flex items-center">
                <span class="mr-1">Select Members</span>
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5 8l5 5 5-5z" />
                </svg>
              </button>
              <ul class="absolute hidden text" </ul>
            </div>
          </div>
          <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="priority">Priority:</label>
            <select class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" id="priority">
              <option>High</option>
              <option>Medium</option>
              <option>Low</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="status">Status:</label>
            <select class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" id="status">
              <option>Not Started</option>
              <option>In Progress</option>
              <option>Completed</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="attachment">Attachment:</label>
            <input type="file" class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" id="attachment">
          </div>
          <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2" for="comment">Comment:</label>
            <textarea class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" id="comment"></textarea>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>

</html>