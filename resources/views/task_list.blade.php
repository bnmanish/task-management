<div class="task-list-container">
	<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js"></script>
	<table border="1">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>priority</th>
				<th>Action</th>
			<tr>
		</thead>
		<tbody id="task-list">
			@foreach($tasks as $task)
			<tr id="rowid-{{$task->id}}">
				<td><i class="fa-solid fa-grip-vertical"></i></td>
				<td>{{$task->name}}</td>
				<td>{{$task->priority}}</td>
				<td>
					<a href="javascript:;" onclick="editTask({{$task->id}},'{{$task->name}}','{{$task->priority}}')"><i class="fa-solid fa-pen-to-square"></i></a>
					<a href="javascript:;" onclick="deleteTask({{$task->id}})"><i class="fa-solid fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<div id="edit-task-popup" style="display:none;" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.5);">
	        <input type="hidden" name="id" id="edit-task-id">
	        <label>Name</label>
	        <input type="text" name="name" id="edit-task-name">
	        <br><br>
	        <label>Priority</label>
	        <input type="number" name="priority" id="edit-task-priority">
	        <br><br>
	        <button type="button" onclick="updatePopup()">Update</button>
	        <button type="button" onclick="closeEditPopup()">Cancel</button>
	</div>

	<script>
	$('#task-list').sortable({
        update: function () {
            let order = [];
            $('#task-list tr').each(function (index) {
                order.push({
                    id: $(this).attr('id').replace('rowid-', ''),
                    priority: index + 1
                });
            });
            $.ajax({
                url: "{{ route('update.task.order') }}",
                type: "POST",
                data: {
                    order: order,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log(response);
                    getTaskList();
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }
    });

	function deleteTask(id){
		$.ajax({
            url: "{{ route('delete.task') }}",
            type: "POST",
            data: {_token: "{{ csrf_token() }}",id: id},
            success: function (response) {
                console.log(response);
                if(response.status == true){
                	// getTaskList();
                	$('#rowid-'+id).hide();
                }else{
	        		alert('something went wrong!');
	        	}
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
	}

	function editTask(id,name,priority)
	{

		
        $('#edit-task-popup').show();
        $('#edit-task-id').val(id);
        $('#edit-task-name').val(name);
        $('#edit-task-priority').val(priority);

	    
	}

	function updatePopup(){
		var id = $('#edit-task-id').val();
        var name = $('#edit-task-name').val();
        var priority = $('#edit-task-priority').val();

		$.ajax({
	        url: "{{route('update.task')}}",
	        type: "POST",
	        data: {_token: "{{ csrf_token() }}",id:id,name:name,priority:priority},
	        success: function(response) {
	        	if(response.status == true){
	        		getTaskList();
	            	$('#edit-task-popup').hide();
	        	}else{
	        		alert('something went wrong!');
	        	}
	        },
	        error: function(xhr){
	            console.log(xhr);
	        }
	    });
	}

	function closeEditPopup(){
		$('#edit-task-popup').hide();
	}

	</script>
</div>