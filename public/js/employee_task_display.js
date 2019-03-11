$(document).ready(function()
{	
	//// Get all the employee task data 
	$.ajax({
			//'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			'type':'GET',
			 url : 'api/all_task',
			 
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