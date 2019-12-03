$(document).ready(function(){
    $("#Signup").click(function(){
        if(($('.inputPW').val())!=($('.inputCPW').val())){
            alert("PassWord didn't match, please enter again")
        }
        else{
            window.location.href="Verify.html";    
        }
        
        
    });
        
});