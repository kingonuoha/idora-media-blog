//==================================================validate login===========================================================\\
$("#kt_sign_in_form").ready(()=>{
    

    // Define form element
    const signInForm = document.getElementById('kt_sign_in_form');
    
    
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validatorReg = FormValidation.formValidation(
        signInForm,
        {
            fields: {
                'password': {
                    
                    validators: {
                        notEmpty: {
                            // message: 'Password is required'
                        },
                    }
                },
                'email': {
                    
                    validators: {
                        notEmpty: {
                            // message: 'Email is required'
                        },
                        emailAddress:{
                            // message: "pls enter a Valid Email address"
                        },
                        
                    }
                },
            },
    
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );
    
    // Submit button handler
    const signInBtn = document.getElementById('signupbtn');
    signInBtn.addEventListener('click', function (e) {
        // Prevent default button action
        e.preventDefault();
    
        // Validate form before submit
        if (validatorReg) {
            validatorReg.validate().then(function (status) {
                console.log('validated!');
    
                if (status == 'Valid') {
                    // Show loading indication
                    signInBtn.setAttribute('data-kt-indicator', 'on');
    
                    // Disable button to avoid multiple click
                    signInBtn.disabled = true;
    
                    // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    setTimeout(function () {
                        // Remove loading indication
                        signInBtn.removeAttribute('data-kt-indicator');
    
                        // Enable button
                        signInBtn.disabled = false;
    
                        // Show popup confirmation
                        Swal.fire({
                            text: "Form has been successfully Verified!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
    
                        //form.submit(); // Submit form
                        setTimeout(() => {
                            signInForm.submit()
                        }, 1300);
                    }, 2000);
                }else{
                    // Show popup confirmation
                    Swal.fire({
                        text: "Error Detected, please check the form and make corrections!",
                        icon: "error",
                        buttonsStyling: true,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        }
    });
    
    })
    //==================================================validate login===========================================================\\





    //==================================================validate signup===========================================================\\

$('#kt_sign_up_form').ready(()=>{

    // Define form element
    const signUpForm = document.getElementById('kt_sign_up_form');
    
    
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validatorReg = FormValidation.formValidation(
        signUpForm,
        {
            fields: {
                'first-name': {
                    
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        
                        
                    }
                },
                'last-name': {
                    
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                    }
                },
                'email': {
                    
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        emailAddress:{
                            message: "pls enter a Valid Email address"
                        },
                        
                    }
                },
                // 'current_password': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Current password is required'
                //         }
                //     }
                // },
                'password': {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        },
                        // lessThan: {
                        //     inclusive: true,
                        //     max: 12,
                        //     message:'password must be less than 12'
                        // },
                        // greaterThan: {
                        //     inclusive: true,
                        //     min: 8,
                        //     message:'password must be greater than 8'
                        // },
                        callback: {
                            message: 'Please enter valid password',
                            callback: function (input) {
                                if (input.value.length > 0) {
                                    return validatePassword();
                                }
                            }
                        }
                    }
                },
                'confirm-password': {
                    validators: {
                        notEmpty: {
                            message: 'The password confirmation is required'
                        },
                        identical: {
                            compare: function () {
                                return signUpForm.querySelector('[name="password"]').value;
                            },
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
            },
    
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );
    
    // Submit button handler
    const SignUpButton = document.getElementById('signupbtn');
    SignUpButton.addEventListener('click', function (e) {
        // Prevent default button action
        e.preventDefault();
    
        // Validate form before submit
        if (validatorReg) {
            validatorReg.validate().then(function (status) {
                console.log('validated!');
    
                if (status == 'Valid') {
                    // Show loading indication
                    SignUpButton.setAttribute('data-kt-indicator', 'on');
    
                    // Disable button to avoid multiple click
                    SignUpButton.disabled = true;
    
                    // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    setTimeout(function () {
                        // Remove loading indication
                        SignUpButton.removeAttribute('data-kt-indicator');
    
                        // Enable button
                        SignUpButton.disabled = false;
    
                        // Show popup confirmation
                        Swal.fire({
                            text: "Form has been successfully Verified!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
    
                        //form.submit(); // Submit form
                        setTimeout(() => {
                            signUpForm.submit()
                        }, 1300);
                    }, 2000);
                }else{
                    // Show popup confirmation
                    Swal.fire({
                        text: "Error Detected, please check the form and make corrections!",
                        icon: "error",
                        buttonsStyling: true,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        }
    });
    
    });
    
    //==================================================validate signup===========================================================\\

    //==================================================validate signup===========================================================\\


    var KTSignupGeneral = (function () {
        var e,
            t,
            a,
            r,
            s = function () {
                return 100 === r.getScore();
            };
        return {
            init: function () {
                (e = document.querySelector("#kt_sign_up_form")),
                    (t = document.querySelector("#kt_sign_up_submit")),
                    (r = KTPasswordMeter.getInstance(
                        e.querySelector('[data-kt-password-meter="true"]')
                    )),
                    (a = FormValidation.formValidation(e, {
                        fields: {
                            "first-name": {
                                validators: {
                                    notEmpty: { message: "First Name is required" },
                                },
                            },
                            "last-name": {
                                validators: {
                                    notEmpty: { message: "Last Name is required" },
                                },
                            },
                            email: {
                                validators: {
                                    regexp: {
                                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                        message:
                                            "The value is not a valid email address",
                                    },
                                    notEmpty: {
                                        message: "Email address is required",
                                    },
                                },
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: "The password is required",
                                    },
                                    callback: {
                                        message: "Please enter valid password",
                                        callback: function (e) {
                                            if (e.value.length > 0) return s();
                                        },
                                    },
                                },
                            },
                            "confirm-password": {
                                validators: {
                                    notEmpty: {
                                        message:
                                            "The password confirmation is required",
                                    },
                                    identical: {
                                        compare: function () {
                                            return e.querySelector(
                                                '[name="password"]'
                                            ).value;
                                        },
                                        message:
                                            "The password and its confirm are not the same",
                                    },
                                },
                            },
                            toc: {
                                validators: {
                                    notEmpty: {
                                        message:
                                            "You must accept the terms and conditions",
                                    },
                                },
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger({
                                event: { password: !1 },
                            }),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: "",
                            }),
                        },
                    })),
                    t.addEventListener("click", function (s) {
                        s.preventDefault(),
                            a.revalidateField("password"),
                            a.validate().then(function (a) {
                                "Valid" == a
                                    ? (t.setAttribute("data-kt-indicator", "on"),
                                      (t.disabled = !0),
                                      setTimeout(function () {
                                          t.removeAttribute("data-kt-indicator"),
                                              (t.disabled = !1),
                                              Swal.fire({
                                                  text: "You have successfully reset your password!",
                                                  icon: "success",
                                                  buttonsStyling: !1,
                                                  confirmButtonText: "Ok, got it!",
                                                  customClass: {
                                                      confirmButton:
                                                          "btn btn-primary",
                                                  },
                                              }).then(function (t) {
                                                  if (t.isConfirmed) {
                                                      e.reset(), r.reset();
                                                      var a = e.getAttribute(
                                                          "data-kt-redirect-url"
                                                      );
                                                      a && (location.href = a);
                                                  }
                                              });
                                      }, 1500))
                                    : Swal.fire({
                                          text: "Sorry, looks like there are some errors detected, please try again.",
                                          icon: "error",
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, got it!",
                                          customClass: {
                                              confirmButton: "btn btn-primary",
                                          },
                                      });
                            });
                    }),
                    e
                        .querySelector('input[name="password"]')
                        .addEventListener("input", function () {
                            this.value.length > 0 &&
                                a.updateFieldStatus("password", "NotValidated");
                        });
            },
        };
    })();
    KTUtil.onDOMContentLoaded(function () {
        KTSignupGeneral.init();
    });
    









// $('#kt_sign_up_form').ready(()=>{

// // Define form element
// const signUpForm = document.getElementById('kt_sign_up_form');


// // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
// var validatorReg = FormValidation.formValidation(
//     signUpForm,
//     {
//         fields: {
//             'first-name': {
                
//                 validators: {
//                     notEmpty: {
//                         message: 'Email is required'
//                     },
                    
                    
//                 }
//             },
//             'last-name': {
                
//                 validators: {
//                     notEmpty: {
//                         message: 'Email is required'
//                     },
//                 }
//             },
//             'email': {
                
//                 validators: {
//                     notEmpty: {
//                         message: 'Email is required'
//                     },
//                     emailAddress:{
//                         message: "pls enter a Valid Email address"
//                     },
                    
//                 }
//             },
//             // 'current_password': {
//             //     validators: {
//             //         notEmpty: {
//             //             message: 'Current password is required'
//             //         }
//             //     }
//             // },
//             'password': {
//                 validators: {
//                     notEmpty: {
//                         message: 'The password is required'
//                     },
//                     // lessThan: {
//                     //     inclusive: true,
//                     //     max: 12,
//                     //     message:'password must be less than 12'
//                     // },
//                     // greaterThan: {
//                     //     inclusive: true,
//                     //     min: 8,
//                     //     message:'password must be greater than 8'
//                     // },
//                     callback: {
//                         message: 'Please enter valid password',
//                         callback: function (input) {
//                             if (input.value.length > 0) {
//                                 return validatePassword();
//                             }
//                         }
//                     }
//                 }
//             },
//             'confirm-password': {
//                 validators: {
//                     notEmpty: {
//                         message: 'The password confirmation is required'
//                     },
//                     identical: {
//                         compare: function () {
//                             return signUpForm.querySelector('[name="password"]').value;
//                         },
//                         message: 'The password and its confirm are not the same'
//                     }
//                 }
//             },
//         },

//         plugins: {
//             trigger: new FormValidation.plugins.Trigger(),
//             bootstrap: new FormValidation.plugins.Bootstrap5({
//                 rowSelector: '.fv-row',
//                 eleInvalidClass: '',
//                 eleValidClass: ''
//             })
//         }
        
//     },
//     ()=>{
//         e
//         .querySelector('input[name="password"]')
//         .addEventListener("input", function () {
//             this.value.length > 0 &&
//                 a.updateFieldStatus("password", "NotValidated");
//         });
//     }
    
// );

// // Submit button handler
// const SignUpButton = document.getElementById('signupbtn');
// SignUpButton.addEventListener('click', function (e) {
//     // Prevent default button action
//     e.preventDefault();

//     // Validate form before submit
//     if (validatorReg) {
//         validatorReg.validate().then(function (status) {
//             console.log('validated!');

//             if (status == 'Valid') {
//                 // Show loading indication
//                 SignUpButton.setAttribute('data-kt-indicator', 'on');

//                 // Disable button to avoid multiple click
//                 SignUpButton.disabled = true;

//                 // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
//                 setTimeout(function () {
//                     // Remove loading indication
//                     SignUpButton.removeAttribute('data-kt-indicator');

//                     // Enable button
//                     SignUpButton.disabled = false;

//                     // Show popup confirmation
//                     Swal.fire({
//                         text: "Form has been successfully Verified!",
//                         icon: "success",
//                         buttonsStyling: false,
//                         confirmButtonText: "Ok, got it!",
//                         customClass: {
//                             confirmButton: "btn btn-primary"
//                         }
//                     });

//                     //form.submit(); // Submit form
//                     setTimeout(() => {
//                         signUpForm.submit()
//                     }, 1300);
//                 }, 2000);
//             }else{
//                 // Show popup confirmation
//                 Swal.fire({
//                     text: "Error Detected, please check the form and make corrections!",
//                     icon: "error",
//                     buttonsStyling: true,
//                     confirmButtonText: "Ok, got it!",
//                     customClass: {
//                         confirmButton: "btn btn-primary"
//                     }
//                 });
//             }
//         });
//     }
// });

// });

//==================================================validate signup===========================================================\\