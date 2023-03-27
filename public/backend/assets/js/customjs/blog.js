var Blog = function() {


    var list = function() {

        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#blog-list',
            'ajaxURL': baseurl + "admin-blog-ajaxaction",
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

        $("body").on("click", ".deleteBlog", function() {
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
                url: baseurl + "admin-blog-ajaxaction",
                data: { 'action': 'deleteBlog', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var add = function() {

        var form = $('#add-blog-form');
        var rules = {
            category_id: { required: true },
            title: { required: true, maxlength: 30  },
            short_description: { required: true, maxlength: 240  },
            image:{ required: true },
           };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    var edit = function() {

        var form = $('#edit-blog-form');
        var rules = {
            category_id: { required: true },
            title: { required: true, maxlength: 30 },
            short_description: { required: true, maxlength: 240  },

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
