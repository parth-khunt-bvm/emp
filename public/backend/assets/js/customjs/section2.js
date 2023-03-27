var Section2 = function() {


    var list = function() {

        var form = $('#edit-form');
        var rules = {
                title: { required: true, maxlength: 30 },
                description: { required: true, maxlength: 120 },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });

        $("body").on("click", ".deleteExterimage", function() {
            var id = $(this).data('exterimage');
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
                url: baseurl + "admin-section2-ajaxaction",
                data: { 'action': 'deleteSection2', 'data': data },
                success: function(data) {
                    $("#loader").show();
                    handleAjaxResponse(data);
                }
            });
        });

        $('body').on("click", ".addImage", function() {
            var html = '<div class="row removediv" style="margin-top:25px">' +
                '<div class="col-9 " >' +
                '<input type="file" class="form-control validation-file image" name="extra_image[]" >' +
                '<span ></span></div>' +
                '<div class="col-3" >' +
                '<button type="button" class="btn btn-danger removePhotos btn-block"><i class="feather icon-minus"></i> Remove Image</button>' +
                '</div></div>';
            $(".appendDiv").append(html);
        });

        $('body').on("click", ".removePhotos", function() {
            $(this).closest('.removediv').remove();
        });
    }
    return {
        list: function() {
            list();
        },
    }
}();
