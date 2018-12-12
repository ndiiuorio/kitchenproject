$(document).ready(function(){

    $('.chosen-select').chosen();


    $('.btn-recipe').click(function(){

        $('.btn-recipe').removeClass('active');
        $(this).addClass('active');

        $('#recipepane').show();

    });


    $('.delete-btn').click(function(){
        if( !confirm('Are you sure you want to delete this?') ){
            return false;
        }
    });

    


}); // END DOCUMENT READY
