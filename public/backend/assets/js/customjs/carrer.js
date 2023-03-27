var Carrer = function() {


    var list = function() {

        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#carrer-list',
            'ajaxURL': baseurl + "admin-carrer-ajaxaction",
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

        $("body").on("click", ".deleteCarrer", function() {
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
                url: baseurl + "admin-carrer-ajaxaction",
                data: { 'action': 'deleteCarrer', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }

    var add = function() {
        var form = $('#add-career-form');
        var rules = {
            department_name: { required: true},
            icon: { required: true},
            details: { required: true},
            experience: { required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });

        $("body").on("click", ".deleteSkills", function() {
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
                url: baseurl + "admin-carrer-ajaxaction",
                data: { 'action': 'deleteSection2', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });

        $('body').on("click", ".addSkills", function() {
            var html = '<div class="row removediv" style="margin-top:25px">' +
                '<div class="col-9 " >' +
                ' <input type="text" class="form-control" id="skills" name="skills[]" placeholder="Please enter skills" />' +
                '<span ></span></div>' +
                '<div class="col-3" >' +
                '<button type="button" class="btn btn-danger removeSkills btn-block"><i class="feather icon-minus"></i> Remove Skill</button>' +
                '</div></div>';
            $(".appendDiv").append(html);
        });

        $('body').on("click", ".removeSkills", function() {
            $(this).closest('.removediv').remove();
        });
    }
    var edit = function() {
        var form = $('#edit-career-form');
        var rules = {
            department_name: { required: true},
            details: { required: true},
            experience: { required: true},
         };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });

        $("body").on("click", ".deleteSkills", function() {
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
                url: baseurl + "admin-carrer-ajaxaction",
                data: { 'action': 'deleteSkills', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });

        $('body').on("click", ".addSkills", function() {
            var html = '<div class="row removediv" style="margin-top:25px">' +
                '<div class="col-9 " >' +
                ' <input type="text" class="form-control" id="skills" name="skills[]" placeholder="Please enter skills" />' +
                '<span ></span></div>' +
                '<div class="col-3" >' +
                '<button type="button" class="btn btn-danger removeSkills btn-block"><i class="feather icon-minus"></i> Remove Skill</button>' +
                '</div></div>';
            $(".appendDiv").append(html);
        });

        $('body').on("click", ".removeSkills", function() {
            $(this).closest('.removediv').remove();
        });
    }



    var careerList = function() {

        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'tableID': '#carrer-lists',
            'ajaxURL': baseurl + "admin-carrer-ajaxaction",
            'ajaxAction': 'getdatatablelist',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0],
            'noSearchApply': [0],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);

        $("body").on("click", ".deleteCareerDetail", function() {
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
                url: baseurl + "admin-carrer-ajaxaction",
                data: { 'action': 'deleteCareerDetail', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });
    }
    return {
        add: function() {
            add();
        },
        edit: function() {
            edit();
        },
        list: function() {
            list();
        },
        careerList:function(){
            careerList();
        }
    }
}();
