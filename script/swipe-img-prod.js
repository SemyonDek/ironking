let imgBlock = document.getElementById("line-prod-img-block");
let imgList = document.getElementsByClassName("line-prod-img-item");

imgBlock.onclick = function (e) {
  for (let i = 0; i < imgList.length + 1; i++) {
    if (
      e.target.classList.contains("line-prod-img-item") &&
      e.target == imgList[i - 1]
    ) {
      sliderMainPhoto(i);
    }
  }
};

function sliderMainPhoto(id) {
  document.getElementById("main-img-prod").src =
    document.getElementsByClassName("line-prod-img-item")[id - 1].src;
}
