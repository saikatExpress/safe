function changeText() {
  var bb = document.getElementById("bb");
  bb.innerHTML = "Pending";
}

var close = document.getElementById("close");
close.addEventListener("click", function () {
  var success_msg = document.getElementById("success_msg");
  success_msg.style.display = "none";
});
