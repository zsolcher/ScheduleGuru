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

                var resultLogin = login(email,pw);
                if(resultLogin === "0") {
                    $('#loginMessage').innerHTML = "Incorrect login credentials. Please try again.";
                } else {
                    window.location.href = "http://dias11.cs.trinity.edu/~zsolcher/WebApps/ScheduleGuru/index.php";
                }
            }
        }
    );

};