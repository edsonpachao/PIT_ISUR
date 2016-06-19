<?php
echo form_open('customers/save/'.$person_info->person_id,array('id'=>'customer_form'));
?>
<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box" class="error_message_box"></ul>
<fieldset id="customer_basic_info">
<legend><?php echo $this->lang->line("customers_basic_information"); ?></legend>
<?php $this->load->view("people/form_basic_info"); ?>


<?php
echo form_submit(array(
	'name'=>'submit',
	'id'=>'submit',
	'value'=>$this->lang->line('common_submit'),
	'class'=>'submit_button float_right')
);
?>
</fieldset>
<?php 
echo form_close();
?>
<script type='text/javascript'>

//validation and submit handling
$(document).ready(function()
{

	$.validator.addMethod("account_number", function(value, element) 
	{
		return JSON.parse($.ajax(
		{
			  type: 'POST',
			  url: '<?php echo site_url($controller_name . "/check_account_number")?>',
			  data: {'person_id' : '<?php echo $person_info->person_id; ?>', 'account_number' : $(element).val() },
			  success: function(response) 
			  {
				  success=response.success;
			  },
			  async:false,
			  dataType: 'json'
        }).responseText).success;
        
    }, '<?php echo $this->lang->line("customers_account_number_duplicate"); ?>');


    $.validator.addMethod("dni", function(value, element) 
	{
		return JSON.parse($.ajax(
		{
			  type: 'POST',
			  url: '<?php echo site_url($controller_name . "/check_dni")?>',
			  data: {'person_id' : '<?php echo $person_info->person_id; ?>', 'dni' : $(element).val() },
			  success: function(response) 
			  {
				  success=response.success;
			  },
			  async:false,
			  dataType: 'json'
        }).responseText).success;
        
    }, '<?php echo $this->lang->line("customers_dni_duplicate"); ?>');

     $.validator.addMethod("ruc", function(value, element) 
	{
		return JSON.parse($.ajax(
		{
			  type: 'POST',
			  url: '<?php echo site_url($controller_name . "/check_ruc")?>',
			  data: {'person_id' : '<?php echo $person_info->person_id; ?>', 'ruc' : $(element).val() },
			  success: function(response) 
			  {
				  success=response.success;
			  },
			  async:false,
			  dataType: 'json'
        }).responseText).success;
        
    }, '<?php echo $this->lang->line("customers_ruc_duplicate"); ?>');



	$('#customer_form').validate({
		submitHandler:function(form)
		{
			$(form).ajaxSubmit({
			success:function(response)
			{
				tb_remove();
				post_person_form_submit(response);
			},
			dataType:'json'
		});

		},
		errorLabelContainer: "#error_message_box",
 		wrapper: "li",
		rules: 
		{
			tpcustomer: "required",
			first_name: "required",
			last_name: "required",
    		email: "email",
    		email: "required",
    		phone_number:"required",
    		address_1: "required",
    		city: "required",
    		country: "required",
    		company_name:"required",
    		dni: { required:true,number:true,dni:true},
    		ruc: { required:true,number:true,ruc:true},
    		account_number: "required",
    		account_number: { account_number: true }
   		},
		messages: 
		{
			tpcustomer: "<?php echo $this->lang->line('common_tpcustomer_required'); ?>",
			dni: 
			{
				required:"<?php echo $this->lang->line('common_dni_required'); ?>",
				number:"<?php echo $this->lang->line('customers_dni_number'); ?>",
			},
			ruc: 
			{
				required:"<?php echo $this->lang->line('common_ruc_required'); ?>",
				number:"<?php echo $this->lang->line('customers_ruc_number'); ?>",
			},
			company_name: "<?php echo $this->lang->line('common_razonsocial_required'); ?>",
			account_number: "<?php echo $this->lang->line('common_acount_number_required'); ?>",
     		first_name: "<?php echo $this->lang->line('common_first_name_required'); ?>",
     		last_name: "<?php echo $this->lang->line('common_last_name_required'); ?>",
     		email: "<?php echo $this->lang->line('common_email_invalid_format'); ?>",
     		email: "<?php echo $this->lang->line('common_email_required'); ?>",
     		phone_number: "<?php echo $this->lang->line('common_phone_number_required'); ?>",
     		address_1: "<?php echo $this->lang->line('common_address_1_required'); ?>",
     		city: "<?php echo $this->lang->line('common_city_required'); ?>",
     		country:"<?php echo $this->lang->line('common_country_required'); ?>"
		}
	});
});
</script>