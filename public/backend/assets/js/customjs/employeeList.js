var EmployeeList = function() {


    var list = function() {

        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#employee-list',
            'ajaxURL': baseurl + "employee-ajaxaction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0,2,9],
            'noSearchApply': [0,2,9],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);

        $("body").on("click", ".deleteEmployee", function() {
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
                url: baseurl + "employee-ajaxaction",
                data: { 'action': 'deleteEmployee', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }

    var add = function() {
        var form = $('#add-employee');
        var rules = {
            empMobileNo: { required: true, minlength: 10, maxlength: 10 },
            empEmrNo: { minlength: 10, maxlength: 10 },
            empNo: { required: true },
            empEmail: { required: true, email: true },
            empFirstName: { required: true },
            empLastName: { required: true },
            empDob: { required: true },
            empgender: { required: true },
            empSalary: { required: true },
            empDepartment: { required: true },
            empDesignation: { required: true },
            empAddress: { required: true },
            empCountry: { required: true },
            empState: { required: true },
            empCity: { required: true },

        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    var edit = function() {
        var form = $('#edit-employee');
        var rules = {
            empMobileNo: { required: true, minlength: 10, maxlength: 10 },
            empEmrNo: { minlength: 10, maxlength: 10 },
            empNo: { required: true },
            empEmail: { required: true, email: true },
            empFirstName: { required: true },
            empLastName: { required: true },
            empDob: { required: true },
            empgender: { required: true },
            empSalary: { required: true },
            empDepartment: { required: true },
            empDesignation: { required: true },
            empAddress: { required: true },
            empCountry: { required: true },
            empState: { required: true },
            empCity: { required: true },

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
