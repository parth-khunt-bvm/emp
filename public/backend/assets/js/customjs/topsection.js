var TopSection = function() {
    var list = function() {

        var form = $('#edit-form');
        var rules = {
            title: { required: true, maxlength: 30 },
            short_description: { required: true, maxlength: 120 },
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