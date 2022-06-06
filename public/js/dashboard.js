// Setting the Variables
let layoutToggler = document.getElementById("layoutToggler"),
    aside = document.getElementById("aside"),
    main = document.querySelector("#main"),
    currentWidth = window.innerWidth,
    asideMarginToggler = document.querySelector(".aside-margin-toggler"),
    root = document.documentElement,
    modeToggler = document.querySelector(".mode-switcher"),
    popUpHolder = document.querySelector(".pop-up-holder"),
    deleteModal = document.querySelector(".delete-modal"),
    deleteForm = document.getElementById("delete_form"),
    enableBtn = document.querySelector(".enableEdit"),
    editCategory = document.querySelector(".enableEditInput");
    console.log(enableBtn);
// Those some functionnalities i made, I use the if statement to check if the element exists on the page before making the event listener, i didn't use all those variables in all the pages and i included this script in all pages so it will give me an error when i add an event listener to an element that didn't exist
// Hangling the layout full width or boxed
if (layoutToggler) {
    layoutToggler.addEventListener("click", () => {
        if (root.classList.contains("full-width")) {
            window.localStorage.preferedLayout = "boxed";
            root.classList.remove("full-width");
        } else {
            window.localStorage.preferedLayout = "full-width";
            root.classList.add("full-width");
        }
    });
}
if (window.localStorage.preferedLayout == "full-width") {
    root.classList.add("full-width");
}
// To close the sidebar in small screen

if (asideMarginToggler) {
    asideMarginToggler.addEventListener("click", () => {
        root.classList.toggle("full-width");
    });

    asideMarginToggler.addEventListener("click", () => {
        if (root.classList.contains("full-width")) {
            window.localStorage.preferedLayout = "boxed";
            root.classList.remove("full-width");
        } else {
            window.localStorage.preferedLayout = "full-width";
            root.classList.add("full-width");
        }
    });
}

// Dark mode logic
if (modeToggler) {
    modeToggler.addEventListener("click", () => {
        if (root.classList.contains("dark")) {
            window.sessionStorage.preferredmode = "light";
            root.classList.remove("dark");
        } else {
            window.sessionStorage.preferredmode = "dark";
            root.classList.add("dark");
        }
    });
}
if (window.sessionStorage.preferredmode == "dark") {
    root.classList.add("dark");
}
// This function to handle the delete of product
// function confirmDelete(e) {
//     e.preventDefault();
//     popUpHolder.classList.add("show");
//     deleteModal.classList.add("show");
//     deleteModal.children[1].innerHTML =
//         "Are You Metyakk you wanna delete This item ";
//     deleteModal.getElementById("submit").addEventListener("click", () => {
//         e.submit();
//     });
// }
window.onclick = function (event) {
    if (event.target == popUpHolder) {
        popUpHolder.classList.remove("show");
    }
};
let forms = document.querySelectorAll(".delete_item");
console.log(forms);
forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        if (confirm("Are you sure to delete this ?") == true) {
            e.target.submit();
        }
    });
});

// Edit Category name logic

if (enableBtn && editCategory) {
    enableBtn.addEventListener("click", () => {
        editCategory.removeAttribute("readonly");
        // console.log("yes");
    });
}
