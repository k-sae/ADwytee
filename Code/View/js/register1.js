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
            	minlenght:5
            },street_no:{
            	required:true,
            	minlenght:5
            },phone_number:{
            	required:true,
            	minlenght:5
            },district:{
            	required:true,
            	minlenght:5}

        },
        messages: {
        FName: "Enter your firstname",
        LName: "Enter your lastname",
        },




             submitHandler: submitForm
    })

}
 function submitForm()
    {
var data = $("#preg-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '../../Application/validator.php',
            data : data})}


