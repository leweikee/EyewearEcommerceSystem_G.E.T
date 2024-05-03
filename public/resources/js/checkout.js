$(document).ready(function () {
    console.log("Script executed!"); // Add this line

        // var aID = $('#deliveryAddress').data('address-id');
        // $('#selectedAddressID').val(aID);
        var aID = $('#selectedAddressID').data('address-id');
        $('#selectedAddressID').val(aID);

    // Function to update selected address
    function updateSelectedAddress(selectedAddress) {
        console.log("Updating selected address:", selectedAddress);
        console.log("Updating selected addressID:", selectedAddress.addressID);
        $('#recipientName').text(selectedAddress.recipientName + ' | ');
        $('#recipientPhoneNum').text('(+60) ' + selectedAddress.recipientPhoneNum);
        $('#deliveryAddressText').text(selectedAddress.address + ', ' + selectedAddress.postcode + ', ' + selectedAddress.city + ', ' + selectedAddress.state);
        
        $('#selectedAddressID').val(selectedAddress.addressID);
        // console.log("selected addressID:", selectedAddressID);
        // selectedAddressID = selectedAddress.addressID;

        // Recalculate shipping fee based on the state of the selected address
        var shippingFee = calculateShippingFee(selectedAddress.state);
        // Update the displayed shipping fee
        $('#shippingFee').text('RM ' + shippingFee.toFixed(2));
        
        // Trigger the recalculation of the total payment
        updateTotalPayment();
        
    }

    // Function to calculate shipping fee
    function calculateShippingFee(state) {
        // Adjust this logic based on your shipping fee calculation
        if (state == 'Sabah' || state == 'Sarawak' || state == 'Labuan') {
            return 15;
        } else {
            return 7;
        }
    }

    // Function to update total payment
    function updateTotalPayment() {
        // Retrieve merchandise subtotal from the existing element
        var merchandiseSubtotal = parseFloat($('#merchandiseSubtotal').text().replace('RM ', '').trim()) || 0;
    
        // Retrieve shipping fee from the updated element
        var shippingFee = parseFloat($('#shippingFee').text().replace('RM ', '').trim()) || 0;
    
        // Check if the values are valid numbers
        if (isNaN(merchandiseSubtotal) || isNaN(shippingFee)) {
            console.error('Invalid numeric values for merchandise subtotal or shipping fee.');
            return;
        }
    
        // Calculate total payment
        var totalPayment = merchandiseSubtotal + shippingFee;
    
        // Update the displayed total payment
        $('#totalPayment').text('RM ' + totalPayment.toFixed(2));
    }

    // Handle radio button change
    // $('input[name="selectedAddress"]').change(function () {
    //     var selectedAddress = $(this).data('address');
    //     console.log("Radio button change - selected address:", selectedAddress);
    //     updateSelectedAddress(selectedAddress);
    // });


    $('input[name="selectedAddress"]').change(function () {
        var selectedAddress = $(this).data('address');
        console.log("Updating selected addressID1:", selectedAddress.addressID);
        // console.log("Radio button change - selected address:", selectedAddress);
        updateSelectedAddress(selectedAddress);
    });

    // Handle confirm button click
    $('#confirmAddressBtn').on('click', function () {
        var selectedRadio = $('input[name="selectedAddress"]:checked');
        if (selectedRadio.length > 0) {
            var selectedAddress = selectedRadio.data('address');
            console.log("Confirm button click - selected address:", selectedAddress);
            // Check if updateSelectedAddress is called
            updateSelectedAddress(selectedAddress);
        } else {
            console.log("No radio button selected");
        }
    });

});
