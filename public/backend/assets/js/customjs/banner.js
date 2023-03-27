var Banner = function() {
        var list = function() {
        var form = $('#edit-form');
        var rules = {
                title: { required: true, maxlength: 30 },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
   }
    return {
        list: function() {
            list();
        },
    }
}();