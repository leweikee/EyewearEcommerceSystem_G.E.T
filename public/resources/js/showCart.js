$(document).ready(function () {
    // Function to update checkout totals
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
    }

    // Function to update form action with selected item IDs
    function updateFormAction() {
        var selectedItems = $('input[name="selectedItems[]"]:checked');
        var checkoutUrl = '/checkout/';

        if (selectedItems.length > 0) {
            // Construct the URL with only the selected item IDs
            var selectedItemsIds = selectedItems.map(function () {
                return $(this).val();
            }).get();
            checkoutUrl += selectedItemsIds.join(',');
        }

        // Update form action dynamically
        $('.checkout-form').attr('action', checkoutUrl);
    }

    // "Select All" checkbox change event
    $('#selectAll').on('change', function () {
        var isChecked = $(this).prop('checked');
        $('input[name="selectedItems[]"]').prop('checked', isChecked);
        
        // Update checkout totals and form action
        updateCheckoutTotals();
        updateFormAction();
    });

    // Handle individual checkbox change
    $('input[name="selectedItems[]"]').on('change', function () {
        var totalCheckboxes = $('input[name="selectedItems[]"]').length;
        var checkedCheckboxes = $('input[name="selectedItems[]"]:checked').length;
        var allChecked = totalCheckboxes === checkedCheckboxes;
        
        // Update "Select All" checkbox
        $('#selectAll').prop('checked', allChecked);
        
        // Update checkout totals and form action
        updateCheckoutTotals();
        updateFormAction();
    });

    // Handle form submission
    $('.checkout-form').on('submit', function (e) {
        console.log('Form submitted');
        var selectedItems = $('input[name="selectedItems[]"]:checked');
    
        // If no items are selected, prevent form submission and show alert
        if (selectedItems.length === 0) {
            e.preventDefault();
            alert('Please select at least one item to proceed to checkout.');
        }
    });
});
