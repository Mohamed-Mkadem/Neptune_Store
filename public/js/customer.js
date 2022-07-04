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
    productShowcase = document.getElementById("product-showcase"),
    inputs = document.querySelectorAll(".input"),
    inputHolders = document.querySelectorAll(".input-field"),
    showPasswordBtns = document.querySelectorAll(".show-password-btn"),
    signUpForm = document.getElementById("sign-up-form"),
    incBtns = document.querySelectorAll(".incBtn"),
    addToCartBtns = document.querySelectorAll(".addToCartBtn"),
    removeFromCartBtns = document.querySelectorAll(".remove-product"),
    decBtns = document.querySelectorAll(".decBtn");

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
            window.localStorage.setItem("showcase_layout", "list");
        });
    });
}
if (gridLayout) {
    gridLayout.forEach((gridBtn) => {
        gridBtn.addEventListener("click", () => {
            productShowcase.classList.remove("list");
            window.localStorage.setItem("showcase_layout", "grid");
        });
    });
}
if (productShowcase) {
    if (window.localStorage.getItem("showcase_layout") == "list") {
        productShowcase.classList.add("list");
    } else {
        productShowcase.classList.remove("list");
    }
}
if (window.innerWidth < 500 && productShowcase) {
    productShowcase.classList.add("list");
}
if (openFilterBtn && filterForm) {
    openFilterBtn.addEventListener("click", () => {
        filterForm.classList.toggle("open");
        // To prevent the scroll when the filter form is open
        document.body.style.maxHeight = "100%";
        document.body.style.overflowY = "hidden";
    });
}
if (closeFilterBtn && filterForm) {
    closeFilterBtn.addEventListener("click", () => {
        filterForm.classList.toggle("open");
        // To enable the scroll when the filter form is closed
        document.body.style.maxHeight = "max-content";
        document.body.style.overflowY = "visible";
    });
}
//


function getSubCategories(id) {
    var myRequest = new XMLHttpRequest();
    var thrUrl = "api/subCategories" + "/" + id;
    myRequest.open("GET", thrUrl, true);

    // function execute after connection is successful
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
    let number = document.querySelector('[name="quantity"]');
    number.value = parseInt(number.value) + 1;
}

function dec() {
    let number = document.querySelector('[name="quantity"]');
    if (parseInt(number.value) > 0) {
        if (number.value != 1) {
            number.value = parseInt(number.value) - 1;
        }
    }
}
// The logic of the Registration and login pages
if (inputs && inputHolders) {
    inputs.forEach((input) => {
        input.addEventListener("focus", () => {
            inputHolders.forEach((holder) => {
                holder.classList.remove("focus");
            });
            input.parentElement.classList.add("focus");
        });
    });
}
if (showPasswordBtns) {
    showPasswordBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            if (btn.previousElementSibling.getAttribute("type") == "password") {
                btn.previousElementSibling.setAttribute("type", "text");
            } else if (
                btn.previousElementSibling.getAttribute("type") == "text"
            ) {
                btn.previousElementSibling.setAttribute("type", "password");
            }
        });
    });
}
if (signUpForm) {
    errorMessage = document.getElementById("error-message");
    password = document.getElementById("password");
    confirmPassword = document.getElementById("confirm_password");

    signUpForm.addEventListener("submit", (e) => {
        if (password.value !== confirmPassword.value) {
            e.preventDefault();

            errorMessage.innerHTML = "passwords does not match";
        }
    });
}

// The logic of incrementig/decrementing the quantity of products in the cart
if (incBtns) {
    incBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            btn.previousElementSibling.value =
                parseInt(btn.previousElementSibling.value) + 1;
        });
    });
}
if (decBtns) {
    decBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            if (btn.nextElementSibling.value > 1) {
                btn.nextElementSibling.value =
                    parseInt(btn.nextElementSibling.value) - 1;
            }
        });
    });
}

// function addToCart(id) {
//     var myRequest = new XMLHttpRequest();
//     var theUrl = "http://127.0.0.1:8000/cartadd/" + id;
//     myRequest.open("POST", theUrl, true);
//     myRequest.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             let cartMessage = document.createElement("div");
//             let p = document.createElement("p");
//             p.innerText = "Item Added To Cart";
//             cartMessage.appendChild(p);
//             cartMessage.setAttribute("class", "cart-message");
//             document.body.prepend(cartMessage);
//             setTimeout(() => {
//                 document.body.removeChild(cartMessage);
//             }, 5000);
//         }
//     };
//     myRequest.send();
// }

