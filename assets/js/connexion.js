var isUsernameValid = false;
var isPasswordValid = false;

var usernameRegex = /^[A-zÀ-ù0-9]{5,20}$/;
var passwordRegex = /^.{5,30}$/;

$(function(){
    checkForm();
    $("#username").on("input", function(){
        checkForm();
    })

    $("#password").on("input", function(){
        checkForm();
    })

    function checkForm(){
        if(!usernameRegex.test($("#username").val())){
            $("#username").css("color", "red");
            isUsernameValid = false;
        }else{
            $("#username").css("color", "green");
            isUsernameValid = true;
        }

        if(!passwordRegex.test($("#password").val())){
            $("#password").css("color", "red");
            isPasswordValid = false;
        }else{
            $("#password").css("color", "green");
            isPasswordValid = true;
        }

        if(isUsernameValid && isPasswordValid){
            console.log("coucou");
            $("#send").attr("disabled", false);
            $("#send").addClass("sendActive").removeClass("sendInactive");
        }else{
            $("#send").attr("disabled", true);
            $("#send").addClass("sendInactive").removeClass("sendActive");
        }
    }

    if(window.history.replaceState){
        window.history.replaceState( null, null, window.location.href );
    }
});