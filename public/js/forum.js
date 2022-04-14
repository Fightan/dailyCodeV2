$(function(){
    $("#editor").trumbowyg({
        autogrow: true
    }).on("tbwchange", function(){

    });

    // $(".trumbowyg-box").on("focusin", function(){
    //     $(this).removeClass("editorInactive").addClass("editorActive");
    // });
    // $(".trumbowyg-box").on("focusout", function(){
    //     $(this).addClass("editorInactive").removeClass("editorActive");
    // });

    var regexTitle = /^[a-zA-Z2-9]*$/;
    $("#title").on("input", function(){
        var val = $(this).val();

        if(!regexTitle.test(val)){
            $(this).addClass("invalid").removeClass("valid");
        }else{
            $(this).addClass("valid").removeClass("invalid");
        }
    });

    // $("#form").on("submit", function(event){
    //     // if($("#title").val().match(checkTitle)){
    //     //     event.preventDefault();
    //     // }else{
    //     //     $.post("?p=forum", $(this).serialize(), function(data){
    //     //         console.log(data);
    //     //     })
    //     // }

    // })

    if(window.history.replaceState){
        window.history.replaceState( null, null, window.location.href );
    }
});