<?php /* F:\xampp11\htdocs\testTask\employee\resources\views/index.blade.php */ ?>
<html>
    <head>
        <title>Employee Task</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
		<link href="<?php echo e(asset('css/employee.css')); ?>" rel="stylesheet"/>

		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.js"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/employee.js')); ?>"></script>
		
	</head>
	
    <body>
		<div class="container">
			<span class="info-span"> <h3 class="info"> Already Busy in other task. </h3> </span>
			
			<form>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Employee</label>
						<input type="text" class="form-control employee-name" id="employee_name" placeholder="Employee Name">
					</div>

					<div class="form-group col-md-6">
						<label for="inputPassword4">Date</label>
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control task-date" placeholder="Pick Task Date"/>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div>
					</div>
					
					<div class="form-group col-md-6">
						<label for="inputPassword4">Start Time</label>
							<div class="input-group">
							<input type="text" class="form-control clockpicker-start" placeholder="Pick Start Time">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-time"></span>
								</span>
							</div>
					</div>
					
					<div class="form-group col-md-6">
						<label for="inputPassword4">End Time</label>
							<div class='input-group'>
							<input type='text' class="form-control clockpicker-end" placeholder="Pick End Time"/>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
					</div>
					
					<div class="form-group col-md-6">
						<label for="inputEmail4">Task Description</label>
						<input type="text" class="form-control task-desc" id="employee_name" placeholder="Task Description">
					</div>
					
				</div>
				<button type="button" class="btn btn-primary add-employee">Add</button>
			</form>
			<button type="button" class="btn btn-primary" onclick="javascript:window.location='tasks'">Display Tasks</button>
		</div>
	</body>
</html>	