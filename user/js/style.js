function Validate() {
  //Input value declare
  var firstname = document.getElementById("fname");
  var lastname = document.getElementById("lname");
  var mobile = document.getElementById("mble");
  var email = document.getElementById("email");
  var gender = document.getElementById("gender");
  var password = document.getElementById("pass");
  var conpass = document.getElementById("conpass");

  //Error declare
  var fnameErr = document.getElementById("fnameErr");
  var lnameErr = document.getElementById("lnameErr");
  var mobileErr = document.getElementById("mobileErr");
  var emailErr = document.getElementById("emailErr");
  var genderErr = document.getElementById("genderErr");
  var passErr = document.getElementById("passErr");
  var conpassErr = document.getElementById("conpassErr");

  //Name validation
  var letters = /^[a-zA-Z\s]*$/;
  var fname = firstname.value;
  var fnamelength = fname.length;

  //Email validation
  var validEmail =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  //Password validation
  var pass = password.value;
  var passLength = pass.length;

  //Name length
  var lname = lastname.value;
  var lnameLength = lname.length;

  //First name code
  if (firstname.value == "") {
    fnameErr.innerHTML = " *Name is required";
    firstname.focus();
    firstname.style.background = "#ac2a2a";
    firstname.style.color = "White";
    fnameErr.classList.add("error");
    return false;
  }

  if (!firstname.value.match(letters)) {
    fnameErr.innerHTML = " * Name will alphabet only";
    fnameErr.classList.add("error");
    return false;
  }

  if (fnamelength < 3) {
    fnameErr.innerHTML = " * at least 2 or more letters provided";
    fnameErr.classList.add("error");
    return false;
  }

  //Last name validation code
  if (lastname.value == "") {
    lnameErr.innerHTML = " *Name is required";
    lnameErr.classList.add("error");
    lastname.focus();
    return false;
  }

  if (!lastname.value.match(letters)) {
    lnameErr.innerHTML = " * Name will alphabet only";
    lnameErr.classList.add("error");
    return false;
  }

  if (lnameLength < 3) {
    lnameErr.innerHTML = " * at least 2 or more letters provided";
    lnameErr.classList.add("error");
    return false;
  }

  //Mobile number validation code
  if (mobile.value == "") {
    mobileErr.innerHTML = " *Mobile number must be filled";
    mobileErr.classList.add("error");
    return false;
  }

  if (isNaN(mobile.value)) {
    mobileErr.innerHTML = " *Mobile number only number!";
    mobileErr.classList.add("error");
    return false;
  }

  //Email validation code
  if (email.value == "") {
    emailErr.innerHTML = " *Email missing";
    return false;
  }

  if (!email.value.match(validEmail)) {
    emailErr.innerHTML = " *Please input a valid email address";
    emailErr.classList.add("error");
    return false;
  }

  if (gender.value == "") {
    genderErr.innerHTML = " *Please select gender";
    return false;
  }

  //Password validation
  if (password.value == "") {
    passErr.innerHTML = " *Set your strong password";
    passErr.classList.add("error");
    return false;
  }

  if (passLength < 8) {
    passErr.innerHTML = " *Password at least 8 characters";
    passErr.classList.add("error");
    return false;
  }

  if (conpass.value != password.value) {
    conpassErr.innerHTML = " *Your password does not match!";
    conpassErr.classList.add("error");
    conpass.focus();
    return false;
  }
}

//Fixed header JS code here...

window.onscroll = function () {
  myFunction();
};

var header = document.getElementById("stickyheader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

//Text Formating JS code here...

//For p tag text js code
const paraText = document.getElementsByClassName("para_text");
for (var i = 0; i < paraText.length; i++) {
  const para = paraText[i].innerText;
  const paraSlice = para.slice(0, 48);
  paraText[i].innerText = paraSlice + "...";
}

//For activities head element JS code here
const headText = document.getElementsByClassName("Para_head");
for (var i = 0; i < headText.length; i++) {
  const head = headText[i].innerText;
  const headSlice = head.slice(0, 24);
  headText[i].innerHTML = headSlice + "...";
}

//form validation of Edit Profile JS code start from here...

function formValidate() {
  var father = document.getElementById("father");
  var mother = document.getElementById("mother");
  var school = document.getElementById("school");
  var college = document.getElementById("college");
  var varsity = document.getElementById("varsity");
  var district = document.getElementById("district");
  var policestation = document.getElementById("policestation");
  var area = document.getElementById("area");

  //Error detects
  var ferror = document.getElementById("ferror");
  var merror = document.getElementById("merror");
  var erschool = document.getElementById("erschool");
  var ercollege = document.getElementById("ercollege");
  var errvarsity = document.getElementById("errvarsity");
  var errdistrict = document.getElementById("errdistrict");
  var errpoliceStation = document.getElementById("errpoliceStation");
  var errvillage = document.getElementById("errvillage");

  if (!isNaN(father.value)) {
    ferror.innerHTML = " * Name only character";
    ferror.style.color = "Red";
    return false;
  }

  if (!isNaN(area.value)) {
    errvillage.innerHTML = " * Name only character";
    errvillage.style.color = "Red";
    return false;
  }

  if (!isNaN(school.value)) {
    erschool.innerHTML = " * Name only character";
    erschool.style.color = "Red";
    return false;
  }

  if (!isNaN(ercollege.value)) {
    ercollege.innerHTML = " * Name only character";
    ercollege.style.color = "Red";
    return false;
  }

  if (!isNaN(varsity.value)) {
    errvarsity.innerHTML = " * Name only character";
    errvarsity.style.color = "Red";
    return false;
  }

  if (!isNaN(district.value)) {
    errdistrict.innerHTML = " * Name only character";
    errdistrict.style.color = "Red";
    return false;
  }

  if (!isNaN(policestation.value)) {
    errpoliceStation.innerHTML = " * Name only character";
    errpoliceStation.style.color = "Red";
    return false;
  }

  if (!isNaN(errvillage)) {
    errvillage.innerHTML = " * Name only character";
    errvillage.style.color = "Red";
    return false;
  }
}

//form validation of Edit Profile JS code end from here...

//data toggle JS code start from here
function worktoggle() {
  var user_items = document.getElementById("user_items");
  if (user_items.style.display === "none") {
    user_items.style.display = "block";
    user_items.classList.add("user_items");
  } else {
    user_items.style.display = "none";
  }
}
//data toggle JS code end from here

//modal JS code start from here

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

//modal JS code start from here

function opencity(tabname) {
  var i, picture_style, picture_style_active;
  picture_style_active = document.getElementsByClassName(
    "picture_style_active"
  );
  picture_style = document.getElementsByClassName("picture_style");
  for (i = 0; i < picture_style.length; i++) {
    picture_style[i].style.display = "none";
  }
  for (i = 0; i < picture_style_active.length; i++) {
    picture_style_active[i].style.display = "none";
  }
  document.getElementById(tabname).style.display = "block";
  //picture_style_active.style.display = "none";
}

/**Update cover photo modal JS code start from here** */
// Get the modal
var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var upbtn = document.getElementById("upbtn");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal
upbtn.onclick = function () {
  modal1.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span1.onclick = function () {
  modal1.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal1.style.display = "none";
  }
};

/**Update cover photo modal JS code end from here** */

/**Hospital Search ajax js code start from  here* */
function showdistrict(str) {
  if (str.length == 0) {
    document.getElementById("district").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
      document.getElementById("district").innerHTML = this.responseText;
    };
    xmlhttp.open("POST", "district.php?q=" + str);
    xmlhttp.send();
  }
}

function showhospital() {
  var district = document.getElementById("district").value;
  if (district != null) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
      document.getElementById("medical").innerHTML = this.responseText;
    };
    xmlhttp.open("POST", "get_hospital.php?w=" + district);
    xmlhttp.send();
  }
}
/**Hospital Search ajax js code end from  here* */

/**Current location  js code start  from  here* */

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;
  document.querySelector('.myForm input[name = "lat"]').value = lat;
  document.querySelector('.myForm input[name = "lng"]').value = long;
}

/**Current location  js code end from  here* */

/**User comment Ajax,js code start from here* */
function userComment() {
  var uid = document.getElementById("u_id").value;
  var nid = document.getElementById("n_id").value;
  var comment = document.getElementById("comment").value;
  var retrunMsg = document.getElementById("retrunMsg");

  var dataItem = "uid1=" + uid + "&nid1=" + nid + "&comment1=" + comment;

  if (comment == "") {
    alert("Please write something..!");
  } else {
    $.ajax({
      type: "POST",
      url: "ajax/save.php",
      data: dataItem,
      cache: false,
      success: function (html) {
        retrunMsg.innerHTML = html;
      },
    });
  }
  return false;
}
/**User comment Ajax,js code end from here* */

/**Activity news comment ajax,js start from here** */
function activityComment() {
  var uid = document.getElementById("u_id").value;
  var aid = document.getElementById("a_id").value;
  var comment = document.getElementById("comment").value;
  var retrunMsg = document.getElementById("retrunMsg");

  var dataString = "uId=" + uid + "&aId=" + aid + "&cmnt=" + comment;

  if (comment == "") {
    alert("Please write something");
  } else {
    $.ajax({
      type: "POST",
      url: "ajax/activityComment.php",
      data: dataString,
      success: function (html) {
        retrunMsg.innerHTML = html;
      },
    });
  }
  return false;
}
/**Activity news comment ajax,js end from here** */

function mail() {
  var email = document.getElementById("email1");
  if (email.style.display === "none") {
    email.style.display = "block";
  } else {
    email.style.display = "none";
  }
}

function msg() {
  var email2 = document.getElementById("email2");
  if (email2.style.display === "none") {
    email2.style.display = "block";
  } else {
    email2.style.display = "none";
  }
}

/**Ambulance page Ajxa,js code start from here* */

/**Ambulance page Ajxa,js code end from here* */
