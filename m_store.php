
<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<section class="content container-fluid" id="app">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ en_name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="btn-group" style="padding: 10px;">
              <a id="save_info" class="btn btn-success" onclick="save_info();">Save</a>
              <a id="app_info" class="btn btn-success" onclick="approve();">Approve</a>
              <a id="search_info" class="btn btn-primary" onclick="window.open('search_m_store.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
              <a id="cancel_info" class="btn btn-danger" onclick="">Cancel</a>
              
              
              
            </div>


                
            <!-- form start -->
            <form role="form">
              <div class="box-body col-md-12">


                
                <div class="form-group"></div>
               <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Reference No</label>
                  </div>
                  <div class="col-sm-2">
                  <input type="text" class="form-control" id="REF" v-model="REF" placeholder="Reference No">
                  </div>
                   <div class="col-sm-2" hidden>                    
                    <div class="checkbox">
                    <label>
                      <input id="active" checked="" type="checkbox"> Active
                    </label>
                    </div>
                    </div>
                     <div class="col-sm-2" hidden>                    
                    <div class="checkbox">
                    <label>
                      <input id="approve" checked="" type="checkbox"> Approve
                    </label>
                    </div>
                    </div>
                     <div class="col-sm-2">
                    <label for="exampleInputEmail1"  id="app_status"></label>
                  </div>
                    
                    
                </div><br><br>



                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Shop Name</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="shop_name" placeholder="Shop Name">
                </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Tagline</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="tagline" placeholder="Tagline">
                </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Type</label>
                </div>
                <div class="col-sm-3">
                  <!-- <input type="text" class="form-control" id="listing_type" placeholder="Type"> -->
                  <div class="form-group">
                    <!-- <label>Select</label> -->
                    <select class="form-control" id="listing_type">
                      <option value="BSS">Books and Stationeries Store</option>
                      <option value="UC">Uniforms and Costumes Store</option>
                      <option value="AC">Arts and Crafts Store</option>
                    </select>
                  </div>
                </div>
                </div><br><br>


                <!-- <div class="form-group"></div> -->
                <div class="form-group" hidden>
                <div class="col-sm-2">
                  <label for="first_name">Vendor Ref</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="vendor_ref" placeholder="Vendor Ref">
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="vendor_name" placeholder="Vendor Name">
                </div>
                <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_registration.php?IDF=store', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                  </div>
                </div>
                <!-- <br><br> -->


             

                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Address</label>
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="address" placeholder="Address">
                </div>
                </div><br><br>


                <!-- <div class="form-group"></div> -->
                <div class="form-group" hidden>
                <div class="col-sm-2">
                  <label for="first_name">Loctaion Point</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="loctaion_point_lat" placeholder="Loctaion Point Lat">
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="loctaion_point_lng" placeholder="Loctaion Point Lng">
                </div>
                </div>
                <!-- <br><br> -->
                


                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Phone Number 1</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="phone_number_1" placeholder="Phone Number 1">
                </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Phone Number 2</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="phone_number_2" placeholder="Phone Number 2">
                </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Email Address</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="email_address" placeholder="Email Address">
                </div>
                </div><br><br>



                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Logo upload</label>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="file" id="store_file">
                    <input type="hidden" id="store_logo">

                    
                  </div>
                </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Preview</label>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <div id=img_path></div>
                    
                  </div>
                </div>
                </div><br><br>




 
                  
                


              </div>
              <!-- /.box-body -->

              <div class="box-footer">

              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
       


      </div>

</section>
<script src="js/m_store.js"></script>
<!-- <script>getdt();</script> -->



