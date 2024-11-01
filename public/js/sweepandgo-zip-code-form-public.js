(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
        });
    };

})( jQuery );

jQuery(document).ready(function ($) {

    $('[data-toggle="tooltip"][disabled]').hover(function () {
        $(this).tooltip();
    });

    $(".sng-zip-code-input").inputFilter(function(value) {
        return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });

    $(".sng-zip-code-input").on('keyup', function(value) {
        zipCodeValidation(value);
    });

    function zipCodeValidation(value) {
        let zip_code_value = value.currentTarget.value;
        if (zip_code_value.length < 5) {
            // value.currentTarget.nextElementSibling.innerHTML = "Zip Code must contain 5 digits"
            // value.currentTarget.style = 'border-color: red;'
            value.currentTarget.form.querySelector('input[type="submit"]').id = 'sng-submit-disabled'
            value.currentTarget.form.querySelector('input[type="submit"]').disabled = true;
            return false;
        } else if (zip_code_value.length == 5) {
            // value.currentTarget.nextElementSibling.innerHTML = ""
            // value.currentTarget.style = 'border-color: #d2d2d2;'
            value.currentTarget.form.querySelector('input[type="submit"]').id = 'sng-submit'
            value.currentTarget.form.querySelector('input[type="submit"]').disabled = false;
            return true;
        }
    }
})
