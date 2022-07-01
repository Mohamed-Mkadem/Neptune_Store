


// Setting the Variables
layoutToggler = document.getElementById("layoutToggler");
aside = document.getElementById("aside");
main = document.querySelector("#main");
currentWidth = window.innerWidth;
asideMarginToggler = document.querySelector(".aside-margin-toggler");
theBody = document.documentElement;
modeToggler = document.querySelector(".mode-switcher");
popUpHolder = document.querySelector(".pop-up-holder");
deleteModal = document.querySelector(".delete-modal");
deleteForm = document.getElementById("delete_form");
enableBtn = document.querySelector(".enableEdit");
editCategory = document.querySelector(".enableEditInput");
updateOrderForms = document.querySelectorAll(".order_update");
mainWrapper = document.querySelector(".main-wrapper");

// Those some functionnalities i made, I use the if statement to check if the element exists on the page before making the event listener, i didn't use all those variables in all the pages and i included this script in all pages so it will give me an error when i add an event listener to an element that didn't exist
// Hangling the layout full width or boxed
if (layoutToggler) {
    layoutToggler.addEventListener("click", () => {
        if (theBody.classList.contains("full-width")) {
            window.localStorage.preferedLayout = "boxed";
            theBody.classList.remove("full-width");
        } else {
            window.localStorage.preferedLayout = "full-width";
            theBody.classList.add("full-width");
        }
    });
}
if (window.localStorage.preferedLayout == "full-width") {
    theBody.classList.add("full-width");
}
// To close the sidebar in small screen

if (asideMarginToggler) {


    asideMarginToggler.addEventListener("click", () => {
        if (theBody.classList.contains("full-width")) {
            window.localStorage.preferedLayout = "boxed";
            theBody.classList.remove("full-width");
        } else {
            window.localStorage.preferedLayout = "full-width";
            theBody.classList.add("full-width");
        }
    });
}
if(innerWidth < 767){
    window.addEventListener('load',  ()=>{
        theBody.classList.add('full-width')
        window.localStorage.preferedLayout = "boxed";  
    })
}
// Dark mode logic
if (modeToggler) {
    modeToggler.addEventListener("click", () => {
        if (theBody.classList.contains("dark")) {
            window.sessionStorage.preferredmode = "light";
            theBody.classList.remove("dark");
        } else {
            window.sessionStorage.preferredmode = "dark";
            theBody.classList.add("dark");
        }
    });
}
if (window.sessionStorage.preferredmode == "dark") {
    theBody.classList.add("dark");
}

window.onclick = function (event) {
    if (event.target == popUpHolder) {
        popUpHolder.classList.remove("show");
    }
};


let forms = document.querySelectorAll(".delete_item");
confirmDelete = document.getElementById("confirm_deletion");
cancelDeletion = document.getElementById("cancel_deletion");

if (forms) {
    forms.forEach((form) => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            popUpHolder.classList.add("show");
            confirmDelete.addEventListener("click", () => {
                e.target.submit();
            });

            cancelDeletion.addEventListener("click", () => {
                popUpHolder.classList.remove("show");
            });
        });
    });
}

// Edit Category name logic

if (enableBtn && editCategory) {
    enableBtn.addEventListener("click", () => {
        editCategory.removeAttribute("readonly");
    });
}
if (updateOrderForms) {
    updateOrderForms.forEach((form) => {
        form.addEventListener("submit", (e) => {
            if (
                form.firstElementChild.nextElementSibling.value === "Canceled"
            ) {
                e.preventDefault();
                if (
                    confirm("Are You Sure You Want To Cancel This Order") ===
                    true
                ) {
                    e.target.submit();
                }
            }
        });
    });
}
