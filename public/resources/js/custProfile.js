function showProfile() {
    document.getElementById('profileContent').style.display = 'block';
    document.getElementsByClassName('addressesContent')[0].style.display = 'none';
}

function showAddresses() {
    document.getElementById('profileContent').style.display = 'none';
    document.getElementsByClassName('addressesContent')[0].style.display = 'block';
}

function editField() {
    // Show the modal
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

function newAddress() {
    // Show the modal
    new bootstrap.Modal(document.getElementById('addAddress')).show();
}

function editAddress(addressID, address) {
    // Use the addressID to uniquely identify the address
    console.log('Editing address with ID: ' + addressID);
    console.log('Editing address with ID: ' + address.recipientName);

    // Rest of the code to populate the edit modal
    document.getElementById('erecipientName').value = address.recipientName;
    document.getElementById('erecipientPhoneNum').value = address.recipientPhoneNum;
    document.getElementById('eaddress').value = address.address;
    document.getElementById('estate').value = address.state;
    document.getElementById('ecity').value = address.city;
    document.getElementById('epostcode').value = address.postcode;
    document.getElementById('eis_default').checked = address.is_default;

    new bootstrap.Modal(document.getElementById('editAddress')).show();
}

function deleteAddress(addressID) {
    window.location.href = '/deleteAddress/' + addressID;
}

function setDefaultAddress(addressID, userID) {
    window.location.href = '/setDefaultAddress/' + userID + '/' + addressID;
}