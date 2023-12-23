<style>

/* Styles for the popup */
.popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
  z-index: 999;
}

.popup-content {
  background-color: white;
  width: 50%;
  max-width: 500px;
  margin: 10% auto;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  position: relative;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  font-size: 20px;
  color: #aaa;
}

.close:hover {
  color: #000;
}

/* Form styles */
.task-form label {
  display: block;
  margin-bottom: 5px;
}

.task-form input[type="text"],
.task-form textarea,
.task-form input[type="time"],
.task-form input[type="date"],
.task-form input[type="submit"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border-radius: 3px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.task-form input[type="submit"] {
  background-color: #007bff;
  color: white;
  cursor: pointer;
}

.task-form input[type="submit"]:hover {
  background-color: #0056b3;
}


</style>    


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Details</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<button id="openPopup">Add Task</button>

<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" id="closePopup">&times;</span>
    <h2>Add Task Details</h2>
    <form id="taskForm" class="task-form">
      <label for="userId">User ID:</label>
      <input type="text" id="userId" name="userId" required>
      <label for="taskDescription">Your Task:</label>
      <textarea id="taskDescription" name="taskDescription" required></textarea>
      <label for="taskTime">Time:</label>
      <input type="time" id="taskTime" name="taskTime" required>
      <label for="taskDate">Date:</label>
      <input type="date" id="taskDate" name="taskDate" required>
      <input type="submit" value="Add Task">
    </form>
  </div>
</div>

<script>
  // JavaScript to handle popup functionality (show/hide)
  document.getElementById('openPopup').addEventListener('click', function() {
    document.getElementById('popup').style.display = 'block';
  });

  document.getElementById('closePopup').addEventListener('click', function() {
    document.getElementById('popup').style.display = 'none';
  });

  document.getElementById('taskForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Handle form submission here
    // You can add code to collect form data and perform actions
    // For example, you can use JavaScript to process the form data or send it to a server.
  });
</script>

</body>
</html>
