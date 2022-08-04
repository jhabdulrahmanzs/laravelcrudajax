$(document).ready(function() {
    fetchdata(0);
});

function fetchdata(page) {
    //alert('test');
    var result_page = $("#selectbox").val();
    //alert(result_page);
    $.ajax({
        type: 'GET',
        url: 'fetch-employee?page=' + page + '&result_page=' + result_page,
        data: { result_page: result_page },
        processData: false,
        contentType: false,
        success: function(response) {
            //console.log(response);
            $('tbody').html("");
            var imageroot = response.imageroot;
            var pagination = response.paginate;
            //console.log(pagination);
            //console.log(response.employee.data);
            $.each(response.employee.data, function(key, item) {
                var empImage = imageroot + "/" + item.emp_profile;
                $('tbody').append(
                    '<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.emp_name + '</td>\
                            <td>' + item.emp_email + '</td>\
                            <td>' + item.emp_contact + '</td>\
                            <td>' + item.emp_address + '</td>\
                            <td><img src="' + empImage + '" width="70px" height="70px" alt="Image"></td>\
                             <td><a href="edit-employee/' + item.id + '" class="btn btn-primary btn-sm">Edit</a></td>\
                             <td><a href="delete-employee/' + item.id + '" class="btn btn-danger btn-sm">Delete</a></td>\
                             </tr>'
                );
            });
            $('.pagination').html(pagination)
        }

    });
}
$(document).on("click", ".page-link", function(event) {

    event.preventDefault();

    let page = $(this).attr("href").split("/").pop();
    page = page.split("=").pop();
    //console.log(page)
    fetchdata(page);

});