<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management</title>
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js"></script>
</head>
<body>
    <div style="width:800px;margin:auto;">
        <h1>Create a task</h1>
        <form method="post" action="{{route('add.task')}}">

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p style="color:red">{{$error}}</p>
                @endforeach
            @endif

            @if(session('message'))
                <p style="color:green">{{session('message')}}</p>
            @endif

            @csrf
            Projects : 
            <select name="project">
                @foreach($projects as $project)
                <option @if($project->id == old('project')) selected @endif value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
            <br>
            Name : <input type="text" name="name" value="{{old('name')}}">
            <br>
            Priority : <input type="number" name="priority" value="{{old('name')}}">
            <br>
            <button type="submit">Add task</button>
        </form>
    </div>
    <hr>

    <div style="width:800px;margin:auto;">
        <h1>Tasks List</h1>
        <select name="project" id="projects-dropdown" onchange="getTaskList()">
            @foreach($projects as $project)
            <option @if($project->id == old('project')) selected @endif value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>
        <br>
        <br>

        <div class="task-list-container"></div>

    </div>
<script>
function getTaskList(){
    var project = $('#projects-dropdown').val();
    $.ajax({
        url: "{{route('get.task.list')}}",
        type: 'POST',
        data: {'project' : project},
        success: function (response) {
            $('.task-list-container').replaceWith(response);
        }
    });
}
$(document).ready(function () {
    getTaskList(); // load task list on page load
});

</script>
</body>
</html>