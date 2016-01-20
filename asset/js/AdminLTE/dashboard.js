/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {
    "use strict";
    ///$(".box-header, .nav-tabs").css("cursor", "move");
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
    $('.daterange').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            startDate: moment().subtract('days', 29),
            endDate: moment()
        },
        function (start, end) {
            alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

    /* jQueryKnob */
    $(".knob").knob();
});


function setvaledit(selector,value){
    var elem = $('[name='+selector+']').data('tag');
    if(elem == "input"){
        $('input[name='+selector+']').val(value);
        console.log("select "+elem+" value "+value);
    }else if(elem == 'select'){
        $('select[name='+selector+'] option[value="'+String(value)+'"]').prop("selected",true);
    }
}


function getdetail(href,variable){
    $.ajax({
        type: "POST",
        url: href,
        dataType: 'json',
        data:variable,
        success: function(data) {
            jQuery.each(data, function(i, val) {
                setvaledit(i,val);
            });
        }
    });
}

function getdelete(href,variable,donecallback){
    $.ajax({
        type: "POST",
        url: href,
        dataType: 'json',
        data:variable,
        success: function(data) { },
    }).done(donecallback);
}

function postdata(href,variable,donecallback){
    $.ajax({
        type: "POST",
        url: href,

        data:variable,
        success: function(data) {

        }
    }).done(donecallback);
}
