<style>
 
 /* Basic styles for the dashboard layout */
.dashboard {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    font-family: Arial, sans-serif;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.user-info {
    display: flex;
    align-items: center;
    margin-left:10px;
}

.logout {
    margin-left: 700px;
    background-color:red;
    border:none;
    border-radius:10px;
    width:100px;
    height:20px;
 
}
.logout:hover
{
    cursor: pointer;
   
}
.add
{
    margin-left:10px;
    background-color:#15ff5a;
    border:none;
    border-radius:10px;
    width:150px;
    height:20px;

}

.date {
    font-size: 14px;
}

.details table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.details th, .details td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

.bottom-section {
    display: flex;
    justify-content: space-between;
}

.box {
    width: 23%;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.box h3 {
    margin-bottom: 10px;
    font-size: 16px;
}

.box p {
    font-size: 14px;
    line-height: 1.5;
}
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page -Task Manager</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="dashboard">
    <div class="header">
        <div class="user-info">
            
              @if(Session::has('AuthClient'))
              <p>Hey,{{ Session::get('AuthClient') }}</p>
             @else
               <script>
                window.location.href = "/401";
               </script> 
            @endif

           

             
            <button class="add" id="openPopup">Add Task</button>  

            <div id="popup" class="popup">
             <div class="popup-content">
              <span class="close" id="closePopup">&times;</span>
               <h2>Add Task Details</h2>
                 <form id="taskForm" class="task-form" method="post" action="/AddTask">
                    @csrf
                     <label for="userid">User id</label>
                     <input type="text" name="userid" value="{{$userfetch->id}}" readonly>
                     <label for="taskDescription">Your Task:</label>
                     <textarea id="taskDescription" name="taskDescription" required></textarea>
                     <label for="taskDate">Date:</label>
                     <input type="date" id="taskDate" name="taskDate" required>
                     <input type="submit" value="Add Task">
                 </form>
                </div>
             </div>

             <script>
             document.getElementById('openPopup').addEventListener('click', function() {
              document.getElementById('popup').style.display = 'block';
            });

            document.getElementById('closePopup').addEventListener('click', function() {
              document.getElementById('popup').style.display = 'none';
            });

         </script>

            <a href="/logout"><button class="logout">Logout</button></a>
            
        </div>
        @if(Session::has('message'))
         <script>
             swal('Done',"{!!Session::get('message')!!}",'success');
         </script>
    @endif 
        
    </div>
    <div class="details">
        <form method="post">
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Change</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clientTasks as $clientTask)
               
                <tr>
                    <td>#</td>
                    <td>{{$clientTask->Task}}</td>
                    <td>{{$clientTask->Date}}</td>
                    <td id="task1Status"> 
                         @if($clientTask->Status==1)
                          <span style="color:red" class="taskItem">Pending</span>
                         @else
                          <span style="color:green";>Completed</span>
                        @endif      
                        
                    </td>
                    <td><a href="/update/{{$clientTask->id}}" style="text-decoration:none;" >Change</a></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
            @endforeach
        </table>    
        </form>
    </div>
    <div class="bottom-section">
        <div class="box">
            @foreach($res as $tskt)
            <h3>Current Date:- {{$tskt->Date}}</h3>
            <p>Total Task :-{{$tskt->count}}</p>
            @endforeach
        </div>
        <div class="box">
            @foreach($res as $t)
            <h3>Pending task Date :- {{$t->Date}}</h3>
            @endforeach

            @foreach($Count as $c)
            <p>Pending :-{{$c->Total_pending}} </p>
            @endforeach
        </div>
        <div class="box">
            <h3>Current Complete Task</h3>
               @foreach($res as $ck)
                 @foreach($Count as $ct)
                  <p>Completed :- {{$ck->count-$ct->Total_pending}}</p>
                 @endforeach 
               @endforeach     
        </div>
        <div class="box">
            @foreach($Prev as $r)
            <h3>Previous Day :- {{$r->Date}}</h3>
            <p>Pending Count :- {{$r->Total_pending}}</p>
          @endforeach 
        </div>
    </div>
</div>

@if(Session::has('success'))
            <script>
            swal('success',"{!!Session::get('success')!!}",'success');
            </script>
@endif

@if(Session::has('msg'))
            <script>
            swal('success',"{!!Session::get('msg')!!}",'success');
            </script>
@endif

    
</body>
</html>