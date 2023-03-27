var Ourteam = function() {


    var listClient = function() {

        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#our-team-list',
            'ajaxURL': baseurl + "admin-our-team-ajaxaction",
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

        $("body").on("click", ".deleteTeam", function() {
            var id = $(this).data('id');
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        })

        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = { id: id, _token: $('#_token').val() };
                $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "admin-our-team-ajaxaction",
                data: { 'action': 'deleteTeam', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var addTeam = function() {

        var form = $('#add-team-form');
        var rules = {
            name: { required: true },
            designation: { required: true },
            // image: { required: true },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    var editTeam = function() {
        var form = $('#edit-team-form');
        var rules = {
            name: { required: true },
            designation: { required: true },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    return {
        list: function() {
            listClient();
        },

        add: function() {
            addTeam();
        },
        edit: function() {
            editTeam();
        },
    }
}();
