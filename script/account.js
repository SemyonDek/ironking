function updAccount() {
  let form = document.getElementById("accountForm");
  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return { name, value };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #d5dadc;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      document.getElementById(element["name"]).style = style_input_red;
      prov = false;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/account/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);
  };
}
