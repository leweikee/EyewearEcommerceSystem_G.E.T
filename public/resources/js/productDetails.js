function incrementQuantity() {
    var quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value, 10) + 1;
}

function decrementQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentValue = parseInt(quantityInput.value, 10);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
}

$(document).ready(function() {
    var descriptionElement = $('#description');
    var descriptionHTML = descriptionElement.html();

    if (descriptionHTML.includes("Lens Specification")) {
        descriptionHTML = descriptionHTML.replace(/(Lens Specification)/g, '<span class="underline">$1</span>');
        descriptionElement.html(descriptionHTML);
    }
});