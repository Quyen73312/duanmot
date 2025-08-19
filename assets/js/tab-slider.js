function myFunction(imgs) {
    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    // Get the image text
    var imgText = document.getElementById("imgtext");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    imgText.innerHTML = imgs.alt;
    // Show the container element (hidden with CSS)
    expandImg.parentElement.style.display = "block";
}

var inputSize =  document.querySelector('input[name="size"]');
for (var i = 0; i < inputSize.length; i++){
    if (checkbox[i].checked === true){
        result += ' [' + checkbox[i].value + ']';
    }
}

console.log(result);