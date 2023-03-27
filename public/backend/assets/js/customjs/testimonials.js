var Testimonials = function() {


    var list = function() {

        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#testimonials-list',
            'ajaxURL': baseurl + "admin-testimonials-ajaxaction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0],
            'noSearchApply': [0],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);

        $("body").on("click", ".deleteTestimonials", function() {
            var id = $(this).data('id');
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {

            var id = $(this).attr('data-id');
            // alert(id);
            var data = { id: id, _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin-testimonials-ajaxaction",
                data: { 'action': 'deleteTestimonials', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var add = function() {

        var form = $('#add-testimonials-form');
        var rules = {
            name: { required: true },
            image: { required: true },
            description: { required: true },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    var edit = function() {
        var form = $('#edit-testimonials-form');
        var rules = {
            name: { required: true },
            description: { required: true },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    return {
        list: function() {
            list();
        },

        add: function() {
            add();
        },
        edit: function() {
            edit();
        },
    }
}();