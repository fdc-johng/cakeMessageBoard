var completer = null;
    $(".auto-complete").autocomplete({
        source: generateUrl(),
        minLength: 2, //This is the min amount of chars before auto complete kicks in
        autoFocus: true,
        type: 'json',
        select: function (event, ui) {
            $('#' + parent.completer.attr('data-id-map')).val(ui.item.id)
        }
    });

var generateUrl = function () {
    return function (request, response) {
        parent.completer = $(this.element);

        var url = parent.completer.attr('data-url') + '/term:%s',
            param_field = parent.completer.attr('data-param');

        url = url.replace('%s', encodeURIComponent(request.term));

        if (param_field !== undefined) {
            url += '/' + param_field + ':' + $('#' + param_field).val();
        }

        console.log(url);

        return $.get(url, response, 'json');
    };
};