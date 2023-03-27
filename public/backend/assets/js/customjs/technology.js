var Technology = function() {


    var list = function() {

        var dataArr = {};
        var columnWidth = {};
        var arrList = {
            'tableID': '#technology-list',
            'ajaxURL': baseurl + "admin-technologies-ajaxaction",
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

        $("body").on("click", ".deleteTechnologies", function() {
            var id = $(this).data('id');

            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {

            var id = $(this).attr('data-id');
            // alert(id);
            // alert(id);
            // exit;
            var data = { id: id, _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin-technologies-ajaxaction",
                data: { 'action': 'deleteTechnologies', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var add = function() {

        var form = $('#add-technologies-form');
        var rules = {
            technologies: { required: true},
            image: { required: true},

        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    var edit = function() {
        var form = $('#edit-technologies-form');
        var rules = {
            technologies: { required: true},
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
