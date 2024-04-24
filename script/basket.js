function addBasket(id) {
  let value = document.getElementById("value-prod").value;

  let formData = new FormData();
  formData.append("idProd", id);
  formData.append("value", value);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    document.getElementById("basket-button").innerHTML =
      xhr.response.getElementById("basket-button").innerHTML;
  };
}

function delBasket(id) {
  let formData = new FormData();
  formData.append("id", id);

  var url = "functions/basket/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    // alert("Товар удален из корзины");
    document.getElementById("basket-main-block").innerHTML =
      xhr.response.getElementById("basket-main-block").innerHTML;
    document.getElementById("basket-button").innerHTML =
      xhr.response.getElementById("basket-button").innerHTML;
    // document.getElementById("price-line-basket").innerHTML =
    //   xhr.response.getElementById("price-line-basket").innerHTML;
  };
}
