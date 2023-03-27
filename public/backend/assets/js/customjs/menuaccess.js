var Menuaccess = function(){
    var list = function(){
        var form = $('#menuaccess-form');
        var rules = {

        };

        handleFormValidate(form, rules,function(form) {
            handleAjaxFormSubmit(form,true);
        });
    };
    return {
        init:function(){
            list();
        }
    }
}();
