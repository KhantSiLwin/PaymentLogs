$(".show-sidebar-btn").click(function(){

    $(".sidebar").animate({marginLeft:0});
    $(".main-col-content").animate({marginLeft:"300px"});
    $("body,html").css("overflow-x","hidden");
});

$(".hide-sidebar-btn").click(function(){

    $(".sidebar").animate({marginLeft:"-100%"});
    $(".main-col-content").animate({marginLeft:0});
    $("body,html").css("overflow-x","auto");
});