var Salaryslip = function(){

    var listSalary = function(){
        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#employee-salary-list',
            'ajaxURL': baseurl + "employee-salaryslip-ajaxaction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0,5],
            'noSearchApply': [0,5],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
        $("body").on("click", ".deleteSalarySlip", function() {
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
                url: baseurl + "employee-salaryslip-ajaxaction",
                data: { 'action': 'deleteSalarySlip', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });

        $("body").on("click", ".download-pdf", function() {
            var id = $(this).data('id');
            var data = { id: id, _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "employee-salaryslip-download",
                data: {'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });


        $("body").on("click", ".sendMail", function() {
            var id = $(this).data('id');
            var data = { id: id, _token: $('#_token').val() };
            $("#loader").show();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url:baseurl + "employee-salaryslip-ajaxaction",
                data: {'action': 'sendMail', 'data': data },
                success: function(data) {
                    $('#loader').hide();
                    handleAjaxResponse(data);
                },
                complete: function(){
                    $('#loader').hide();
                }
            });
        })
    }
    var addSalary = function(){

        var form = $('#add-salary-slip-form');
        var rules = {
            empDepartment:  { required: true, number: true },
            empDesignation:  { required: true, number: true },
            employee:  { required: true, number: true },
            month:  { required: true, number: true },
            year:  { required: true, number: true },
            wd:  { required: true, number: true },
            wo:  { required: true, number: true },
            ph:  { required: true, number: true },
            pd:  { required: true, number: true },
            lwp:  { required: true, number: true },
            basic:  { required: true, number: true },
            hra:  { required: true, number: true },
            leave_encash:  { required: true, number: true },
            produc:  { required: true, number: true },
            convei:  { required: true, number: true },
            transport:  { required: true, number: true },
            pf:  { required: true, number: true },
            esi:  { required: true, number: true },
            pt:  { required: true, number: true },
            tds:  { required: true, number: true },
            other:  { required: true, number: true },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });

        $("body").on("change","#empDepartment",function(){
            $('#employee').html('<option  value="">Select Employee </option>');
        });

        $("body").on("change","#empDesignation",function(){
            var empDesignation = $(this).val();
            var empDepartment = $('#empDepartment').val();
            var data = { empDesignation: empDesignation, empDepartment:empDepartment , _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "employee-ajaxaction",
                data: { 'action': 'changeDesignation', 'data': data },

                success: function(data) {
                    var output = JSON.parse(data);
                     var temp_html = '';
                    var html ='<option  value="">Select Employee </option>';
                    for (var i = 0; i < output.length; i++) {
                        temp_html = '<option value="' + output[i].id + '">' + output[i].firstname + ' ' + output[i].lastname + ' (' + output[i].emp_no +')</option>';
                        html = html + temp_html;
                    }
                    $('#employee').html(html);
                }
            });
        });


        $("body").on("change","#employee",function(){
            var employee = $(this).val();
            var data = { employee: employee, _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "employee-ajaxaction",
                data: { 'action': 'changeEmployee', 'data': data },

                success: function(data) {
                    var output = JSON.parse(data);
                    $("#basic").val(output[0].salary);
                }
            });
        });

        var getDaysInMonth = function(month,year) {
            // Here January is 1 based
            //Day 0 is the last day in the previous month
           return new Date(year, month, 0).getDate();
          // Here January is 0 based
          // return new Date(year, month+1, 0).getDate();
          };

        $("body").on("change","#month",function(){
            var currentYear = new Date().getFullYear();
            var month = $(this).val();
            var html = '<option  value="">Select Salary Slip Year </option>';
            var temp_html = '';
            for (var i = 2015; i <= currentYear; i++) {
                temp_html = '<option value="' + i + '">' + i + '</option>';
                html = html + temp_html;
            }
            $("#year").html(html);

            if(month == '' || month == null){

                $("#year").attr("disabled","true");
            }else{
                $("#year").removeAttr("disabled");
            }
        });

        $("body").on("change","#year",function(){
            var month = $("#month").val();
            var year = $(this).val();
            $("#wd").val(getDaysInMonth(month, year));
        });

    }

    var editSalary = function(){

        var form = $('#edit-salary-slip-form');
        var rules = {
            empDepartment:  { required: true, number: true },
            empDesignation:  { required: true, number: true },
            employee:  { required: true, number: true },
            month:  { required: true, number: true },
            year:  { required: true, number: true },
            wd:  { required: true, number: true },
            wo:  { required: true, number: true },
            ph:  { required: true, number: true },
            pd:  { required: true, number: true },
            lwp:  { required: true, number: true },
            basic:  { required: true, number: true },
            hra:  { required: true, number: true },
            leave_encash:  { required: true, number: true },
            produc:  { required: true, number: true },
            convei:  { required: true, number: true },
            transport:  { required: true, number: true },
            pf:  { required: true, number: true },
            esi:  { required: true, number: true },
            pt:  { required: true, number: true },
            tds:  { required: true, number: true },
            other:  { required: true, number: true },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });

        $("body").on("change","#empDepartment",function(){
            $('#employee').html('<option  value="">Select Employee </option>');
        });

        $("body").on("change","#empDesignation",function(){
            var empDesignation = $(this).val();
            var empDepartment = $('#empDepartment').val();
            var data = { empDesignation: empDesignation, empDepartment:empDepartment , _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "employee-ajaxaction",
                data: { 'action': 'changeDesignation', 'data': data },

                success: function(data) {
                    var output = JSON.parse(data);
                     var temp_html = '';
                    var html ='<option  value="">Select Employee </option>';
                    for (var i = 0; i < output.length; i++) {
                        temp_html = '<option value="' + output[i].id + '">' + output[i].firstname + ' ' + output[i].lastname + ' (' + output[i].emp_no +')</option>';
                        html = html + temp_html;
                    }
                    $('#employee').html(html);
                }
            });
        });


        $("body").on("change","#employee",function(){
            var employee = $(this).val();
            var data = { employee: employee, _token: $('#_token').val() };
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "employee-ajaxaction",
                data: { 'action': 'changeEmployee', 'data': data },

                success: function(data) {
                    var output = JSON.parse(data);
                    $("#basic").val(output[0].salary);
                }
            });
        });

        var getDaysInMonth = function(month,year) {
            // Here January is 1 based
            //Day 0 is the last day in the previous month
           return new Date(year, month, 0).getDate();
          // Here January is 0 based
          // return new Date(year, month+1, 0).getDate();
          };

        $("body").on("change","#month",function(){
            var currentYear = new Date().getFullYear();
            var month = $(this).val();
            var html = '<option  value="">Select Salary Slip Year </option>';
            var temp_html = '';
            for (var i = 2015; i <= currentYear; i++) {
                temp_html = '<option value="' + i + '">' + i + '</option>';
                html = html + temp_html;
            }
            $("#year").html(html);

            if(month == '' || month == null){

                $("#year").attr("disabled","true");
            }else{
                $("#year").removeAttr("disabled");
            }
        });

        $("body").on("change","#year",function(){
            var month = $("#month").val();
            var year = $(this).val();
            $("#wd").val(getDaysInMonth(month, year));
        });

    }

    return {
        list: function() {
            listSalary();
        },
        add:function(){
            addSalary();
        },
        edit:function(){
            editSalary();
        }
    }
}();
