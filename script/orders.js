function addOrders() {
  let form = document.getElementById("clientForm");
  let pay = document.getElementById("order-bonus-pay").checked;
  let bonus = document.getElementById("value-prod").value;

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
    if (element["value"] == "" && !element["name"].startsWith("comm-client")) {
      document.getElementById(element["name"]).style = style_input_red;
      prov = false;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  formData.append("pay", pay);
  formData.append("bonus", bonus);

  var url = "functions/orders/add.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);
    window.location.replace("index.php");
  };
}

function updOrder(id) {
  let status = document.getElementById("status-order").value;
  let formData = new FormData();
  formData.append("id", id);
  formData.append("status", status);
  var url = "../functions/orders/upd.php";
  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";
  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Состояние заказа изменено");
    document.getElementById("orders_block").innerHTML =
      xhr.response.getElementById("orders_block").innerHTML;
  };
}
