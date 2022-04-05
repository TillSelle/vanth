function height(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

function auto_grow(element) {
    height(element);
}

//document.querySelector("#returntextarea").addEventListener("click", function() {
//    auto_grow(document.querySelector("#returntextarea"));
//}); 