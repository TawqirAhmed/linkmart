$(function() {
	"use strict";

	$(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });

        $("#confirm_show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#confirm_show_hide_password input').attr("type") == "text") {
                $('#confirm_show_hide_password input').attr('type', 'password');
                $('#confirm_show_hide_password i').addClass("bx-hide");
                $('#confirm_show_hide_password i').removeClass("bx-show");
            } else if ($('#confirm_show_hide_password input').attr("type") == "password") {
                $('#confirm_show_hide_password input').attr('type', 'text');
                $('#confirm_show_hide_password i').removeClass("bx-hide");
                $('#confirm_show_hide_password i').addClass("bx-show");
            }
        });
    });



});