let elt = document.getElementById("value-prod");

elt.addEventListener("input", (e) => {
  e.target.value =
    Number(e.target.value) < 1
      ? 1
      : Number(e.target.value) > Number(elt.max)
      ? elt.max
      : e.target.value;
});

function validate(evt) {
  var theEvent = evt || window.event;
  if (theEvent.type === "paste") {
    key = event.clipboardData.getData("text/plain");
  } else {
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
  }
  var regex = /[0-9]/;
  if (!regex.test(key)) {
    theEvent.returnValue = false;
    if (theEvent.preventDefault) theEvent.preventDefault();
  }
}
