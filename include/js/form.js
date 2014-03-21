$(document).ready(function (){
	

	$("#formorder, #regForm").validate({

       rules:{

            name:{
                required: true,
                minlength: 2,
                maxlength: 16,
            },

            email:{
                required: true,
            	email: true
            },
            phone:{
            	required: true,
            	minlength: 6,
                maxlength: 11,
                digits: true
            },
            surname: {
                required: true,
                minlength: 2,
                maxlength: 20,
            },
            password:{
                required: true,
                minlength: 6,
                maxlength: 20,
            },
            repassword:{
                required: true,
                minlength: 6,
                maxlength: 20,
            }
       },

       messages:{

            name:{
                required: "Это поле обязательно для заполнения",
                minlength: "Имя должно быть минимум 2 символа",
                maxlength: "Максимальное число символов - 16",
            },

            email:{
                required: "Это поле обязательно для заполнения",
                email: "Неверно заполнено поле электронной почты"
            },
            phone:{
                required: "Это поле обязательно для заполнения",
                minlength: "Телефон должен быть минимум 6 символов",
                maxlength: "Телефон должен быть максимум 11 символов",
                digits: "Только цифры"
            },

       }

    });
	$('#submitBtn').on('click', function(){
        
        if ($("#order_form form").validate()) {
            $("#order_form form").submit();
        }
    });

    $('#reg_submit').on('click', function(){
        // e.preventDefault();
		if ($("#reg_form form").validate()) {
			$("#reg_form form").submit();
		}
        else {

        }
	});


	var left1 = $(window).width()/2 - 275;
		var top1 = $(window).height()/2 - 86;
		$('#success_submit').css({'left':left1, 'top':top1});
	$(window).resize(function(){
		var left1 = $(window).width()/2 - 275;
		var top1 = $(window).height()/2 - 86;
		$('#success_submit').css({'left':left1, 'top':top1});
	});
    $(document).on('click', '.radio input', function(){
        if ($('#optionsRadios1:checked').length){
            $('#order_org_names').fadeIn();
        }
        else {
            $('#order_org_names').fadeOut();
        }
    });
    
});