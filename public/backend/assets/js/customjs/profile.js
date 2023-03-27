var Profile = function(){
    var editPasssword = function(){

        var form = $('#change-password');
        var rules = {
            oldpassword: { required: true},
            newpasssword: { required: true },
            confirmpasssword: { required: true,equalTo : "#newpasssword"}
        };
        handleFormValidate(form, rules,function(form) {
            handleAjaxFormSubmit(form,true);
        });

    }
    var changeprofile = function(){

        var form = $('#my-profile');
        var rules = {
            firstname: { required: true},
            lastname: { required: true },
            email: { required: true,email : true}
        };
        handleFormValidate(form, rules,function(form) {
            handleAjaxFormSubmit(form,true);
        });

    }
    return {
        init: function() {
            changeprofile();
        },
        change: function(){
            editPasssword();
        }
    }
}();
