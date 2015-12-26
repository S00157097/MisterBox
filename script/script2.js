var inChart = 0;

$(document).ready(function(e) {
    $('.drop-trigger').click(function() {
        $(this).next().slideToggle();
    });

    $('.paper').on('click', function() {

        for(var i = 0; i < $('.paper').length; i++)
            $('.paper').removeClass('selected');

        $(this).addClass('selected');
    });

    
    $('#add').on('click', function() {
        
        var isSelected = $('.selected').length;
        
        if(isSelected != 0) {
            var quant = $('#quant').val();
            var type = $('.selected').attr('alt');
            var papS = $('.selected').attr('name');
            var newL = $('<li>');
           

            if( $('#view').attr('alt') == 'Box' ) {
                newL.html(papS +" - "+ quant +' - '+ type +'<span class="newI" style="background-image: url(media/papers/'+ papS +'.jpg);"></span> <span class="x">x</span>');
                newL.attr('value', papS +','+ quant +','+ type);
                newL.attr('name', inChart++);
            }
            else if( $('#view').attr('alt') == 'Bow' ) {
                newL.html(papS +" - "+ quant +' - '+ type +'mm <span class="newI" style="background-image: url(media/bows/'+ papS +'.jpg);"></span> <span class="x">x</span>');
                newL.attr('value', papS +','+ quant +','+ type +'mm');
                newL.attr('name', inChart++);
            }
            else if( $('#view').attr('alt') == 'Ribbon' ) {
                newL.html(papS +" - "+ quant +' - '+ type +'cm <span class="newI" style="background-image: url(media/ribbons/'+ type +'/'+ papS +'.jpg);"></span> <span class="x">x</span>');
                newL.attr('value', papS +','+ quant +','+ type +'cm');
                newL.attr('name', inChart++);
            }
            else if( $('#view').attr('alt') == 'Butterfly' ) {
                newL.html(papS +" - "+ quant +' - '+ type +'cm <span class="newI" style="background-image: url(media/butterflies/'+ type +'/'+ papS +'.jpg);"></span> <span class="x">x</span>');
                newL.attr('value', papS +','+ quant +','+ type +'cm');
                newL.attr('name', inChart++);
            }

            newL.appendTo('#list');
        }
    });

    $(document).on('click', '#list li span', function() {
        $(this).parent().fadeOut(300);
    });
    
    $('#order').click(function() {
        $('#data').css({
            'left' : '22.5%',
            'opacity' : '1'
        });
    });
    
    $('#data .close').click(function() {
        $(this).parent().css({
            'left' : '200%',
            'opacity' : '0'
        });
    });
});