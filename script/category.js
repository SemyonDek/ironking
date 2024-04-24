function addCategory() {
  let form = document.getElementById("addCategoryForm");
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
    if (element["value"] == "") {
      prov = false;
      if (
        element["name"].startsWith("min-img-category") ||
        element["name"].startsWith("max-img-category")
      ) {
        alert("Добавьте изображение");
      } else document.getElementById(element["name"]).style = style_input_red;
    } else document.getElementById(element["name"]).style = style_input_gray;
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/category/add.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);

    data.forEach((element) => {
      document.getElementById(element["name"]).value = null;
    });
  };
}

function delCategory(id) {
  let formData = new FormData();
  formData.append("idCat", id);

  var url = "../functions/category/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Категория удалена");
    document.getElementById("list-category-block").innerHTML =
      xhr.response.getElementById("list-category-block").innerHTML;
  };
}

function updCategory() {
  let form = document.getElementById("addCategoryForm");
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
      !element["name"].startsWith("min-img-category") &&
      !element["name"].startsWith("max-img-category")
    ) {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else document.getElementById(element["name"]).style = style_input_gray;
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/category/upd.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Категория изменена");

    document.getElementById("min-cat-img").src =
      xhr.response.getElementById("min-cat-img").value;
    document.getElementById("max-cat-img").src =
      xhr.response.getElementById("max-cat-img").value;
  };
}
