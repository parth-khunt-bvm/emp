var Aboutus = function() {
    var oneDetails = function() {

        $(".onlyNumber").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        var form = $('#sectionone-form');
        var rules = {
            title: { required: true},
            details: { required: true},
            // image: { required: true },
            image_headline: { required: true },
            // signuture: { required: true },
            contact_no: { required: true, minlength: 10, maxlength: 10  },
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
    var twoDetails = function() {

        $(".onlyNumber").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        var form = $('#sectiontwo-form');
        var rules = {
            title: { required: true},
            details: { required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };

    var statisticalDetails = function() {

        $(".onlyNumber").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        var form = $('#statistical-form');
        var rules = {
            count1: { required: true},
            count2: { required: true},
            count3: { required: true},
            count4: { required: true},

        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };


    return {
        one: function() {
            oneDetails();
        },
        two: function() {
            twoDetails();
        },
        statistical: function(){
            statisticalDetails();
        }
    }
}();