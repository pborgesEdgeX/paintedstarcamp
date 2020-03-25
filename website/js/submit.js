function myFunction(val){
  $.post('server/check.php',{week: $('#week').val()}, function(data){
      if(data.total > 15){
        $("#error_fully_booked").show();
        $("#submitFormData").val("Waitlist Me!");
      } else{
        $("#error_fully_booked").hide();
        $("#submitFormData").val("Submit");
      }
      }, 'JSON');
   }

$(document).ready(function () {

  $("#error_fully_booked").hide();

  $("#age").change(function(){
     $(this).find("option:selected").each(function(){
         var optionValue = $(this).attr("value");
         if(optionValue == ""){
           $("#week").prop("disabled", true);
         }
         else{
           $("#week").prop("disabled", false);
         }
         if(optionValue == "four" || optionValue == "five" || optionValue == "six"){
           $('#week').children('option[value="June 22nd - 26th"]').hide();
           $('#week').children('option[value="July 6th - 10th"]').hide();
           $('#week').children('option[value="July 20th - 24th"]').hide();
           $('#week').children('option[value="July 27th - 31st"]').hide();
         } else{
           $('#week').children('option[value="June 22nd - 26th"]').show();
           $('#week').children('option[value="July 6th - 10th"]').show();
           $('#week').children('option[value="July 20th - 24th"]').show();
           $('#week').children('option[value="July 27th - 31st"]').show();
         }
     });
 }).change();


    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      }, "Please only type one word in this field (Also, No Numbers allowed)");

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
        var payment = "unpaid";
        var waitlisted = "NO";

        $.ajax({
          type: 'POST',
          async: false,
          url: "server/check.php",
          data: {week: $('#week').val()},
          success: function(data)
          {
            if (data.total > 15)
            {
              waitlisted = "YES";
            }
          }
      });

        var url = "server/db.php"; // the script where you handle the form input.
        console.log(url);
        var data = {parentName:parentName, lastName: lastName, email:email, phone:phone, studentName: studentName, carrier:carrier, age:age, week:week, waitlisted: waitlisted, payment: payment};
        console.log(data);

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
               }, 1000);
           }
         });
        return false; // for demo
        }
    });

});
