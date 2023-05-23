jQuery(document).ready(function ($) {

    $(document).on('click','#loadmore', function(){

        var current = $(this).attr('data-current');
        var max = $(this).attr('data-max-page');

        var data = {
            'action': 'loadmore',
            'page' : current,
        };
        $.ajax({
            url:globals.url,
            data:data,
            type:'GET',
            success:function(data){
                if( data ) {
                    $('.blog-list .row').append(data);
                    current++;
                    $('#loadmore').attr('data-current', current);
                    if (current == max) $("#loadmore").remove();
                } else {
                    $('#loadmore').remove();
                }
            }
        });
    });

});