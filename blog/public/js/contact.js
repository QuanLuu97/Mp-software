
// function isEmail(emailStr)
// {
//     var pattern = /^([a-z]+)([a-zA-Z0-9_.-]+)([@]+)([a-z]+)([.]+)([a-z]{2,})$/;
//     return pattern.test(String(emailStr));
// }
$(document).ready(function(){	
	

	jQuery.validator.addMethod("isEmail", function(value, element){
		var pattern = /^([a-z]+)([a-zA-Z0-9_.-]+)\@([a-z]+)\.([a-zA-Z0-9]{2,})(|(\.[a-z]{2,}))$/;
								
		return (pattern.test(value));
	}, ""); // element la mess = ""
	$('#form-message').validate({
		rules: {
			name: {
				required:true,
				minlength:3,
			},
			subject:"required",
			message:"required",
			email: {
				required:true,
				isEmail:true,
				email:true
			},
		},
		messages: {
			name: {
				required:"không dược để trống",
				minlength:"tên phải từ 3 kí tự trở lên",
			},
			subject:"không dược để trống",
			message:"không được để trống",
			email: {
				required:"không được để trống",
				isEmail:"nhập đúng định dạng email",
				email:"nhập đúng định dạng email"
			}
		}	

	});	
	
    $('#submit').click(function(){
    	var check = $('#form-message').valid();
    	if(check){
    		var name = $('#name').val();
	        var email = $('#email').val();
	        var subject = $('#subject').val();
	        var message = $('#message').val();
	        var token = $('#token').val();
	        $.ajax({
	            url: "contact",
	            type:'post',
	            data :{
	                name:name,
	                email:email,
	                subject:subject,
	                message:message,
	                _token : token
	            },
	            success: function(res){
	                if (res.code == 200) {
	                    $('#result').html(res.msg);
	                } else $('#result').html(res.msg);
	            },
	            error: function(err){
	            	alert('lỗi cú pháp');
	            }
	        });
    	}
        
    })
});
