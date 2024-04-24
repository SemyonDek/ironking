let leftBut = document.getElementById("button-project-left"),
  rightBut = document.getElementById("button-project-right"),
  slider = document.getElementById("sliders-photos-project-block"),
  valueStr = document.getElementById("count-sledes-photos").value,
  slideProdSaleIndex = 1;

function swipeProdSale(n) {
  if (n == 1) {
    if (slideProdSaleIndex < valueStr) {
      slider.style.left = "-" + slideProdSaleIndex * 240.5 + "px";
      slideProdSaleIndex += 1;
    }
  } else if (n == -1) {
    if (slideProdSaleIndex > 1) {
      slideProdSaleIndex -= 1;
      slider.style.left = "-" + (slideProdSaleIndex - 1) * 240.5 + "px";
    }
  }
}

leftBut.onclick = function () {
  swipeProdSale(-1);
};
rightBut.onclick = function () {
  swipeProdSale(1);
};
