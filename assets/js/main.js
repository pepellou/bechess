const imagesContext = require.context('../img', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);

var CryptoJS = require("crypto-js");

var encryptPasswords = function(e) {
    if (!$(this).data('encoded')) {
        e.preventDefault();
        var password = $(this).find('input[type=password]').val();
        if (password != '') {
            $(this).find('input[type=password]').val(CryptoJS.SHA3(password, { outputLength: 256 }));
        }
        $(this).data('encoded', true);
        $(this).submit();
    }
};

jQuery(document).ready(function() {

    // Preloader
    $(window).on('load', function() {
        $("#preloader").delay(600).fadeOut();
    });

    // Mobile Toggle Btn
    $('.navbar-toggle').on('click',function(){
        $('#header').toggleClass('nav-collapse')
    });

    $('form').on('submit', encryptPasswords);

});
