<script>
    (function ($) {

        $.fn.rating = function () {

            var element;

            // A private function to highlight a star corresponding to a given value
            function _paintValue(ratingInput, value) {
                var selectedStar = $(ratingInput).find('[data-value=' + value + ']');
                selectedStar.removeClass('star-font fa fa-star-o').addClass('star-font fa fa-star');
                selectedStar.prevAll('[data-value]').removeClass('star-font fa fa-star-o').addClass('star-font fa fa-star');
                selectedStar.nextAll('[data-value]').removeClass('star-font fa fa-star').addClass('star-font fa fa-star-o');
            }

            // A private function to remove the selected rating
            function _clearValue(ratingInput) {
                var self = $(ratingInput);
                self.find('[data-value]').removeClass('star-font fa fa-star').addClass('star-font fa fa-star-o');
                self.find('.rating-clear').hide();
                self.find('input').val('').trigger('change');
            }

            // Iterate and transform all selected inputs
            for (element = this.length - 1; element >= 0; element--) {

                var el, i, ratingInputs,
                        originalInput = $(this[element]),
                        max = originalInput.data('max') || 10,
                        min = originalInput.data('min') || 0,
                        clearable = originalInput.data('clearable') || null,
                        stars = '';

                // HTML element construction
                for (i = min; i <= max; i++) {
                    // Create <max> empty stars
                    stars += ['<span class="fa star-font fa fa-star-o" data-value="', i, '"></span>'].join('');
                }
                // Add a clear link if clearable option is set
                if (clearable) {
                    stars += [
                        ' <a class="rating-clear" style="display:none;" href="javascript:void">',
                        '<span class="glyphicon glyphicon-remove"></span> ',
                        clearable,
                        '</a>'].join('');
                }

                el = [
                    // Rating widget is wrapped inside a div
                    '<div class="rating-input">',
                    stars,
                    // Value will be hold in a hidden input with same name and id than original input so the form will still work
                    '<input type="hidden" name="',
                    originalInput.attr('name'),
                    '" value="',
                    originalInput.val(),
                    '" id="',
                    originalInput.attr('id'),
                    '" />',
                    '</div>'].join('');

                // Replace original inputs HTML with the new one
                originalInput.replaceWith(el);

            }

            // Give live to the newly generated widgets
            $('.rating-input')
            // Highlight stars on hovering
                    .on('mouseenter', '[data-value]', function () {
                        var self = $(this);
                        _paintValue(self.closest('.rating-input'), self.data('value'));
                    })
                    // View current value while mouse is out
                    .on('mouseleave', '[data-value]', function () {
                        var self = $(this);
                        var val = self.siblings('input').val();
                        if (val) {
                            _paintValue(self.closest('.rating-input'), val);
                        } else {
                            _clearValue(self.closest('.rating-input'));
                        }
                    })
                    // Set the selected value to the hidden field
                    .on('click', '[data-value]', function (e) {
                        var self = $(this);
                        var val = self.data('value');
                        self.siblings('input').val(val).trigger('change');
                        self.siblings('.rating-clear').show();
                        e.preventDefault();
                        false
                    })
                    // Remove value on clear
                    .on('click', '.rating-clear', function (e) {
                        _clearValue($(this).closest('.rating-input'));
                        e.preventDefault();
                        false
                    })
                    // Initialize view with default value
                    .each(function () {
                        var val = $(this).find('input').val();
                        if (val) {
                            _paintValue(this, val);
                            $(this).find('.rating-clear').show();
                        }
                    });

        };

        // Auto apply conversion of number fields with class 'rating' into rating-fields
        $(function () {
            if ($('input.rating[type=number]').length > 0) {
                $('input.rating[type=number]').rating();
            }
        });

    }(jQuery));
</script>