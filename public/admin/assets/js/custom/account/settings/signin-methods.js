(function () {
            // if (t) {
                var n = document.getElementById("kt_signin_password"),
                    o = document.getElementById("kt_signin_password_edit"),
                    r = document.getElementById("kt_signin_password_button"),
                    a = document.getElementById("kt_password_cancel");
                    r
                        .querySelector("button")
                        .addEventListener("click", function () {
                            d();
                        }),
                    a.addEventListener("click", function () {
                        d();
                    });
                var d = function () {
                        n.classList.toggle("d-none"),
                            r.classList.toggle("d-none"),
                            o.classList.toggle("d-none");
                    };
            // }
        })();
