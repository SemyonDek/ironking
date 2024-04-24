function addProduct() {
  let form = document.getElementById("addProdForm");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return { name, value };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #000;";

  prov = true;

  data.forEach((element) => {
    if (
      element["value"] == "" &&
      (!element["name"].startsWith("file_photo_") ||
        element["name"].startsWith("file_photo_1"))
    ) {
      prov = false;
      if (element["name"].startsWith("file_photo_1")) {
        alert("Добавьте изображение");
      } else {
        document.getElementById(element["name"]).style = style_input_red;
      }
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/product/add.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);

    data.forEach((element) => {
      if (element["value"] !== "") {
        document.getElementById(element["name"]).value = "";

        if (element["name"].startsWith("file_photo_")) {
          document.getElementById(element["name"].substr(5)).remove();
        }
      }
    });
    document.getElementById("file_photo").value = null;
  };
}

function delProduct(id) {
  if (id !== "") {
    let formData = new FormData();
    formData.append("idProd", id);

    var url = "../functions/product/del.php";

    let xhr = new XMLHttpRequest();
    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      alert("Товар удален");
      document.getElementById("product-block").innerHTML =
        xhr.response.getElementById("product-block").innerHTML;
    };
  }
}

function updProduct() {
  const form = document.getElementById("addProdForm");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return { name, value };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #000;";

  prov = true;

  let elmentFilePhoto = Array();

  data.forEach((element) => {
    if (element["name"].startsWith("file_photo_")) {
      elmentFilePhoto.push(element);
    }
    if (
      element["value"] == "" &&
      !element["name"].startsWith("file_photo_") &&
      (!element["name"].startsWith("color") ||
        element["name"].startsWith("color1"))
    ) {
      prov = false;
      if (element["name"].startsWith("file_photo_1")) {
        alert("Добавьте изображение");
      } else {
        document.getElementById(element["name"]).style = style_input_red;
      }
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  let fileCount = 0;
  for (let i = 1; i < 6; i++) {
    if (document.getElementById("photo_" + i) !== null) {
      fileCount++;
    }
  }

  if (fileCount == 0) {
    alert("Добавьте изображение");
    prov = false;
  }

  let FilesUpdDell = Array();
  for (let i = 0; i < 5; i++) {
    if (elmentFilePhoto[i]["value"] == "") {
      if (document.getElementById("photo_" + (i + 1)) == null) {
        FilesUpdDell.push(1);
      } else FilesUpdDell.push(0);
    } else FilesUpdDell.push(0);
  }

  if (!prov) return;

  let formData = new FormData(form);

  let i = 0;
  FilesUpdDell.forEach((element) => {
    i++;
    formData.append("FilesDell_" + i, element);
  });

  var url = "../functions/product/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);
  };
}
