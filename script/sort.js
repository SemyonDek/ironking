function sortProd() {
  let sort = document.getElementById("sorting").value;
  document.getElementById("sort-filter").value = sort;
  let url = document.URL;
  if (sort !== "") {
    url = url + "&sort_select=" + sort;
  }
  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";
  xhr.open("GET", url);
  xhr.send();
  xhr.onload = () => {
    document.getElementById("product-block").innerHTML =
      xhr.response.getElementById("product-block").innerHTML;
  };
}
