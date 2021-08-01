
(function(){
    'use strict';

    window.addEventListener("load", function(){
        var forms = document.getElementsByClassName("needs-validation"),
            pwd1 = document.getElementById("password1"),
            pwd2 = document.getElementById("password2");

        var validation = Array.prototype.filter.call(forms, function(form){
            form.addEventListener("submit", function(event){
                if(form.checkValidity() === false){
                    event.preventDefault();
                    event.stopPropagation();

                    if(pwd1 !== pwd2){
                        console.log("no match");
                    }
                }

                form.classList.add("was-validated")
            }, false);
        });
    }, false);

})();