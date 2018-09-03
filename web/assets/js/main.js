    console.log('this is main');

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

    console.log('document is ready');

    $('form').on('submit', encryptPasswords);

});
