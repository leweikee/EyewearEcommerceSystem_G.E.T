$(document).ready(function () {
    function updateCheckoutTotals() {
        var selectedItems = $('input[name="selectedItems[]"]:checked');
        var totalQuantity = selectedItems.length;
        var totalAmount = 0;

        selectedItems.each(function () {
            var cartItem = $(this).closest('.cartpage');
            var quantity = parseInt(cartItem.find('.quantity-input').val(), 10);
            var price = parseFloat(cartItem.find('.subtotal').data('price'));

            totalAmount += price * quantity;
        });

        $('#selectedItemCount').text(totalQuantity);
        $('#totalAmount').text('RM ' + totalAmount.toFixed(2));

        updateAllProductsCheckbox(); // Update the "All Products" checkbox after updating totals
    }

    // "Select All" checkbox change event
    $('#selectAll').on('change', function () {
        var isChecked = $(this).prop('checked');
        $('input[name="selectedItems[]"]').prop('checked', isChecked);
        updateCheckoutTotals();
    });

    // Handle individual checkbox change
    $('input[name="selectedItems[]"]').on('change', function () {
        updateCheckoutTotals();
    });

    function updateAllProductsCheckbox() {
        var totalCheckboxes = $('input[name="selectedItems[]"]').length;
        var checkedCheckboxes = $('input[name="selectedItems[]"]:checked').length;
        var allChecked = totalCheckboxes === checkedCheckboxes;
        $('#selectAll').prop('checked', allChecked);
    }

    // Your existing code for quantity updates and other functionalities
    $('.quantity-input').on('input', function () {
        updateQuantity(this);
    });

    // Increment button
    $('.increment-btn').on('click', function () {
        var input = $(this).closest('.quantity').find('.quantity-input');
        input.val(parseInt(input.val()) + 1);
        updateQuantity(input);
    });

    // Decrement button
    $('.decrement-btn').on('click', function () {
        var input = $(this).closest('.quantity').find('.quantity-input');
        var newValue = parseInt(input.val()) - 1;
        input.val(newValue > 0 ? newValue : 1);
        updateQuantity(input);
    });

    function updateQuantity(element) {
        var rowId = $(element).closest('.cartpage').find('.id').val();
        console.log('Row ID:', rowId);

        var newQuantity = $(element).val();
        console.log('New Quantity:', newQuantity);
        var cartItem = $(element).closest('.cartpage');
        var newQuantity = parseInt($(element).val(), 10); // Ensure newQuantity is an integer
        var price = parseFloat(cartItem.find('.subtotal').data('price'));

        if (isNaN(newQuantity) || isNaN(price)) {
            console.error('Invalid quantity or price');
            return;
        }

        // Update the subtotal in the same row
        var subtotalElement = cartItem.find('.subtotal');
        var newSubtotal = price * newQuantity;

        subtotalElement.text('RM ' + newSubtotal.toFixed(2));

        // Optionally, you can update the stored data attributes
        subtotalElement.data('quantity', newQuantity);
        subtotalElement.data('price', price);

        // Update the hidden input field with the new quantity
        cartItem.find('.hidden-quantity').val(newQuantity);

        // Trigger form submission
        cartItem.find('.hidden-submit-btn').click();

        // Trigger the checkout totals update
        updateCheckoutTotals();
    }

    function updateCheckoutTotals() {
        var selectedItems = $('input[name="selectedItems[]"]:checked');
        var totalQuantity = selectedItems.length; // Count of selected checkboxes
        var totalAmount = 0;

        selectedItems.each(function () {
            var cartItem = $(this).closest('.cartpage');
            var quantity = parseInt(cartItem.find('.quantity-input').val(), 10);
            var price = parseFloat(cartItem.find('.subtotal').data('price'));

            totalAmount += price * quantity;
        });

        // Update the DOM elements for total item count and total amount
        $('#selectedItemCount').text(totalQuantity);
        $('#totalAmount').text('RM ' + totalAmount.toFixed(2));

        // Update the "All Products" checkbox
        updateAllProductsCheckbox();
    }

    // Additional code to handle automatic checking/unchecking of "All Products" checkbox
    $('input[name="selectedItems[]"]').on('change', function () {
        updateAllProductsCheckbox();
    });
});
