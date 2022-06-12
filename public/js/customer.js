let showSearchBtn = document.getElementById("show-search-form"),
    closeSearchBtn = document.getElementById("close-search-form"),
    searchForm = document.getElementById("search-form"),
    gridLayout = document.getElementById("gridLayout"),
    listLayout = document.getElementById("listLayout"),
    productShowcase = document.getElementById("product-showcase");



// The logic of the form (open/close)
showSearchBtn.addEventListener("click", () => {
    searchForm.classList.add("open");
});
closeSearchBtn.addEventListener("click", () => {
    searchForm.classList.remove("open");
});
searchForm.addEventListener("submit", () => {
    searchForm.classList.remove("open");
});
// The logic of the list/grid layout
listLayout.addEventListener("click", () => {
    productShowcase.classList.add("list");
});
gridLayout.addEventListener("click", () => {
    productShowcase.classList.remove("list");
});
