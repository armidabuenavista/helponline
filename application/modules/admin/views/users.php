<?php $this->load->view('admin_header'); ?>	


<?php $this->load->view('admin_navbar'); ?>	
<script type="text/javascript">
$(document).ready(function() {
	 $("#users").load(base_url + 'admin/help/create_users');
	 	$(function() {
		$(document).on('change', '.user_type', function() {
			//$(".user_type").change(function(){
			var user_id = $(this).data("id");
			var user_type_id = $(this).val();
			//alert(user_id);
			$.ajax({
				type: "POST",
				url: base_url + 'admin/help/update_privilege',
				data: "id=" + user_id + "&user_type_id=" + user_type_id,
				success: function(html) {
					if (html == 'success') {
						alert('Privilege changed. Please make sure to logout to complete the process. Thank you!');
						//window.location='./logout.php';
					} else if (html == 'success1') {
						alert('Privilege changed. Thank you!');
					} else {
						alert('Error: Something is wrong when saving the data.');
					}
				},
			});
			//});
		});
	});
});	 	
</script>

<div id="users">

</div>
			
  
	

			
					
						
<?php $this->load->view('admin_footer'); ?>	
