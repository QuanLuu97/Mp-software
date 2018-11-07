$(document).ready(function() {
	jQuery.validator.addMethod('isEmail', function(value){
		var pattern = /^([a-zA-Z]+)([a-zA-Z0-9_]*)(\@)([a-zA-Z0-9]+)(\.)([a-zA-Z0-9]{2,})$/;
		return (pattern.test(value));
	});
	$("#form-mess").validate({
		rules: {
			name:{
				required:true,
				minlength:3
			},
			email:{
				required:true,
				email:true,
				isEmail : true
			},
			subject: 'required',
			message: 'required'
		},
		messages: {
			name:{
				required: 'không được để trống',
				minlength: 'name phải ít nhất 3 kí tự',
			},
			email:{
				required: 'không được để trống',
				email:'không đúng định dạng',
				isEmail: 'không đúng định dạng',
			},
			subject: 'không được để trống',
			message: 'không được để trống'
		}
	});

	$('#buttonForm').click(function(){
		var check = $('#form-mess').valid();
		var token = $('#token').val();
		if(check == true){
			$.ajax({
				url: "{{ route('store') }}",
				type: 'post',
				data:{
					name:$('#name').val(),
					email:$('#email').val(),
					subject:$('#subject').val(),
					message:$('#message').val(),
					_token:token
				},
				
				success:function(res){
					alert(res.msg);
				}
			});
		}
	});
	
});