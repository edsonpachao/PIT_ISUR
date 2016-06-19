<script type='text/javascript' language="javascript">
        function habilitar(value)
        {
            if(value=="1")
            {
                // habilitamos
             	document.getElementById("dni").disabled=false;
             	document.getElementById("ruc").disabled=true;
             	document.getElementById("company_name").disabled=true;
             	document.getElementById("first_name").disabled=false;
             	document.getElementById("last_name").disabled=false;
                document.getElementById("account_number").disabled=true;

            }else if(value=="0"){
                // deshabilitamos
             
                document.getElementById("dni").disabled=true;
                document.getElementById("ruc").disabled=false;
                document.getElementById("company_name").disabled=false;
                document.getElementById("first_name").disabled=true;
             	document.getElementById("last_name").disabled=true;
             	document.getElementById("account_number").disabled=false;
               
            }
        }
</script>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_tpcustomer').':', 'tpcustomer',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_radio(array(
		'name'=>'tpcustomer',
		'type'=>'radio',
		'id'=>'tpcustomer',
		'value'=>'1',
		'onchange' => "habilitar(this.value);",
		'checked'=>$person_info->tpcustomer === '1')
				
		);
	echo '&nbsp;' . $this->lang->line('common_person_natural') . '&nbsp;';
	echo form_radio(array(
		'name'=>'tpcustomer',
		'type'=>'radio',
		'id'=>'tpcustomer',
		'value'=>'0',
		'onchange' => "habilitar(this.value);",
		'checked'=>$person_info->tpcustomer === '0')
		
		);
	echo '&nbsp;' . $this->lang->line('common_person_juridic');
	?>
	</div>
</div>





<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_dni').':', 'dni',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'disabled' =>'true',
		'name'=>'dni',
		'id'=>'dni',
		'maxlength'=>'8',
		'class'=>'dni',	
		'value'=>$person_info->dni)
	);?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_ruc').':', 'ruc',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'disabled' =>'true',
		'name'=>'ruc',
		'id'=>'ruc',
		'maxlength'=>'11',
		'class'=>'ruc',	
		'value'=>$person_info->ruc)
	);?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_razonsocial').':', 'company_name',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'company_name',
		'id'=>'company_name',
		'disabled' =>'true',	
		'value'=>$person_info->company_name)
	);?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('customers_account_number').':', 'account_number',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'account_number',
		'id'=>'account_number',
		'class'=>'account_number',
		'disabled' =>'true',		
		'value'=>$person_info->account_number)
	);?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_first_name').':', 'first_name',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'first_name',
		'id'=>'first_name',
		'disabled' =>'true',	
		'value'=>$person_info->first_name)
	);?>
	</div>
</div>


<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_last_name').':', 'last_name',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'last_name',
		'id'=>'last_name',
		'disabled' =>'true',	
		'value'=>$person_info->last_name)
	);?>
	</div>
</div>


<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_email').':', 'email',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'email',
		'id'=>'email',
		'value'=>$person_info->email)
	);?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_phone_number').':', 'phone_number',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'phone_number',
		'id'=>'phone_number',
		'value'=>$person_info->phone_number));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_address_1').':', 'address_1',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'address_1',
		'id'=>'address_1',
		'value'=>$person_info->address_1));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_address_2').':', 'address_2'); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'address_2',
		'id'=>'address_2',
		'value'=>$person_info->address_2));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_city').':', 'city',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'city',
		'id'=>'city',
		'value'=>$person_info->city));?>
	</div>
</div>




<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_country').':', 'country',array('class'=>'required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'country',
		'id'=>'country',
		'value'=>$person_info->country));?>
	</div>
</div>


<script type='text/javascript' language="javascript">
//validation and submit handling
$(document).ready(function()
{
	nominatim.init({
		fields : {
			postcode : {  
				dependencies :  ["postcode", "city", "state", "country"], 
				response : {  
					field : 'postalcode', 
					format: ["postcode", "village|town|hamlet|city_district|city", "state", "country"] 
				}
			},
	
			city : {
				dependencies :  ["postcode", "city", "state", "country"], 
				response : {  
					format: ["postcode", "village|town|hamlet|city_district|city", "state", "country"] 
				}
			},
	
			state : {
				dependencies :  ["state", "country"]
			},
	
			country : {
				dependencies :  ["state", "country"] 
			}
			
		},
		language : '<?php echo $this->config->item('language');?>'
	});

});
</script>