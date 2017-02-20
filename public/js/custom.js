$(document).ready(function(){
	$('.add_product').on('submit',function(){
		var error = "";
		$('.error',this).remove();
		if($('.product_name',this).val()==""){
			$('.product_name',this).after('<div class="error">Please enter name</div>')
			error=1;
		}
		if($('.price',this).val()==""){
			$('.price',this).after('<div class="error">Please enter price</div>')
			error=1;
		}
		if($('.user_id :selected',this).val()==""){
			$('.user_id',this).after('<div class="error">Please select user</div>')
			error=1;
		}
		if(error==1)
			return false;
		else
			return true;
	})

	$('.add_user').on('submit',function(){
		var error = "";
		$('.error',this).remove();
		if($('.first_name',this).val()==""){
			$('.first_name',this).after('<div class="error">Please enter first name</div>')
			error=1;
		}
		if($('.last_name',this).val()==""){
			$('.last_name',this).after('<div class="error">Please enter last name</div>')
			error=1;
		}
		if($('.mobile',this).val()==""){
			$('.mobile',this).after('<div class="error">Please enter mobile number</div>')
			error=1;
		}
		if($('.email',this).val()==""){
			$('.email',this).after('<div class="error">Please enter email address</div>')
			error=1;
		}else{
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  			if(!emailReg.test($('.email',this).val())){
				$('.email',this).after('<div class="error">Please enter valid email address</div>')
				error=1;
			}	
		}
		if($('.password',this).val()==""){
			$('.password',this).after('<div class="error">Please enter password</div>')
			error=1;
		}
		if(error==1)
			return false;
		else
			return true;
	})
	
	$('.only_numeric').on('keypress',function(evt){
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;

	})
	
	$(".only_decimal").keydown(function (event) {

        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || 
            (event.keyCode >= 96 && event.keyCode <= 105) || 
            event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
            event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault(); 

    });
})

function editRecord(url,data){
	alert(url);
}