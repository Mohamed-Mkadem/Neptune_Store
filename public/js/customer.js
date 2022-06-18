let showSearchBtn = document.getElementById("show-search-form"),
    closeSearchBtn = document.getElementById("close-search-form"),
    searchForm = document.getElementById("search-form"),
    gridLayout = document.querySelectorAll(".gridLayout"),
    listLayout = document.querySelectorAll(".listLayout"),
    filterForm = document.getElementById("filter-form"),
    openFilterBtn = document.getElementById("filterBtn"),
    closeFilterBtn = document.getElementById("close-filter-form"),
    catButtons = document.querySelectorAll(".catBtn"),
    subCategoriesHolder = document.getElementById("subCategoriesHolder"),
    productShowcase = document.getElementById("product-showcase");

// The logic of the form (open/close)

if (showSearchBtn) {
    showSearchBtn.addEventListener("click", () => {
        searchForm.classList.add("open");
    });
}
if (closeSearchBtn) {
    closeSearchBtn.addEventListener("click", () => {
        searchForm.classList.remove("open");
    });
}
if (searchForm) {
    searchForm.addEventListener("submit", () => {
        searchForm.classList.remove("open");
    });
}
// The logic of the list/grid layout
if (listLayout) {
    listLayout.forEach((listBtn) => {
        listBtn.addEventListener("click", () => {
            productShowcase.classList.add("list");
        });
    });
}
if (gridLayout) {
    gridLayout.forEach((gridBtn) => {
        gridBtn.addEventListener("click", () => {
            productShowcase.classList.remove("list");
        });
    });
}
if (window.innerWidth < 500) {
    productShowcase.classList.add("list");
}
if (openFilterBtn) {
    openFilterBtn.addEventListener("click", () => {
        filterForm.classList.toggle("open");
    });
}
if (closeFilterBtn) {
    closeFilterBtn.addEventListener("click", () => {
        filterForm.classList.toggle("open");
    });
}
//

// if(catButtons){
//     catButtons.forEach((btn) =>{
//         btn.addEventListener('click', ()=>)
//     })
// }

function getSubCategories(id) {
    var myRequest = new XMLHttpRequest();
    var thrUrl = "api/subCategories" + "/" + id;
    myRequest.open("GET", thrUrl, true);

    // function execute after request is successful
    myRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let myData = JSON.parse(this.responseText);
            // Removing the old data form the holder
            subCategoriesHolder.innerHTML = "";
            if (myData.length > 0) {
                for (let i = 0; i < myData.length; i++) {
                    // Creating the label of the input
                    let label = document.createElement("label");
                    // Adding the pointer class to the label
                    label.classList.add("pointer");
                    // Adding the for attribute and setting the id value to it
                    label.setAttribute("for", myData[i].id);
                    // Creating the name of the sub Category
                    theName = document.createTextNode(myData[i].name);
                    // Creating the input of the sub Category
                    let input = document.createElement("input");
                    // Appending the input on the label
                    label.appendChild(input);
                    // adding the name of the category to the input
                    label.appendChild(theName);
                    // Adding the attributes to the input
                    input.setAttribute("value", myData[i].id);
                    input.setAttribute("checked", true);
                    input.setAttribute("type", "checkbox");
                    input.setAttribute("id", myData[i].id);
                    input.setAttribute("name", "subCategories[]");

                    subCategoriesHolder.appendChild(label);
                    console.log(subCategoriesHolder);
                }
            } else {
                // In Case that the Category is empty this message appears
                subCategoriesHolder.innerHTML = `
                    <h2 class="empty main ff-elmessiri"> No Sub-Categories in this Category</h2>
                `;
            }
        }
    };
    myRequest.send();
}

// The logic of the qunatity to add to the cart
function inc() {
    let number = document.querySelector('[name="number"]');
    number.value = parseInt(number.value) + 1;
}

function dec() {
    let number = document.querySelector('[name="number"]');
    if (parseInt(number.value) > 0) {
        if (number.value != 1) {
            number.value = parseInt(number.value) - 1;
        }
    }
}
