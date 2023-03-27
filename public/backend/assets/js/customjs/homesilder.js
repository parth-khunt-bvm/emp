var Homesilder = function() {


    var list = function() {

        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#home-silder-list',
            'ajaxURL': baseurl + "admin-home-silder-ajaxaction",
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

        $("body").on("click", ".deleteHomeSilder", function() {
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
                url: baseurl + "admin-home-silder-ajaxaction",
                data: { 'action': 'deleteHomeSilder', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var add = function() {

        var form = $('#add-home-silder-form');
        var rules = {
            // title: { required: true, maxlength: 30 },
            // description: { required: true, maxlength: 80 },
            image: { required: true },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    var edit = function() {
        var form = $('#edit-home-silder-form');
        var rules = {
            // title: { required: true, maxlength: 30 },
            // description: { required: true, maxlength: 80 },
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
