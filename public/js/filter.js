$(function() {
    $('#search').on('click', function(e) {
        e.preventDefault();
        $value = $('#textsearch').val();
        // alert($value);
        $.ajax({
            type: 'GET',
            url: 'search-employee?' + '&search=' + $value,
            data: { search: $value },
            processData: false,
            contentType: false,
            success: function(data) {
                $('tbody').html(data);
            }

        });
    });
})