//warning when leaving the page
var warning = "Changes that you made may not be saved."
window.onbeforeunload = function() {
    if (warning != "") {
        return warning;
    }
};

//prevent multiple submition
$('form#submit_button').submit(function(){
    $(this).find(':input[type=submit]').prop('disabled', true);
});

//business rules for form
$(document).ready(function(){
    $("#attend_reason_div").hide(); 
    $("#requirement_div").hide();
});

$("#course_yes").click(function() {
    $("#attend_reason_div").show()
    $('.attend').attr("required", "true");
});

$("#course_no").click(function() {
    $("#attend_reason_div").hide()
    $(":checkbox").prop('checked', false);
    $('.attend').attr("required", "false");
});

$("#support_yes").click(function() {
    $("#requirement").prop("required", true);
    $("#requirement_div").show()
});

$("#support_no").click(function() {
    $("#requirement").prop("required", false);
    $("#requirement").val("")
    $("#requirement_div").hide()
});

function fileChange() {	
    var all = document.getElementById("customFileLangHTML");
    var len = all.files.length;
    var allFileName = "Choose files: ";
    for (var i = 0; i < len; i++) {
        var temp = all.files[i].name;
        allFileName = allFileName + "  " + temp+ " || ";
    }
    $("#filesLabel").text(allFileName);
}

//validation for form
function validateRule(){
    $(".form").validate({
        messages: {
            course_check: {
                required: "Please select yes or no.",
            },
            support_require: {
                required: "Please select yes or no.",
            },
        },
        
        errorPlacement: function(error, element) {
            if (element.is(':radio') || element.is(':checkbox')) {
                var eid = element.attr('name');
                error.appendTo(element.parent().parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    $(".attend").rules("add",{
        messages:{
            required:'Please tick at least one checkbox',
        }
    })
};

$("#submit_button").on('click', function() {
    warning = "";
    validateRule();
});

