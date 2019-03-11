<?php /* F:\xampp11\htdocs\task_complete\employee\resources\views/employee_tasks.blade.php */ ?>
<html>
    <head>
        <title>Employee Task List</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="<?php echo e(asset('css/employee.css')); ?>" rel="stylesheet"/>
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/employee_task_display.js')); ?>"></script>
		
	</head>
	
    <body>
		<div class="container">
			<!--- Employee Display Section --->
			<div class="employee-lst">
				<span class="caption-1">
					<h3> Employee's Task List </h3>
					<!--- Employee Task Display Html --> 
					<table class="table">
					
						<thead>
							<tr>
								<th scope="col">Employee</th>
								<th scope="col">Date</th>
								<th scope="col">From</th>
								<th scope="col">To</th>
								<th scope="col">Description</th>
							</tr>
						</thead>
						
						<tbody class="employee-html">
								
						</tbody>
					</table>
					<span class="task-adding">
					<button type="button" class="btn btn-primary" onclick="javascript:window.location='index.php'">Add Task</button>
				</span>
				</span>
			</div>
			<!--------------------------------->
			
		</div>
		
	</body>
</html>	