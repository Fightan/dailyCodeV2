var isMessageValid = false;

var regexTitle = /^[A-zÀ-ù0-9 '?!]{5,40}$/;

$(function(){
    $("#editor").trumbowyg({
        autogrow: true
    }).on("tbwchange", function(){
        var val = $("#editor").html();

        if(val.length > 15){
            isMessageValid = true;
            $("#editor").css("color", "rgb(27,221,60)");
            isMessageValid = true;
        }
        else{
            isMessageValid = false;
            $("#editor").css("color", "red");	
            isMessageValid = false;
        }
        checkForm();
    });

    $(".trumbowyg-box").on("focusin", function(){
        $(this).removeClass("editorInactive").addClass("editorActive");
    });
    $(".trumbowyg-box").on("focusout", function(){
        $(this).addClass("editorInactive").removeClass("editorActive");
    });

    $("#sendForm").attr("disabled", true);

    $(".button").on("change", function(){
        if($(".button>input[type=checkbox]:checked").length > 0){
            isCategoryValid = true;
        }else{
            isCategoryValid = false;
        }

        $(this).toggleClass("active")
        checkForm();
    })

    $(".dp").on("click", function(e){
        var isActive = $(this).attr("data-active");
        if(isActive == "false"){
            $(".dp").attr("data-active", false);
            $(this).attr("data-active", true);
            $(".dp-menu").removeClass("showDp");
            $(this).find(".dp-menu").addClass("showDp");
        }else{
            $(this).attr("data-active", false);
            $(this).find(".dp-menu").removeClass("showDp");
        }
        e.stopPropagation();
    })

    $(".delete").on("click", function(e){
        $(".popup").addClass("showPopup");
        var id = $(this).attr("data-id");
        $("#delete").val(id);
        console.log(id);
        e.stopPropagation(); 
    })

    $(".popup #cancel").on("click", function(){
        $(".popup").removeClass("showPopup");
    })

    $("body").on("click", function(e){
        $(".dp-menu").removeClass("showDp");
        $(".dp").attr("data-active", false);
        e.stopPropagation();
    })

    function checkForm(){
        if(isMessageValid){
            $("#sendForm").attr("disabled", false);
            $("#sendForm").addClass("sendFormActive").removeClass("sendFormInactive");
        }else{
            $("#sendForm").attr("disabled", true);
            $("#sendForm").addClass("sendFormInactive").removeClass("sendFormActive");
        }
    }

    if(window.history.replaceState){
        window.history.replaceState( null, null, window.location.href );
    }
});