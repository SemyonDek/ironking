function addGallery() {
  let form = document.getElementById("addGalleryForm");

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

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/gallery/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Фотография добавлена");
    document.getElementById("list-category-block").innerHTML =
      xhr.response.getElementById("list-category-block").innerHTML;

    data.forEach((element) => {
      document.getElementById(element["name"]).value = null;
    });
  };
}

function delGallery(id) {
  let formData = new FormData();
  formData.append("idGallery", id);
  var url = "../functions/gallery/del.php";

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
