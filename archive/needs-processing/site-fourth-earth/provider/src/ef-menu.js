window.onload = function() {
    document.querySelector("#main-nav-form > form > button").style.display = "none";
    document.getElementById("change-page-select").onchange = function(event) {
        const target = event.target;
        const selected = target.options[target.selectedIndex];
        window.location.pathname = selected.getAttribute("value");
    };
}
