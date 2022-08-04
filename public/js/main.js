$(function() {
    $("#regform").on('submit', function(e) {
        e.preventDefault();
        if (!name() || !email() || !contact() || !address() || !profile() || !password()) {
            console.log("error in validation");
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
        } else {


            console.log('validate success');
            var getdata = new FormData(this);
            $.ajax({
                url: 'add-employee',
                type: 'POST',
                data: getdata,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(result) {
                    console.log(result);
                    if (result == 1) {
                        window.location.href = "employee";

                    } else {
                        window.location.href = "add-employee";
                    }
                    $('.form-container').html(result);

                }
            })
        }
    });
});

function name() {
    console.log("Name");
    var pattern = /^[A-Za-z]+$/;
    var user = $('#Name').val();
    var validuser = pattern.test(user);
    if ($('#Name').val().length < 4) {
        $('#name_err').html('name length is too short');
        return false;
    } else if (!validuser) {
        $('#name_err').html('name should be a-z ,A-Z only');
        return false;
    } else {
        $('#name_err').html('');
        return true;
    }
}

function email() {
    console.log("email");
    var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $('#Email').val();
    var validemail = pattern1.test(email);
    if (email == "") {
        $('#email_err').html('required email');
        return false;
    } else if (!validemail) {
        $('#email_err').html('invalid email');
        return false;
    } else {
        $('#email_err').html('');
        return true;
    }
}

function contact() {
    if (!$.isNumeric($("#Contact").val())) {
        $("#contact_err").html("only number is allowed");
        return false;
    } else if ($("#Contact").val().length != 10) {
        $("#contact_err").html("10 digit required");
        return false;
    } else {
        $("#contact_err").html("");
        return true;
    }
}

function address() {
    console.log("address");
    var address = $('#Address').val();
    if (address == "") {
        $('#address_err').html('address can not be empty');
        return false;
    } else {
        $('#address_err').html("");
        return true;
    }
}

function profile() {
    console.log("profile");
    var address = $('#Profile').val();
    if (address == "") {
        $('#profile_err').html('Profile can not be empty');
        return false;
    } else {
        $('#profile_err').html("");
        return true;
    }
}

function password() {
    console.log("password");
    var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var pass = $('#Password').val();
    var validpass = pattern2.test(pass);

    if (pass == "") {
        $('#password_err').html('password can not be empty');
        return false;
    } else if (!validpass) {
        $('#password_err').html('Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:');
        return false;

    } else {
        $('#password_err').html("");
        return true;
    }
}