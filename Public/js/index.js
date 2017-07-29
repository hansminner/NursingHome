/**
 * Created by Administrator on 2017/7/7 0007.
 */
$(document).ready(function () {
    $(".carousel-inner div:first-child").addClass("active");
    $('#myTab li:eq(0) a').tab('show');
    //上下分别为第一个子节点的两种写法
    $(".tab-content :first-child").addClass("active");
});
