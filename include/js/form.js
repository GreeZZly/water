$(document).ready(function (){
	
//, #regForm"
	$("#formorder").validate({ 

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
            adress: {
                required: true,
                // minlength: 2,
                // maxlength: 20,
            },
            nameOrg:{
                required: false,
                minlength: 6,
                maxlength: 100,
            },
            full_count: {
                selectcheck:true

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
            adress: {
                required: "Это поле обязательно для заполнения",
                // minlength: "Фамилия должна быть минимум 2 символа",
                // maxlength: "Фамилия должна быть максимум 20 символа"
            }
           


       }

    });
 jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "Должно быть больше нуля!");

$("#regForm").validate({ 

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
            // repassword:{
            //     equalTo: "#password"
            // }
           
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
            surname: {
                required: "Это поле обязательно для заполнения",
                minlength: "Фамилия должна быть минимум 2 символа",
                maxlength: "Фамилия должна быть максимум 20 символа"
            },
            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
                maxlength: "Пароль должен быть максимум 20 символа"
            },
            repassword:{
                
                equalTo: "Пароли не совпадают"
                
            }


       }

    });
	$('#submitBtn').on('click', function(){
        
        if ($("#order_form form").validate()) {
            $("#order_form form").submit();
        }
    });

    $('#reg_submit').on('submit', function(e){
        // e.preventDefault();
        e.preventDefault();
        if ($(this).valid()) {
			$("#regForm").submit();
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