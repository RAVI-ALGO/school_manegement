//add student page

$(document).ready(function() {
  $("#fname,#lname,#MotherName,#FatherName,#country,#state,#city,#section,#Religion,#mtongue,#Occupation,#PrevSchool").keypress(function(n) {
      var keyCode = n.which;
       //alert(keyCode);
      if (keyCode >= 65 && keyCode <= 90 || keyCode >= 90 && keyCode <= 122 || keyCode > 31 && keyCode < 33 ) {
          return true;
      }
       else
          {
          alert("Neumerical value Not Allowed ");
          return false;
          }
  });

  $("#mobile,#landline,#schollar,#regNo,#Annual_Income,#AcNo,#Addhar,#Smagra").keypress(function(m) {
      var keyCode = m.which;
      if (keyCode >= 48 && keyCode <= 57) {
          return true;
      } else {
          alert("Alphabetic value Not Allowed");
          return false;
      }
  });

  $("#classStu").change(function() {
      $("#Stdymode").hide();
      $("#Stdystream").hide();
      var Class = $("#classStu").val();
      if (Class == "10th" || Class == "12th" || Class == "11th") {
          $("#Stdymode").show();
      }
      if (Class == "11th" || Class == "12th") {
          $("#Stdystream").show();
      }
  });
});
//admin registration page
$(document).ready(function () {
    $("#ename,#uname").keypress(function (n) {
      var keyCode = n.which;
      if (keyCode >= 65 && keyCode <= 90 || keyCode >= 90 && keyCode <= 122|| keyCode > 31 && keyCode < 33 ) {
        return true;
      }
      else

        alert("Neumerical value Not Allowed in Name");
      return false;
    });
    $("#mobile,#eid").keypress(function (m) {
      var keyCode = m.which;
      if (keyCode >= 48 && keyCode <= 57) {
        return true;
      }
      else {
        alert("Alphabetic value Not Allowed in Mobile no.");
        return false;
      }
    });

    $("#pass2,#pass1").keyup(function () {
      var pass1 = $("#pass1").val();
      var pass2 = $("#pass2").val();
      // alert(pass1);
      // alert(pass2);
      if (pass1 == pass2) {
        $("#errormsg").text("Password matched");
        $("#errormsg").css("color", "green");

      }
      else {
        $("#errormsg").text("Password Not matched");
        $("#errormsg").css("color", "red");
      }

    });
  });

  //rte student page
  $(document).ready(function() {
    $("#schollar").keypress(function(m) {
        var keyCode = m.which;
        if (keyCode >= 48 && keyCode <= 57) {
            return true;
        } else {
            alert("Alphabetic value Not Allowed");
            return false;
        }
    });
    $("#search_form").submit(function() {
        var Search_value = $("#schollar").val();
        if (Search_value == "") {
            $("#msg").text("Please fill schollar no.");
            return false;
        } else {
            return true;
        }
    });

});
