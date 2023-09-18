(function ($) {
    "use strict";

    function aliothSwitcher() {

        $('.redux-container-switch').each(function () {

            let $this = $(this).find('.switch-options'),
                enableBut = $this.find('.cb-enable'),
                disableBut = $this.find('.cb-disable');
            
            if (enableBut.hasClass('selected')) {
                
                $this.addClass('sw-enabled')
                
            } else {
                 $this.addClass('sw-disabled')
            }
            
            disableBut.on('click' , function(){
                
                $this.removeClass('sw-enabled');
                $this.addClass('sw-disabled');
            })
            
            enableBut.on('click' , function(){
                
                $this.removeClass('sw-disabled');
                $this.addClass('sw-enabled');
                
            })
                
        })
    }

    $(window).on('load', function () {

        aliothSwitcher();
    })

}(jQuery));