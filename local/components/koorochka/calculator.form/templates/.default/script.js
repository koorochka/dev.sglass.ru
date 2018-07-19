/**
 * Add mask to phone number
 */
$(document).ready(function () {
    $('#calculator_phone').mask("+7(999) 999-99-99");
});

/**
 * Add another input file-input
 * @param t
 * @returns {boolean}
 */
function addCalculatorFile(t){
    var input = $("<input />", {
        type: "file",
        name: "user_file[]"
    }),
        br = $("<br />");


    $(input).insertBefore(t);
    $( br).insertBefore(t);

    return false;
}