$(document).ready(function () {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");

    jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
       }, "Value must not equal arg.");

    $('#registrationForm').validate({ // initialize the plugin
        rules: {
            parentName: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            lastName: {
              required: true,
              minlength: 2,
              lettersonly: true
            },
            email: {
                required: true,
                email: true,
                minlength: 5
            },
            phone: {
                required: true,
                digits: true,
                minlength: 8,
            },
            carrier: {
                required: true,
                valueNotEquals:"default",
            },

            kidname: {
                required: true,
                minlength: 2
            },
            age: {
                required: true,
                valueNotEquals:"",
            },
            week: {
                required: true,
                valueNotEquals:"",
            },
            checkbox:{
                required: true,
            },
            checkbox2:{
                required: true,
            },
        },
        messages:{
            parentName:
            {
                required: "Please enter the parent or custodian name",
            },
            lastName:
            {
              required: "Please enter the Parent/ Custodian last name",
            },
            email:{
                required:"Please enter your email",
                },
            phone:{
                required:"Please provide a valid phone number",
                },
            carrier:{
                required:"Please select a Carrier",
                },
            kidname:{
                required:"Please enter the Student name",
                },
            age:{
                required:"Please select Student Age",
                },
            week:{
                required:"Please select the desired camp week",
                },
            checkbox:{
                required:"You must agree with our Terms & Conditions to Sign Up",
                },
            checkbox2:{
                required:"You must comply with Height and Weight Requirements to Sign Up",
                },
        },
        submitHandler: function (form) { // for demo
        //alert('right after validation');
        var parentName = $("#parentName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var studentName = $("#studentName").val();
        var carrier = $("#carrier :selected").val();
        var age = $("#age :selected").text();
        var week = $("#week :selected").text();

        //alert("Parent Name: " + parentName + '\n' + "Email: "+ email + '\n' + "Phone: " + phone +'\n' + "Student Name: "+ studentName + '\n'+ "Carrier: " + carrier + '\n'+ "Age: " + age + '\n' + "Week: " + week);
        var url = "server/db.php"; // the script where you handle the form input.
        console.log(url);
        var data = {parentName:parentName, lastName: lastName, email:email, phone:phone, studentName: studentName, carrier:carrier, age:age, week:week};
        console.log(data);
        //alert(data['lastName']);
    $.ajax({
           type: "POST",
           url: url,
           data: data, // serializes the form's elements.
           success: function(data)
           {
               //alert(data); // show response from the php script.
               $('#registration').hide();
               $('#confirmed').css("display", "block");
               $('html, body').animate({
                    scrollTop: $("#scrollingPoint").offset().top
                }, 20);
           }
         });
        return false; // for demo
        }
    });

});

//function SubmitFormData() {
//
//    alert('after validation');
//    var parentName = $("#parentName").val();
//    var email = $("#email").val();
//    var phone = $("#phone").val();
//    var studentName = $("#studentName").val();
//    var carrier = $("#carrier :selected").val();
//    var age = $("#age :selected").val();
//    var week = $("#week :selected").text();
//    alert("Parent Name: " + parentName + '\n' + "Email: "+ email + '\n' + "Phone: " + phone +'\n' + "Student Name: "+ studentName + '\n'+ "Carrier: " + carrier + '\n'+ "Age: " + age + '\n' + "Week: " + week);
//    // Validation Code
//}
//
