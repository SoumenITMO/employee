$(document).ready(function()
{
	/// All variables 
	
	var err_msg 	   = "";
	var end_time	   = null;
	var task_date 	   = null;
	var start_time	   = null;
	var task_details   = null;
	var employee_html  = null;
	var employee_name  = null;
	var employee_tasks = null;	
	
	/// Initilization of datepicker 
	
	$('#datetimepicker1').datepicker({
		format: "DD, MM d, yyyy",
	}).on('changeDate', function(e) 
	{
		task_date = e.format();
	});
	
	/// Start Time 
	
	$('.clockpicker-start').clockpicker(
	{
		autoclose: true,

	}).on("change",function(e)
	{
		start_time = $(".clockpicker-start").val();
	});
	/////
	 
	
	/// End Time 
	
	$('.clockpicker-end').clockpicker(
	{
		autoclose: true,

	}).on("change",function(e)
	{
		end_time = $(".clockpicker-end").val();
	});
	/////
	
	
	/// Add employee task event handler 
	
	$(".add-employee").on("click",function()
	{
		employee_name = $(".employee-name").val();
		task_details  = $(".task-desc").val();
		
		// employee_name -> Employee Name
		// task_date 	 -> Task Scheduled on 
		// start_time 	 -> Task Start time
		// end_time 	 -> Task End on 
		// task_details  -> Task details 
		
		
		if(employee_name != "" && task_date != "" && start_time != "" && end_time != "" && task_details != "")
		{
			add_employee_task(employee_name, task_date, start_time, end_time, task_details);			
		}
		
		else
		{
			$(".info").html("Invalid Input");
			$(".info-span").fadeIn(300).fadeOut(3000);
		}
	});
	///// 
	
	//// Function to send data to API to save the task for employee
	function add_employee_task(employee_name, task_date, start_date, end_date, task_description)
	{
		var post_data = {"employee_name":employee_name, "task_scheduled_on":task_date, "start_time":start_date, "end_time":end_date, "description":task_description};
		$.ajax(
		{
			'type':'POST',
			url : 'api/save_task',
			data : post_data,
			success : function(data)
			{
				if(data.response != undefined)
				{
					if(data.response == 0)
					{
						$(".info-span").fadeIn(300).fadeOut(3000);
					}
					
					if(data.response == 2)
					{
						$(".info").html("Invalid Time");
						$(".info-span").fadeIn(300).fadeOut(3000);
					}
				}
				
				else
				{
					employee_table(data);	 //// Fill Employee table 
					$(".info-span").fadeIn(300).fadeOut(3000);
					$(".info").html("Task successfully added.");
					$(".employee-name").val(null);
					$(".task-date").val(null);
					$(".clockpicker-start").val(null);
					$(".clockpicker-end").val(null);
					$(".task-desc").val(null);
				}
			},
			 
			error: function(data)
			{
				var errors = data.responseJSON;

				$.each(errors.errors, function(i,v)
				{
					if(v[0].length > 0)
						err_msg += v[0]+"</br>";
				});
				
				$(".info").html(err_msg);
				$(".info-span").fadeIn(300).fadeOut(3000);
				err_msg = "";
			}
		});
	}
	/// End of the function  
	
	//// Get all the employee task data 
	$.ajax({
			//'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			'type':'GET',
			 url : '/testTask/employee/public/api/all_task',
			 
			 success : function(data)
			 {
				 employee_table(data);   //// Fill Employee table 
			 }
	});
	//////////
	
	//// Fill Employee Table
	function employee_table(emp_data)
	{
		var employee_html = null;
		$(".employee-html").html("");
		$.each(emp_data, function(index, value)
		{
			employee_html += '<tr>';
			employee_html += '<td>'+value.employee+'</td>';
			employee_html += '<td>'+value.date+'</td>';
			employee_html += '<td>'+value.start_time+'</td>';
			employee_html += '<td>'+value.end_time+'</td>';
			employee_html += '<td>'+value.task_description+'</td>';
			employee_html += '</tr>';
		});
		 
		$(".employee-html").html(employee_html);
		employee_html = null;
	}
	////
});