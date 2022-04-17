var isUsernameValid = false;
var isEmailValid = false;
var isPasswordValid = false;
var isConfirmPasswordValid = false;

var usernameRegex = /^[A-zÀ-ù0-9]{5,20}$/;
var emailRegex = /^[A-z0-9._-]+@[A-z0-9._-]{2,}\.[A-z]{2,4}$/;
var passwordRegex = /^.{5,30}$/;

$(function(){
    checkForm();

    $("input").on("input", function(){
        checkForm();
    })

    $("#confirmPassword").on("input", function(){
        var valConfirm = $(this).val();
        var valDefault = $("#password").val();

        if(valConfirm != valDefault){
            $(this).css("color", "red");
            isConfirmPasswordValid = false;
            $("#confirmPasswordError").css("visibility", "visible");
        }else{
            $(this).css("color", "green");
            isConfirmPasswordValid = true;
            $("#confirmPasswordError").css("visibility", "hidden");
        }
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

        if(!emailRegex.test($("#email").val())){
            $("#email").css("color", "red");
            isEmailValid = false;
        }else{
            $("#email").css("color", "green");
            isEmailValid = true;
        }

        if(!passwordRegex.test($("#password").val())){
            $("#password").css("color", "red");
            isPasswordValid = false;
        }else{
            $("#password").css("color", "green");
            isPasswordValid = true;
        }

        if(isUsernameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid){
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