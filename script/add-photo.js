function addPhotos() {
  let file = document.getElementById("file_photo");
  if (file.value == "") {
    alert("Изображение не выбрано");
    return;
  }

  let div = document.createElement("div");
  div.className = "photo_add";
  let block = document.getElementById("phot_prod_add");

  var img = file.files[0];

  var reader = new FileReader();

  var src;

  reader.onload = function () {
    src = reader.result;

    if (document.getElementById("file_photo_1").files.length == 0) {
      document.getElementById("file_photo_1").files = file.files;

      div.id = "photo_1";
      div.innerHTML =
        '<button class="del_photo" type="button" onclick="delPhoto(' +
        "'photo_1'" +
        ')">✕</button>';
      div.style.backgroundImage = "url(" + src + ")";
      block.append(div);
    } else if (document.getElementById("file_photo_2").files.length == 0) {
      document.getElementById("file_photo_2").files = file.files;

      div.id = "photo_2";
      div.innerHTML =
        '<button class="del_photo" type="button" onclick="delPhoto(' +
        "'photo_2'" +
        ')">✕</button>';
      div.style.backgroundImage = "url(" + src + ")";
      block.append(div);
    } else if (document.getElementById("file_photo_3").files.length == 0) {
      document.getElementById("file_photo_3").files = file.files;

      div.id = "photo_3";
      div.innerHTML =
        '<button class="del_photo" type="button" onclick="delPhoto(' +
        "'photo_3'" +
        ')">✕</button>';
      div.style.backgroundImage = "url(" + src + ")";
      block.append(div);
    } else if (document.getElementById("file_photo_4").files.length == 0) {
      document.getElementById("file_photo_4").files = file.files;

      div.id = "photo_4";
      div.innerHTML =
        '<button class="del_photo" type="button" onclick="delPhoto(' +
        "'photo_4'" +
        ')">✕</button>';
      div.style.backgroundImage = "url(" + src + ")";
      block.append(div);
    } else if (document.getElementById("file_photo_5").files.length == 0) {
      document.getElementById("file_photo_5").files = file.files;

      div.id = "photo_5";
      div.innerHTML =
        '<button class="del_photo" type="button" onclick="delPhoto(' +
        "'photo_5'" +
        ')">✕</button>';
      div.style.backgroundImage = "url(" + src + ")";
      block.append(div);
    } else {
      alert("Можно загрузить только 5 изображений!");
      return;
    }
  };

  if (img) {
    reader.readAsDataURL(img);
  } else {
    preview.src = "";
  }
}

function delPhoto(id) {
  document.getElementById(id).remove();
  document.getElementById("file_" + id).value = "";
}
