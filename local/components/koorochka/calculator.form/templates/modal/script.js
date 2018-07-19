/**
 * Add mask to phone number
 */
$(document).ready(function () {
    $('#order-call-modal').find('#user_phone').mask("+7(999) 999-99-99");
});
/**
 * Validation call order form
 * @param t
 * @returns {boolean}
 */
function orderCallForm(t) {

    


    $.post($(t).attr('action'), $(t).serializeArray(), function(result){
        var alertBlock = $(t).find(".alert");
        if(result.ERROR_MESSAGE.length > 0)
        {
            alertBlock.addClass("hidden");
            if(result.ERROR.NAME != undefined)
            {
                $("#call-order-name").removeClass("has-success")
                    .addClass("has-error")
                    .find(".help-block")
                    .removeClass("hidden")
                    .html(result.ERROR.NAME);
            }
            else
            {
                $("#call-order-name").addClass("has-success")
                    .removeClass("has-error")
                    .find(".help-block")
                    .addClass("hidden");
            }
            if(result.ERROR.PHONE != undefined)
            {
                $("#call-order-phone").removeClass("has-success")
                    .addClass("has-error")
                    .find(".help-block")
                    .removeClass("hidden")
                    .html(result.ERROR.PHONE);
            }
            else
            {
                $("#call-order-phone").addClass("has-success")
                    .removeClass("has-error")
                    .find(".help-block")
                    .addClass("hidden");
            }
            if(result.ERROR.EMAIL != undefined)
            {
                $("#call-order-email").removeClass("has-success")
                    .addClass("has-error")
                    .find(".help-block")
                    .removeClass("hidden")
                    .html(result.ERROR.EMAIL);
            }
            else
            {
                $("#call-order-email").addClass("has-success")
                    .removeClass("has-error")
                    .find(".help-block")
                    .addClass("hidden");
            }
            if(result.ERROR.AGREE != undefined)
            {
                $("#call-order-agree").removeClass("has-success")
                    .addClass("has-error")
                    .find(".help-block")
                    .removeClass("hidden")
                    .html(result.ERROR.AGREE);
            }
            else
            {
                $("#call-order-agree").addClass("has-success")
                    .removeClass("has-error")
                    .find(".help-block")
                    .addClass("hidden");
            }
        }
        else{
            if(result.OK_MESSAGE != undefined)
            {
                $(t).find(".form-group").removeClass("has-error").removeClass("has-success");
                $(t).find(".form-control").val("");
                $(t).find("textarea.form-control").text("");
                alertBlock.removeClass("hidden")
                    .addClass("alert-success")
                    .html(result.OK_MESSAGE);
                try {
                    window.yaCounter5119156.reachGoal('order-call-modal');
                } catch(err) {
                    console.info(err);
                }
            }
        }

    }, "json");


    return false;
}
