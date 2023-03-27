"use strict";
var KTCkeditor = {
    init: function() {
        ClassicEditor.create(document.querySelector("#details"))
            .then((e) => {
                console.log(e);
            })
            .catch((e) => {
                console.error(e);
            });
    },
};
jQuery(document).ready(function() {
    KTCkeditor.init();
});