$(document).ready(function(){
	$("#regp").click(function(){
		 $(".regasp").removeClass("fade");
			$(".regasph").addClass("fade");
			$(".regasph").hide();
			$(".regasp").show();
		
	})
	$("#regph").click(function(){
	$(".regasph").removeClass("fade");
		$(".regasp").addClass("fade");
		$(".regasp").hide();
		$(".regasph").show();
	});
	
});
$('#preg-form').submit(function(event){
	event.preventDefault();
	registerfunction();
});
$('#phreg-form').submit(function(event){
	event.preventDefault();
	registerfunction();
});
$('.login-form').submit(function(event){
	event.preventDefault();
	loginfunction();
});
function registerfunction(){
$('#preg-form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
            FName: {
                required: true,
                minlength: 5
            },
            LName:{
            	required:true,
            	minlength:5
            },
            password:{
            	required:true,
            	minlength:8
            },government:{
            	required:true,
            	minlength:5
            },street_no:{
            	required:true,
            	minlength:5
            },phone_number:{
            	required:true,
            	minlength:5
            },district:{
            	required:true,
            	minlength:5}
            },submitHandler: submitForm
    })

}
 function submitForm()
    {
var data = $("#preg-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../Application/validator.php',
            data : data
             ,success :  function(data)
            {
                if(data=="1"){
                console.log("fuck off");
                }else{
                	console.log("welcome");
                }

            }

    })
}
function registerphfunction(){
$('#phreg-form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },telephone:{
                required:true,
            	number: true
            }},
        messages: {
       
        },




             submitHandler: submitForm1
    })

}
 function submitForm1()
    {
var data = $("#phreg-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../Application/validator.php',
            data : data
             ,success :  function(data)
            {
              if(data=="1"){
                console.log("fuck off")	;
                }else{
                	console.log("welcome");
                }

            }

    })
}
function loginfunction(){
$('.login-form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },password:{
                required:true,
            	number: true
            }},




             submitHandler: submitForm2
    })

}

function submitForm2()
    {
var data = $(".login-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../Application/validator.php',
            data : data
             ,success :  function(data)
            {
             

            }

    })
}