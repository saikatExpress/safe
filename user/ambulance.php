<?php include_once 'include/header.php'; ?>



<body onload="getLocation();">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ambulance_site_menu">
                    <div class="ambulance_menu_item">

                        <div class="menu_style_blck">
                            <a href="">
                                <div class="menu_div_blck">
                                    <p>AC</p>
                                </div>
                                <div class="menu_title_blck">
                                    <h2>
                                        Ac Ambulance
                                    </h2>
                                </div>
                            </a>
                        </div>

                        <div class="menu_style_blck">

                            <a href="">
                                <div class="menu_div_blck">
                                    <p>N/AC</p>
                                </div>
                                <div class="menu_title_blck">
                                    <h2>

                                        Non-Ac Ambulance
                                    </h2>
                                </div>
                            </a>

                        </div>

                        <div class="menu_style_blck">

                            <a href="">
                                <div class="menu_div_blck">
                                    <p>F/A</p>
                                </div>
                                <div class="menu_title_blck">
                                    <h2>

                                        Freezing Ambulance
                                    </h2>
                                </div>
                            </a>

                        </div>

                        <div class="menu_style_blck">

                            <a href="">
                                <div class="menu_div_blck">
                                    <p>I/A</p>
                                </div>
                                <div class="menu_title_blck">
                                    <h2>

                                        ICU Ambulance
                                    </h2>
                                </div>
                            </a>

                        </div>


                        <div class="menu_style_blck">

                            <a href="">
                                <div class="menu_div_blck">
                                    <p>R/C</p>
                                </div>
                                <div class="menu_title_blck">
                                    <h2>
                                        Rent A Car
                                    </h2>
                                </div>
                            </a>

                        </div>

                        <div class="menu_style_blck">

                            <a href="">
                                <div class="menu_div_blck">
                                    <p>R/L</p>
                                </div>
                                <div class="menu_title_blck">
                                    <h2>
                                        Rental List
                                    </h2>
                                </div>
                            </a>

                        </div>

                        <div class="menu_style_blck">

                            <a href="">
                                <div class="menu_div_blck">
                                    <p>A/S</p>
                                </div>
                                <div class="menu_title_blck">
                                    <h2>
                                        About Site
                                    </h2>
                                </div>
                            </a>

                        </div>

                    </div>
                </div>


                <div class="active_chats">
                    <div class="chat_head">
                        <h2 class="chat_head_title">For Emergency help</h2>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/arifur.jpg" alt="no images">
                                <h4>Maruf Hasan Shuvo</h4>
                                <p>01713617913</p>
                                <b>Dhaka</b>
                            </div>
                        </div>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/saikat.jpg" alt="no images">
                                <h4>Shakil Talukder</h4>
                                <p>01751810216</p>
                                <b>Barishal</b>
                            </div>
                        </div>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/sajjad.jpg" alt="no images">
                                <h4>Robin Miya</h4>
                                <p>01923353869</p>
                                <b>Khulna</b>
                            </div>
                        </div>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/masum.jpg" alt="no images">
                                <h4>Motalib Miya</h4>
                                <p>01714649795</p>
                                <b>Rajshahi</b>
                            </div>
                        </div>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/masum.jpg" alt="no images">
                                <h4>Motalib Miya</h4>
                                <p>01600012582</p>
                                <b>Mymensingh</b>
                            </div>
                        </div>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/masum.jpg" alt="no images">
                                <h4>Motalib Miya</h4>
                                <p>01791567438</p>
                                <b>Sylhet</b>
                            </div>
                        </div>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/masum.jpg" alt="no images">
                                <h4>Motalib Miya</h4>
                                <p>01728012582</p>
                                <b>Rangpur</b>
                            </div>
                        </div>

                        <div class="chat_person">
                            <div class="chat_body">
                                <img src="images/masum.jpg" alt="no images">
                                <h4>Motalib Miya</h4>
                                <p>01727350615</p>
                                <b>Chattogram</b>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="special_service">
                    <div class="speacial_services_area">
                        <h2>Special Service</h2>


                    </div>
                </div>


            </div>

            <div class="col-lg-8">

                <h2 class="ambu_title">Call Ambulance</h2>
                <div class="want_ambulance">

                    <div class="want_ambulance_blck">

                        <div class="call_ambulance_form">


                            <div class="ambulance_form_style">
                                <div class="form_view_style">

                                    <form class="myForm" action="" method="post">
                                        <div class="call_ambulance">
                                            <div style="display: none;" class="call_ambulance">
                                                <input type="text" name="id" id="id"
                                                    value="<?php echo $_SESSION['id']; ?>">
                                            </div>
                                            <input type="text" name="complain" id="complain" placeholder="Complain">
                                        </div>
                                        <div class="call_ambulance">
                                            <input type="text" name="locations" id="locations" placeholder="Location">
                                        </div>

                                        <div class="call_ambulance">
                                            <input type="text" name="lat" id="latitude">
                                        </div>

                                        <div class="call_ambulance">
                                            <input type="text" name="lng" id="longitude">
                                        </div>

                                        <div class="call_ambulance">
                                            <input type="button" name="sub" id="sub" value="Send">
                                        </div>

                                    </form>


                                </div>
                            </div>



                            <script>
                            var sub = document.getElementById("sub");
                            sub.addEventListener("click", function() {
                                var cat = "ambulance";
                                var complain = document.getElementById("complain").value;
                                var locations = document.getElementById("locations").value;
                                var latitude = document.getElementById("latitude").value;
                                var longitude = document.getElementById("longitude").value;
                                var uid = document.getElementById("id").value;
                                var box = document.getElementById("box");

                                var data =
                                    "cat1=" +
                                    cat +
                                    "&complain1=" +
                                    complain +
                                    "&location=" +
                                    locations +
                                    "&latitude1=" +
                                    latitude +
                                    "&longitude1=" +
                                    longitude +
                                    "&uid1=" +
                                    uid;

                                if (complain == "" || locations == "") {
                                    alert("Please input the field");
                                } else {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/ambulance_data.php",
                                        data: data,
                                        success: function(html) {
                                            alert(html);
                                        },
                                    });
                                }
                                return false;
                            });
                            </script>



                            <div class="call_info">
                                <h6 class="requstTitle">Your Request List</h6>

                                <div class="call_info_style">
                                    <div class="call_info_date">
                                        <p>22 Nov</p>
                                    </div>

                                    <div class="call_info_details">
                                        <h4>Saikat Talukder</h4>
                                    </div>

                                    <div class="call_info_details">
                                        <p>10.48 pm</p>
                                    </div>

                                    <div class="call_info_details">
                                        <mark>Pending</mark>
                                    </div>
                                </div>

                                <div class="call_info_style">
                                    <div class="call_info_date">
                                        <p>22 Nov</p>
                                    </div>

                                    <div class="call_info_details">
                                        <h4>Saikat Talukder</h4>
                                    </div>

                                    <div class="call_info_details">
                                        <p>10.48 pm</p>
                                    </div>

                                    <div class="call_info_details">
                                        <mark>Pending</mark>
                                    </div>
                                </div>

                                <div class="call_info_style">
                                    <div class="call_info_date">
                                        <p>22 Mar</p>
                                    </div>

                                    <div class="call_info_details">
                                        <h4>Saikat Talukder</h4>
                                    </div>

                                    <div class="call_info_details">
                                        <p>10.48 pm</p>
                                    </div>

                                    <div class="call_info_details">
                                        <mark>Pending</mark>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="all_hours_block">
                    <div class="all_hours_style">
                        <div class="ambulance_area">
                            <h1>24 Hours Ambulance service in Bangladesh, <b>01911125156</b></h1>
                            <p>
                                24 Hours Ambulance service in Dhaka, Bangladesh. We Provide Ac Ambulance service, Non-Ac
                                Ambulance service, Freezing Ambulance service, and Basic life support ICU Ambulance, CCU
                                Ambulance , NICU Ambulance and, Ventilator Machine with Doctors or Brothers. Emergency
                                Ambulance service is available in all districts of Bangladesh.
                            </p>

                            <span>Contact us now</span>

                            <div class="cell_button">
                                <h6><i class="fa fa-phone" aria-hidden="true"></i> 01911125156</h6>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="nearest_help_number">
                    <h2 class="nearest_heading">Your Nearest Ambulance Number</h2>
                    <div class="nearest_number_form">
                        <form action="" method="post">
                            <label for="area">Select your division : </label> <br>
                            <select name="division" id="division">
                                <option value="0">Select</option>
                                <option value="">Dhaka</option>
                                <option value="">Sylhet</option>
                                <option value="">Rajshahi</option>
                                <option value="">Rangpur</option>
                                <option value="">Barisal</option>
                                <option value="">Khulna</option>
                                <option value="">Mymensingh</option>
                                <option value="">Chattogram</option>
                            </select>

                            <input type="button" value="Submit" name="submit" id="submit">

                        </form>
                    </div>
                </div>


                <div class="nearest_ambulance_res">
                    <div class="res_title">
                        <h2>Dhaka</h2>
                        <div class="res_title_blck">


                            <div class="full_res_area">
                                <h4 class="dist_name">Netrakona</h4>
                                <div class="full_res_desc">
                                    <h4>Raihan Rafi</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01713617913</h5>
                                </div>

                                <div class="full_res_desc">
                                    <h4>Moktadir Shuvo</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01713617913</h5>
                                </div>

                                <div class="full_res_desc">
                                    <h4>Ripon Mandal</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01751810216</h5>
                                </div>

                            </div>

                            <div class="full_res_area">
                                <h4 class="dist_name">Sherpur</h4>
                                <div class="full_res_desc">
                                    <h4>Raihan Rafi</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01713617913</h5>
                                </div>

                                <div class="full_res_desc">
                                    <h4>Moktadir Shuvo</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01713617913</h5>
                                </div>

                                <div class="full_res_desc">
                                    <h4>Ripon Mandal</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01751810216</h5>
                                </div>

                            </div>

                            <div class="full_res_area">
                                <h4 class="dist_name">Mymensingh</h4>
                                <div class="full_res_desc">
                                    <h4>Raihan Rafi</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01713617913</h5>
                                </div>

                                <div class="full_res_desc">
                                    <h4>Moktadir Shuvo</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01713617913</h5>
                                </div>

                                <div class="full_res_desc">
                                    <h4>Ripon Mandal</h4>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> 01751810216</h5>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/style.js"></script>
    <?php include_once 'include/footer.php'; ?>
</body>