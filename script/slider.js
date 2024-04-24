function addSlider() {
  let form = document.getElementById("addSliderForm");
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

      if (element["name"].startsWith("img-slider")) {
        alert("Добавьте изображение");
      } else document.getElementById(element["name"]).style = style_input_red;
    } else document.getElementById(element["name"]).style = style_input_gray;
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/slider/add.php";

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

function delSlider(id) {
  let formData = new FormData();
  formData.append("idSlide", id);

  var url = "../functions/slider/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Слайд удален");
    document.getElementById("list-category-block").innerHTML =
      xhr.response.getElementById("list-category-block").innerHTML;
  };
}

function updSlider() {
  let form = document.getElementById("addSliderForm");
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
    if (element["value"] == "" && !element["name"].startsWith("img-slider")) {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else document.getElementById(element["name"]).style = style_input_gray;
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/slider/upd.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Категория изменена");
    console.log(xhr.response);
  };
}
