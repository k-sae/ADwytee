$('#bind-form').submit(function(event){
    event.preventDefault();
    bindfunction();
});
   function bindfunction(){
$('#bind-form').validate({ // initialize the plugin
        rules: {
            FName: {
                required: true,
                minlength:5
            },LName:{
                required:true,
                  minlength:5
            },Height:{
                required:true,
                number: true
            },Weight:{
                required:true,
                number:true
            }
        },




             submitHandler: submitForm
    })

}

function submitForm()
    {
var data = $("#bind-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'Pharmacy.php',
            data : data
             ,success :  function(data)
            {
             

            }

    })
}
