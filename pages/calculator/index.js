var modalRemove = document.getElementById("modal-remove");

var modalFilter = document.getElementById("modal-filter");

function modalFilterOpen () {
   modalFilter.style.display = "flex";
}

function modalRemoveOpen () {
   modalRemove.style.display = "flex";
}

window.onclick = function (event) {
   if (event.target == modalFilter) {
      modalFilter.style.display = "none";
   }
   if (event.target == modalRemove) {
      modalRemove.style.display = "none";
   }
}