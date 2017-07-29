$(document).ready(function() {

    //Get all the LI from the #tabMenu UL
    $('#main-nav li').click(function(){

        //perform the actions when it's not selected
        if (!$(this).hasClass('active')) {
            //remove the selected class from all LI
            $('#tabMenu li').removeClass('active');
            //Reassign the LI
            $(this).addClass('active');
            $(this).css('background-color','#2B2E33');

        }
    })
});


