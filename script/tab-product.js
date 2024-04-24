let info = document.getElementById("button-info");
let blockinfo = document.getElementById("block-info");
let char = document.getElementById("button-char");
let blockchar = document.getElementById("block-char");

info.onclick = function () {
  document
    .getElementsByClassName("tab-button-active")[0]
    .classList.remove("tab-button-active");
  document
    .getElementsByClassName("tab-block-active")[0]
    .classList.remove("tab-block-active");

  info.classList.add("tab-button-active");
  blockinfo.classList.add("tab-block-active");
};
char.onclick = function () {
  document
    .getElementsByClassName("tab-button-active")[0]
    .classList.remove("tab-button-active");
  document
    .getElementsByClassName("tab-block-active")[0]
    .classList.remove("tab-block-active");

  char.classList.add("tab-button-active");
  blockchar.classList.add("tab-block-active");
};
