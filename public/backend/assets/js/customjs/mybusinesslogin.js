var Mybusinesslogin = function(){
    var login = function(){
        // login-form
        var form = $('#login-form');
        var rules = {
            email: { required: true, email: true },
            password: { required: true },
        };
        var messages = {
            email:{
                required: "Enter your register business email",
                email: "Enter vaild business email",
            },
            password:{
                required: "Enter your password",
            },
        };

        handleFormValidateWithMsg(form, rules, messages,function(form) {
            handleAjaxFormSubmit(form,true);
        });
    };
    return {
        init:function(){
            login();
        }
    }
}();
