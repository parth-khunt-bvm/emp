var Socialmedia = function(){
    var social = function(){

        var form = $('#social_media_form');
        var rules = {
            facebook: { required: true , url: true},
            twitter: { required: true , url: true },
            instagram: { required: true , url: true},
            linkedin: { required: true , url: true },
        };
        handleFormValidate(form, rules,function(form) {
            handleAjaxFormSubmit(form,true);
        });
    };
    return {
        init:function(){
            social();
        }
    }
}();
