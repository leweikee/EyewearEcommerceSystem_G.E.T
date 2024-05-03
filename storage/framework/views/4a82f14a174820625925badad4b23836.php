<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G.E.T Template Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('resources/css/default.css')); ?>">
    <!-- Include the header -->
    <link rel="stylesheet" href="<?php echo e(asset('resources/css/custProfile.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="<?php echo e(asset('/resources/js/custProfile.js')); ?>"></script>
  </head>
  <body>

    <div class="sticky-top">
        <?php if(auth()->guard()->check()): ?>
            <!-- User is logged in -->
            <?php echo $__env->make('header_success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <!-- User is not logged in -->
            <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <div class="container-fluid">
        <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 p-0" style="background-color: #F9F9F6; height: 100vh">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action mt-2 fw-bold" onclick="showProfile()">My Profile</a>
            <a href="#" class="list-group-item list-group-item-action mt-2 fw-bold" onclick="showAddresses()">My Addresses</a>
          </div>
        </div>

        <div class="col-md-10 ms-5" style="width: 80%">
            <!-- Customer Profile Information -->
            <div id="profileContent" style="display: block;">
                <div class="container-1 mt-5 justify-content-start" style="width: 70%;">
                    <!-- Customer Information Column -->
                    <div class="col-sm custom-profile-info">
                    
                    <div style="font-family: serif">
                    <div class="d-flex align-items-center mb-3">
                        <h4 class="mb-0 fw-bold ">Personal Information</h4>
                        <button class="btn" onclick="editField()"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </button>
                    </div>
                        <div class="ms-3">
                            <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="black" class="bi bi-person-circle d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg><p class="mb-0 ps-2">Username: <?php echo e($user->name); ?></p></div>
                                <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="black" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                </svg><p class="mb-0 ps-2">Email: <?php echo e($user->email); ?></p></div>
                                <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="black" class="bi bi-phone d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg><p class="mb-0 ps-2">Phone number: <?php echo e($user->phoneNum); ?></p></div>
                        
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
            <!--address information-->
            <div class="addressesContent" style="display: none; width: 85%">
                <div class="mt-5">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0 fw-bold mb-3" style="font-family: serif">Customer Address <span><button type="button" class="btn btn-light rounded-circle" onclick="newAddress()"><i class="bi bi-plus-lg"></i></button></span></h4>    
                    </div>
                    <div class="addresslist ms-3">
                        <table class="table table-striped">
                            <thead>
                            <!-- <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr> -->
                            </thead>
                            <tbody>
                            <?php if(count($useraddress)>0): ?>
                            <?php $__currentLoopData = $useraddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="d-flex align-items-center justify-content-between">
                                <div class="d-inline">
                                    <span><?php echo e($address->recipientName); ?> | <?php echo e($address->recipientPhoneNum); ?></span>
                                    <?php if($address->is_default == 1): ?>
                                    <span class="badge bg-success">Default Address</span>
                                    <?php endif; ?>
                                    <br>
                                    <span><?php echo e($address->address); ?></span><br>
                                    <span><?php echo e($address->city); ?>, <?php echo e($address->state); ?>, <?php echo e($address->postcode); ?></span><br>
                                </div>
                                <!-- <?php if($address->is_default == 1): ?>
                                <div class="d-inline me-2">
                                <span class="badge bg-success">Default Address</span>
                                </div>
                                <?php endif; ?> -->
                                <div class="d-inline me-3">
                                    <div class="d-flex justify-content-between me-1" style="width: 120.88px;">
                                        <button type="button" class="btn text-primary" onclick="editAddress('<?php echo e($address->addressID); ?>', <?php echo e(json_encode($address)); ?>)"><span class="h6" style="color: #362F27">Edit</span></button>
                                        <!-- editAddress('<?php echo e($address->addressID); ?>', <?php echo e(json_encode($address)); ?>) -->
                                        <?php if($address->is_default == 0): ?>
                                        &nbsp;<button type="button" class="btn text-primary" onclick="deleteAddress('<?php echo e($address->addressID); ?>')"><span class="h6" style="color: #362F27">Delete</span></button>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($address->is_default==0): ?>
                                    <button type="button" class="btn btn-outline-secondary" onclick="setDefaultAddress('<?php echo e($address->addressID); ?>', '<?php echo e($address->userID); ?>')">Set as default</button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-outline-secondary disabled">Set as default</button>
                                    <?php endif; ?>
                                </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <tr>
                                <td>You have no address yet.</td>
                            </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>  
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editModal" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo e(url('/updateProfile', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <!-- Input fields for editing -->
                        <div class="mb-3">
                            <label for="name">Username:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo e($user->name); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo e($user->email); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phoneNum">Phone Number:</label>
                            <input type="text" id="phoneNum" name="phoneNum" class="form-control" value="<?php echo e($user->phoneNum); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    

    <!-- Add Address Modal -->
    <div class="modal" id="addAddress" aria-labelledby="addNewAddress" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo e(url('/addAddress', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <!-- Input fields for editing -->
                        <div class="mb-3">
                            <label for="recipientName">Recipient Name:</label>
                            <input type="text" id="recipientName" name="recipientName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipientPhoneNum">Phone Number:</label>
                            <input type="text" id="recipientPhoneNum" name="recipientPhoneNum" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div> -->
                        <div class="mb-3">
                            <label for="state">State:</label>
                            <select class="form-select" aria-label="Select Your State" id="state" name="state" required onchange="updateCityDatalist()">
                              <option value="" selected disabled>Select State</option>
                              <option value="Johor">Johor</option>
                              <option value="Kedah">Kedah</option>
                              <option value="Kelantan">Kelantan</option>
                              <option value="Wilayah Persekutuan">Wilayah Persekutuan</option>
                              <option value="Labuan">Labuan</option>
                              <option value="Melaka">Melaka</option>
                              <option value="Negeri Sembilan">Negeri Sembilan</option>
                              <option value="Pahang">Pahang</option>
                              <option value="Penang">Penang</option>
                              <option value="Perak">Perak</option>
                              <option value="Perlis">Perlis</option>
                              <option value="Putrajaya">Putrajaya</option>
                              <option value="Sabah">Sabah</option>
                              <option value="Sarawak">Sarawak</option>
                              <option value="Selangor">Selangor</option>
                              <option value="Terengganu">Terengganu</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>  -->
                        <div class="mb-3">
                        <label for="city" class="form-label">Select City</label>
                        <input class="form-control" list="cityOptions" id="city" name="city" placeholder="Type to search..." >
                        <datalist id="cityOptions">
                        <!-- City options will be dynamically populated based on the selected state -->
                        </datalist>
                        </div>
                        <div class="mb-3">
                            <label for="postcode">Postcode:</label>
                            <input type="text" id="postcode" name="postcode" class="form-control" required>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <label for="is_default">&nbsp;Set as Default Address</label>
                            <input class="form-check-input" type="checkbox" role="switch" id="is_default" name="is_default">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Edit Address Modal -->
    <div class="modal" id="editAddress" aria-labelledby="editAddress" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?php echo e(url('/editAddress', ['id' => $user->id, 'addressID' => $address->addressID ?? null])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <!-- Input fields for editing -->
                        <div class="mb-3">
                            <label for="recipientName">Recipient Name:</label>
                            <input type="text" id="erecipientName" name="recipientName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipientPhoneNum">Phone Number:</label>
                            <input type="text" id="erecipientPhoneNum" name="recipientPhoneNum" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <input type="text" id="eaddress" name="address" class="form-control"  required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div> -->
                        <div class="mb-3">
                            <label for="state">State:</label>
                            <select class="form-select" aria-label="Select Your State" id="estate" name="state"  required onchange="updateCityDatalist()">
                              <option value="" selected disabled>Select State</option>
                              <option value="Johor">Johor</option>
                              <option value="Kedah">Kedah</option>
                              <option value="Kelantan">Kelantan</option>
                              <option value="Wilayah Persekutuan">Wilayah Persekutuan</option>
                              <option value="Labuan">Labuan</option>
                              <option value="Melaka">Melaka</option>
                              <option value="Negeri Sembilan">Negeri Sembilan</option>
                              <option value="Pahang">Pahang</option>
                              <option value="Penang">Penang</option>
                              <option value="Perak">Perak</option>
                              <option value="Perlis">Perlis</option>
                              <option value="Putrajaya">Putrajaya</option>
                              <option value="Sabah">Sabah</option>
                              <option value="Sarawak">Sarawak</option>
                              <option value="Selangor">Selangor</option>
                              <option value="Terengganu">Terengganu</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>  -->
                        <div class="mb-3">
                        <label for="city" class="form-label">Select City</label>
                        <input class="form-control" list="cityOptions" id="ecity" name="city"  placeholder="Type to search..." >
                        <datalist id="cityOptions">
                        <!-- City options will be dynamically populated based on the selected state -->
                        </datalist>
                        </div>
                        <div class="mb-3">
                            <label for="postcode">Postcode:</label>
                            <input type="text" id="epostcode" name="postcode" class="form-control"  required>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <label for="is_default">&nbsp;Set as Default Address</label>
                            <input class="form-check-input" type="checkbox" role="switch" id="eis_default"  name="is_default">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
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

      function updateCityDatalist() {
        var state = document.getElementById('state').value;
        var cityDatalist = document.getElementById('cityOptions');
        
        // Clear existing options
        cityDatalist.innerHTML = '';

        // Add options based on the selected state
        if (state === 'Johor') {
            const city = ["Johor Bahru","Tebrau","Pasir Gudang","Bukit Indah","Skudai","Kluang","Batu Pahat","Muar","Ulu Tiram","Senai","Segamat","Kulai","Kota Tinggi","Pontian Kechil","Tangkak","Bukit Bakri","Yong Peng","Pekan Nenas","Labis","Mersing","Simpang Renggam","Parit Raja","Kelapa Sawit","Buloh Kasap","Chaah"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Kedah') {
            const city = ["Sungai Petani","Alor Setar","Kulim","Jitra / Kubang Pasu","Baling","Pendang","Langkawi","Yan","Sik","Kuala Nerang","Pokok Sena","Bandar Baharu"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Kelantan') {
            const city = ["Kota Bharu","Pangkal Kalong","Tanah Merah","Peringat","Wakaf Baru","Kadok","Pasir Mas","Gua Musang","Kuala Krai","Tumpat"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Melaka') {
            const city = ["Bandaraya Melaka","Bukit Baru","Ayer Keroh","Klebang","Masjid Tanah","Sungai Udang","Batu Berendam","Alor Gajah","Bukit Rambai","Ayer Molek","Bemban","Kuala Sungai Baru","Pulau Sebang","Jasin"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Negeri Sembilan') {
            const city = ["Seremban", "Port Dickson", "Nilai","Bahau","Tampin", "Kuala Pilah"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Pahang') {
            const city = ["Kuantan", "Temerloh","Bentong","Mentakab","Raub","Jerantut","Pekan","Kuala Lipis","Bandar Jengka","Bukit Tinggi"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Perak') {
            const city = ["Ipoh","Taiping","Sitiawan","Simpang Empat","Teluk Intan","Batu Gajah","Lumut","Kampung Koh","Kuala Kangsar","Sungai Siput Utara","Tapah","Bidor","Parit Buntar","Ayer Tawar","Bagan Serai","Tanjung Malim","Lawan Kuda Baharu","Pantai Remis","Kampar"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Perlis') {
            const city = ["Kangar","Kuala Perlis"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Penang') {
            const city = ["Bukit Mertajam","Georgetown","Sungai Ara","Gelugor","Ayer Itam","Butterworth","Perai","Nibong Tebal","Permatang Kucing","Tanjung Tokong","Kepala Batas","Tanjung Bungah","Juru"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Sabah') {
            const city = ["Kota Kinabalu","Sandakan","Tawau","Lahad Datu","Keningau","Putatan","Donggongon","Semporna","Kudat","Kunak","Papar","Ranau","Beaufort","Kinarut","Kota Belud"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Sarawak') {
            const city = ["Kuching","Miri","Sibu","Bintulu","Limbang","Sarikei","Sri Aman","Kapit","Batu Delapan Bazaar","Kota Samarahan"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Selangor') {
            const city = ["Subang Jaya","Klang","Ampang Jaya","Shah Alam","Petaling Jaya","Cheras","Kajang","Selayang Baru","Rawang","Taman Greenwood","Semenyih","Banting","Balakong","Gombak Setia","Kuala Selangor","Serendah","Bukit Beruntung","Pengkalan Kundang","Jenjarom","Sungai Besar","Batu Arang", "Tanjung Sepat","Kuang","Kuala Kubu Baharu","Batang Berjuntai","Bandar Baru Salak Tinggi","Sekinchan","Sabak","Tanjung Karang","Beranang","Sungai Pelek","Sepang"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Terengganu') {
            const city = ["Kuala Terengganu","Chukai","Dungun", "Kerteh","Kuala Berang","Marang","Paka","Jerteh"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        } else if (state === 'Wilayah Persekutuan') {
            const city = ["Kuala Lumpur","Labuan","Putrajaya"];
            for(var i = 0; i < city.length; i++){
                addCityOption(city[i]);
            }
        }
        // Add more conditions for other states
    }

    function addCityOption(city) {
        var option = document.createElement('option');
        option.value = city;
        document.getElementById('cityOptions').appendChild(option);
    }

    </script>
  </body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/custProfile.blade.php ENDPATH**/ ?>