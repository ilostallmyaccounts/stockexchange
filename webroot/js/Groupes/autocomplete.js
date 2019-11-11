(function ($) {
    var autoCompleteSource = urlToAutocompleteAction;
    $('#autocomplete').autocomplete({
        source: autoCompleteSource,
        minLength: 1
    });
})(jQuery);