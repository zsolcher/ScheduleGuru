/**
 * Created by zsolcher on 3/19/15.
 */

window.onload = function() {
    $('#btnRegister').on ({
        'click':  function(){
                window.location = './register.php';
            }
        }
    );

    $('#btnLogin').on ({
            'click':  function() {
                document.querySelector('#toastSubmit').show();
                var email = document.querySelector('#txtEmail').value;
                var pw = document.querySelector('#txtPassword').value;
                document.querySelector('#toastSubmit').text = "Email: " + email + ", Password: " + pw;

                var validateLogin = function(login_email, login_password) {
                    $.ajax({
                        url: './php/validate_login.php',
                        type: 'POST',
                        data: {login_email:login_email, login_password:login_password},
                        success: function(data) {
                            if(data["status"] == "success") {
                                alert("1");
                                window.location.href = "index.php";
                            } else if(data["status"] = "failure"){
                                alert("2");

                                $('#loginMessage').innerHTML = "Incorrect login credentials. Please try again.";
                            } else {
                                alert("3");
                                $('#loginMessage').innerHTML = "neither success nor failure";
                            }
                        },
                        dataType:"json"
                    });
                };
                validateLogin(email,pw);

            }
        }
    );

};