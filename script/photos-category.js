function addPhotosCategory() {
  let form = document.getElementById("addImgCategoryForm");
  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;
      return { name, value };
    });

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      alert("Добавьте изображение");
    }
  });

  let catid = document.getElementById("category-img-id");

  if (catid.value == "") {
    prov = false;
    alert("Выберите категорию");
  }

  if (!prov) return;

  let formData = new FormData(form);
  formData.append("idCat", catid.value);

  var url = "../functions/photos-category/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response.getElementById("list-category-block") !== null) {
      alert("Фотография добавлена");
      document.getElementById("list-category-block").innerHTML =
        xhr.response.getElementById("list-category-block").innerHTML;
    } else {
      alert("Достигнут лимит (4 изображения)");
    }
    data.forEach((element) => {
      document.getElementById(element["name"]).value = null;
    });
  };
}

function delPhotosCategory(id) {
  let formData = new FormData();
  formData.append("idPhotoCat", id);
  var url = "../functions/photos-category/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Фотография удалена");
    document.getElementById("list-category-block").innerHTML =
      xhr.response.getElementById("list-category-block").innerHTML;
  };
}
