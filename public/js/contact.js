$(function () {
 
    $("#mail").keyup(function () {
        var VAL = this.value;
        
        var email = new RegExp("^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$");
        if (email.test(VAL)) {
            console.log("coucou")
            $("#mail").addClass("green").removeClass("red");
        }else{
            $("#mail").addClass("red").removeClass("green");
        }
    });
});
