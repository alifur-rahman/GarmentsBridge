<?php $__env->startSection('title',\App\CPU\translate('My Address')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.css"/>

    <style>
        .headerTitle {
            font-size: 24px;
            font-weight: 600;
            margin-top: 1rem;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .font-nameA {

            display: inline-block;
            margin-top: 5px !important;
            font-size: 13px !important;
            color: #030303;
        }

        .font-name {
            font-weight: 600;
            font-size: 15px;
            padding-bottom: 6px;
            color: #030303;
        }

        .modal-footer {
            border-top: none;
        }

        .cz-sidebar-body h3:hover + .divider-role {
            border-bottom: 3px solid <?php echo e($web_config['primary_color']); ?> !important;
            transition: .2s ease-in-out;
        }

        label {
            font-size: 15px;
            margin-bottom: 8px;
            color: #030303;

        }

        .nav-pills .nav-link.active {
            box-shadow: none;
            color: #ffffff !important;
        }

        .modal-header {
            border-bottom: none;
        }

        .nav-pills .nav-link {
            padding-top: .575rem;
            padding-bottom: .575rem;
            background-color: #ffffff;
            color: #050b16 !important;
            font-size: .9375rem;
            border: 1px solid #e4dfdf;
        }

        .nav-pills .nav-link :hover {
            padding-top: .575rem;
            padding-bottom: .575rem;
            background-color: #ffffff;
            color: #050b16 !important;
            font-size: .9375rem;
            border: 1px solid #e4dfdf;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .iconHad {
            color: <?php echo e($web_config['primary_color']); ?>;
            padding: 4px;
        }

        .iconSp {
            margin-top: 0.70rem;
        }

        .fa-lg {
            padding: 4px;
        }

        .fa-trash {
            color: #FF4D4D;
        }

        .namHad {
            color: #030303;
            position: absolute;
            padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 13px;
            padding-top: 8px;
        }

        .donate-now {
            list-style-type: none;
            margin: 25px 0 0 0;
            padding: 0;
        }

        .donate-now li {
            float: left;
            margin: <?php echo e(Session::get('direction') === "rtl" ? '0 0 0 5px' : '0 5px 0 0'); ?>;
            width: 100px;
            height: 40px;
            position: relative;
            padding: 22px;
            text-align: center;
        }

        .donate-now label,
        .donate-now input {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .donate-now input[type="radio"] {
            opacity: 0.01;
            z-index: 100;
        }

        .donate-now input[type="radio"]:checked + label,
        .Checked + label {
            background: <?php echo e($web_config['primary_color']); ?>;
            color: white !important;
            border-radius: 7px;
        }

        .donate-now label {
            padding: 5px;
            border: 1px solid #CCC;
            cursor: pointer;
            z-index: 90;
        }

        .donate-now label:hover {
            background: #DDD;
        }

        #edit{
            cursor: pointer;
        }
        .pac-container { z-index: 100000 !important; }

        @media (max-width: 600px) {
            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
        #location_map_canvas{
            height: 100%;
        }
        @media  only screen and (max-width: 768px) {
            /* For mobile phones: */
            #location_map_canvas{
                height: 200px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="modal fade rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12"><h5 class="modal-title font-name "><?php echo e(\App\CPU\translate('add_new_address')); ?></h5></div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('address-store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6" style="display: flex">
                                <!-- Nav pills -->

                                <ul class="donate-now">
                                    <li>
                                        <input type="radio" id="a25" name="addressAs" value="permanent"/>
                                        <label for="a25" class="component"><?php echo e(\App\CPU\translate('permanent')); ?></label>
                                    </li>
                                    <li>
                                        <input type="radio" id="a50" name="addressAs" value="home"/>
                                        <label for="a50" class="component"><?php echo e(\App\CPU\translate('Home')); ?></label>
                                    </li>
                                    <li>
                                        <input type="radio" id="a75" name="addressAs" value="office" checked="checked"/>
                                        <label for="a75" class="component"><?php echo e(\App\CPU\translate('Office')); ?></label>
                                    </li>

                                </ul>
                            </div>

                            <div class="col-md-6" style="display: flex">
                                <!-- Nav pills -->

                                <ul class="donate-now">
                                    <li>
                                        <input type="radio" name="is_billing" id="b25" value="0"/>
                                        <label for="b25" class="billing_component"><?php echo e(\App\CPU\translate('shipping')); ?></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="is_billing" id="b50" value="1"/>
                                        <label for="b50" class="billing_component"><?php echo e(\App\CPU\translate('billing')); ?></label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name"><?php echo e(\App\CPU\translate('contact_person_name')); ?></label>
                                        <input class="form-control" type="text" id="name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="firstName"><?php echo e(\App\CPU\translate('Phone')); ?></label>
                                        <input class="form-control" type="text" id="phone" name="phone" required>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address-city"><?php echo e(\App\CPU\translate('City')); ?></label>
                                        <input class="form-control" type="text" id="address-city" name="city" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="zip"><?php echo e(\App\CPU\translate('zip_code')); ?></label>
                                        <input class="form-control" type="number" id="zip" name="zip" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="state"><?php echo e(\App\CPU\translate('State')); ?></label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country"><?php echo e(\App\CPU\translate('Country')); ?></label>
                                        <input type="text" class="form-control" id="country" name="country"
                                               placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address"><?php echo e(\App\CPU\translate('address')); ?></label>
                                        
                                        <textarea class="form-control" id="address"
                                                            type="text"  name="address" required></textarea>
                                    </div>
                                    <?php ($default_location=\App\CPU\Helpers::get_business_settings('default_location')); ?>
                                    <div class="form-group col-md-12">
                                        <input id="pac-input" class="controls rounded" style="height: 3em;width:fit-content;" title="<?php echo e(\App\CPU\translate('search_your_location_here')); ?>" type="text" placeholder="<?php echo e(\App\CPU\translate('search_here')); ?>"/>
                                        <div style="height: 200px;" id="location_map_canvas"></div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="latitude"
                                name="latitude" class="form-control d-inline"
                                placeholder="Ex : -94.22213" value="<?php echo e($default_location?$default_location['lat']:0); ?>" required readonly>
                            <input type="hidden"
                                name="longitude" class="form-control"
                                placeholder="Ex : 103.344322" id="longitude" value="<?php echo e($default_location?$default_location['lng']:0); ?>" required readonly>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?></button>
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('Add')); ?> <?php echo e(\App\CPU\translate('Informations')); ?>  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 mt-3 col-md-9">

                <!-- Addresses list-->
                <div class="row">
                    <div class="col-lg-12 col-md-12  d-flex justify-content-between overflow-hidden">
                        <div class="col-sm-4">
                            <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(\App\CPU\translate('ADDRESSES')); ?></h1>
                        </div>
                        <div class="mt-2 col-sm-4">
                            <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#exampleModal" id="add_new_address"><?php echo e(\App\CPU\translate('add_new_address')); ?>

                            </button>
                        </div>
                    </div>
                    <?php $__currentLoopData = $shippingAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingAddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <section class="col-lg-6 col-md-6 mb-4 mt-5">
                            <div class="card" style="text-transform: capitalize;">
                                
                                    <div class="card-header" style="padding: 5px;">
                                        <i class="fa fa-thumb-tack fa-2x iconHad" aria-hidden="true"></i>
                                        <span class="namHad"> <?php echo e($shippingAddress['address_type']); ?> <?php echo e(\App\CPU\translate('address')); ?> (<?php echo e($shippingAddress['is_billing']==1?\App\CPU\translate('Billing_address'):\App\CPU\translate('shipping_address')); ?>) </span>
                                        
                                        <span class="float-right iconSp">
                                            
                                            <a class="" id="edit" href="<?php echo e(route('address-edit',$shippingAddress->id)); ?>">
                                                <i class="fa fa-edit fa-lg"></i>
                                            </a>

                                            <a class="" href="<?php echo e(route('address-delete',['id'=>$shippingAddress->id])); ?>" onclick="return confirm('<?php echo e(\App\CPU\translate('Are you sure you want to Delete')); ?>?');" id="delete">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </a>
                                        </span>
                                    </div>
                                        

                                    
                                    <div class="modal fade" id="editAddress_<?php echo e($shippingAddress->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <div class="row">
                                                    <div class="col-md-12"> <h5 class="modal-title font-name "><?php echo e(\App\CPU\translate('update')); ?> <?php echo e(\App\CPU\translate('address')); ?>  </h5></div>
                                                </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="updateForm">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row pb-1">
                                                            <div class="col-md-6" style="display: flex">
                                                                <!-- Nav pills -->
                                                                <input type="hidden" id="defaultValue" class="add_type" value="<?php echo e($shippingAddress->address_type); ?>">
                                                                <ul class="donate-now">
                                                                    <li class="address_type_li">
                                                                        <input type="radio" class="address_type" id="a25" name="addressAs" value="permanent"  <?php echo e($shippingAddress->address_type == 'permanent' ? 'checked' : ''); ?> />
                                                                        <label for="a25" class="component"><?php echo e(\App\CPU\translate('permanent')); ?></label>
                                                                    </li>
                                                                    <li class="address_type_li">
                                                                        <input type="radio" class="address_type" id="a50" name="addressAs" value="home" <?php echo e($shippingAddress->address_type == 'home' ? 'checked' : ''); ?> />
                                                                        <label for="a50" class="component"><?php echo e(\App\CPU\translate('Home')); ?></label>
                                                                    </li>
                                                                    <li class="address_type_li">
                                                                        <input type="radio" class="address_type" id="a75" name="addressAs" value="office" <?php echo e($shippingAddress->address_type == 'office' ? 'checked' : ''); ?>/>
                                                                        <label for="a75" class="component"><?php echo e(\App\CPU\translate('Office')); ?></label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- Tab panes -->
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="person_name"><?php echo e(\App\CPU\translate('contact_person_name')); ?></label>
                                                                <input class="form-control" type="text" id="person_name"
                                                                    name="name"
                                                                    value="<?php echo e($shippingAddress->contact_person_name); ?>"
                                                                    required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="own_phone"><?php echo e(\App\CPU\translate('Phone')); ?></label>
                                                                <input class="form-control" type="text" id="own_phone" name="phone" value="<?php echo e($shippingAddress->phone); ?>" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="city"><?php echo e(\App\CPU\translate('City')); ?></label>

                                                                <input class="form-control" type="text" id="city" name="city" value="<?php echo e($shippingAddress->city); ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="zip_code"><?php echo e(\App\CPU\translate('zip_code')); ?></label>
                                                                <input class="form-control" type="number" id="zip_code" name="zip" value="<?php echo e($shippingAddress->zip); ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                            <label for="own_state"><?php echo e(\App\CPU\translate('State')); ?></label>
                                                                <input type="text" class="form-control" name="state" value="<?php echo e($shippingAddress->state); ?>" id="own_state"  placeholder="" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="own_country"><?php echo e(\App\CPU\translate('Country')); ?></label>
                                                                <input type="text" class="form-control" id="own_country" name="country" value="<?php echo e($shippingAddress->country); ?>" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">

                                                            <div class="form-group col-md-12">
                                                                <label for="own_address"><?php echo e(\App\CPU\translate('address')); ?></label>
                                                                <input class="form-control" type="text" id="own_address"
                                                                    name="address"
                                                                    value="<?php echo e($shippingAddress->address); ?>" required>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="latitude"
                                                            name="latitude" class="form-control d-inline"
                                                            placeholder="Ex : -94.22213" value="<?php echo e($default_location?$default_location['lat']:0); ?>" required readonly>
                                                        <input type="hidden"
                                                            name="longitude" class="form-control"
                                                            placeholder="Ex : 103.344322" id="longitude" value="<?php echo e($default_location?$default_location['lng']:0); ?>" required readonly>
                                                        <div class="modal-footer">
                                                            <button type="button" class="closeB btn btn-secondary" data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?></button>
                                                            <button type="submit" class="btn btn-primary" id="addressUpdate" data-id="<?php echo e($shippingAddress->id); ?>"><?php echo e(\App\CPU\translate('update')); ?>  </button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="padding: <?php echo e(Session::get('direction') === "rtl" ? '0 13px 15px 15px' : '0 15px 15px 13px'); ?>;">
                                        <div class="font-name"><span><?php echo e($shippingAddress['contact_person_name']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(\App\CPU\translate('Phone')); ?>  :</strong>  <?php echo e($shippingAddress['phone']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(\App\CPU\translate('City')); ?>  :</strong>  <?php echo e($shippingAddress['city']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong> <?php echo e(\App\CPU\translate('zip_code')); ?> :</strong> <?php echo e($shippingAddress['zip']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(\App\CPU\translate('address')); ?> :</strong> <?php echo e($shippingAddress['address']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(\App\CPU\translate('Country')); ?> :</strong> <?php echo e($shippingAddress['country']); ?></span>
                                        </div>
                                    </div>
                                
                            </div>
                        </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </section>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function (){
            $('.address_type_li').on('click', function (e) {
                // e.preventDefault();
                $('.address_type_li').find('.address_type').removeAttr('checked', false);
                $('.address_type_li').find('.component').removeClass('active_address_type');
                $(this).find('.address_type').attr('checked', true);
                $(this).find('.address_type').removeClass('add_type');
                $('#defaultValue').removeClass('add_type');
                $(this).find('.address_type').addClass('add_type');

                $(this).find('.component').addClass('active_address_type');
            });
        })

        $('#addressUpdate').on('click', function(e){
            e.preventDefault();
            let addressAs, address, name, zip, city, state, country, phone;

            addressAs = $('.add_type').val();

            address = $('#own_address').val();
            name = $('#person_name').val();
            zip = $('#zip_code').val();
            city = $('#city').val();
            state = $('#own_state').val();
            country = $('#own_country').val();
            phone = $('#own_phone').val();

            let id = $(this).attr('data-id');

            if (addressAs != '' && address != '' && name != '' && zip != '' && city != '' && state != '' && country != '' && phone != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('address-update')); ?>",
                    method: 'POST',
                    data: {
                        id : id,
                        addressAs: addressAs,
                        address: address,
                        name: name,
                        zip: zip,
                        city: city,
                        state: state,
                        country: country,
                        phone: phone
                    },
                    success: function () {
                        toastr.success('<?php echo e(\App\CPU\translate('Address Update Successfully')); ?>.');
                        location.reload();
                        // $('#name').val('');
                        // $('#link').val('');
                        // $('#icon').val('');
                        // $('#image-set').val('');

                    }
                });
            }else{
                toastr.error('<?php echo e(\App\CPU\translate('All input field required')); ?>.');
            }

        });
    </script>
    <style>
        .modal-backdrop {
            z-index: 0 !important;
            display: none;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\CPU\Helpers::get_business_settings('map_api_key')); ?>&libraries=places&v=3.45.8"></script>
    <script>

        function initAutocomplete() {
            var myLatLng = { lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>, lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?> };

            const map = new google.maps.Map(document.getElementById("location_map_canvas"), {
                center: { lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>, lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?> },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap( map );
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng( coordinates['lat'], coordinates['lng'] ) ;
                marker.setPosition( latlng );
                map.panTo( latlng );

                document.getElementById('latitude').value = coordinates['lat'];
                document.getElementById('longitude').value = coordinates['lng'];

                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('address').value = results[1].formatted_address;
                            console.log(results[1].formatted_address);
                        }
                    }
                });
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        };
        $(document).on('ready', function () {
            initAutocomplete();

        });

        $(document).on("keydown", "input", function(e) {
          if (e.which==13) e.preventDefault();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/web-views/users-profile/account-address.blade.php ENDPATH**/ ?>