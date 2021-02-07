 


$("#login_form").validate( {
 
    rules:{
        username:"required",
        password:"required"
    },
    messages:{
        username:"Enter Username",
        password:"Enter Password"
    },
    submitHandler: function(form,e) {
        e.preventDefault();
        //alert('Form submitted');
        var app_url = $("#app_url").val();
        var token = $("#_token").val();
        var formdata = $('form').serialize()
       
        
        $.ajax({
            type: 'POST',
            url: app_url+'/loginprocess',
            dataType: "json",
            data: formdata+'&_token='+token,
            success: function(result) {
                response = JSON.parse(result);
                if(response.status == 'success'){
                    
                    alertify.success(response.returnmsg);
                  
                }

                if(response.status == 'fail'){
                  
                    alertify.error(response.returnmsg);
                }
                
            },
            error : function(error) {

            }
        });
        return false;
    }
});