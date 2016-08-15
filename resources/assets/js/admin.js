$(document).ready(function(){
	$('#checkAll').click(function () {    
	    $("input[name='check']").prop('checked', this.checked);    
	});

	$("form").validate({
    
        // Specify the validation rules
        rules: {
            title: "required",
            desc: "required",
            email: {
                required: true,
                email: true
            },
        },
        
        // Specify the validation error messages
        messages: {
            title: "Please enter title",
            desc: "Please enter desc",
            email: "Please enter a valid email address",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });
});