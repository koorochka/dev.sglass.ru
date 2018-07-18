var leftMenu = {
    menuItems: $("#sidebar-menu-items"),
    parent: function (t) {
        if($(window).width() > 992){
            return true;
        }
        else{
            var ul = $(t).next();
            if(ul.is(":hidden")){
                ul.slideDown(300);
                this.show(t);
            }else{
                ul.slideUp(300);
                this.hide(t);
            }
            return false;
        }
    },
    hide: function (t) {
        $(t).removeClass("active");
        $(t).parent().removeClass("active-list");
        $(t).find(".fa").removeClass("fa-angle-down").addClass("fa-angle-right");
    },
    show: function (t) {
        $(t).addClass("active");
        $(t).parent().addClass("active-list");
        $(t).find(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
    },
    mobileToggle: function () {
        if(leftMenu.menuItems.hasClass("hidden-xs")){
            leftMenu.menuItems.removeClass("hidden-xs")
                              .removeClass("hidden-sm");
        }else{
            leftMenu.menuItems.addClass("hidden-xs")
                              .addClass("hidden-sm");
        }
    }
};

$(document).ready(function () {
    if($(window).width() < 992){
        leftMenu.hide($(".list-group-item.active"));
    }
});