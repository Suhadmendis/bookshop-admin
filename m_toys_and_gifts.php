
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
              <a id="search_info" class="btn btn-primary" onclick="window.open('search_m_toys_and_gifts.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
              <a id="cancel_info" class="btn btn-danger" onclick="cancel_imb();">Cancel</a>
              
              
              
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
                  <input type="text" class="form-control" id="REF" v-model="REF" :disabled="true" placeholder="Reference No">
                  </div>

                  <div class="col-sm-2">
                    <label for="exampleInputEmail1"  id="app_status"></label>
                  </div>
                </div><br><br>







                <!-- <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Category </label>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" id="category_name">
                                <option value="SYL">Syllabus</option>
                                <option value="STA">Stationeries</option>
                                <option value="TB">Text Books</option>
                                <option value="CB">Course Books</option>
                                <option value="PB">Practical Books</option>
                            </select>
                        </div>
                        
                    </div>
                </div><br><br> -->


                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Type </label>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!-- <label>Select</label> -->
                            <select class="form-control" id="category_name12" v-model="selectType" @change="setSubTypes" >
                
                                <option :value="type.value" v-for="type in TYPES">{{ type.name }}</option>     
                            </select>
                        </div>
                    </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Category </label>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!-- <label>Select</label> -->
                            <select class="form-control" id="category_name">
                            <option :value="subtype.value" v-for="subtype in SUBTYPES">{{ subtype.name }}</option>      
                                <!-- <option value="MAL">Male</option>
                                
                                <option value="FEM">Female</option>
                                <option value="ACC">Accessories</option> -->
                                
                            </select>
                        </div>
                    </div>
                </div><br><br>


                <!-- <div class="form-group"></div> -->
                <div class="form-group" hidden>
                    <div class="col-sm-2">
                        <label for="first_name" >School </label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="school_ref" placeholder="School Ref">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="school_name" placeholder="School Name">
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_school.php?IDF=item', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                  </div>
                </div>
                <!-- <br><br> -->

                <!-- <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Level</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="level_ref" placeholder="Level Ref">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="level_name" placeholder="Level Name">
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_level.php?IDF=item', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                  </div>
                </div><br><br> -->

               


                

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Item Name</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="item_name" placeholder="Item Name">
                    </div>
                </div><br><br>



                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Description</label>
                    </div>
                    <div class="col-sm-4">
                    <textarea name="" class="form-control" id="des" cols="5" rows="3"></textarea>
                        
                    </div>
                </div><br><br><br><br>



                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Logo upload</label>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="file" id="img_file">
                    <input type="hidden" id="img_logo">

                    
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
                <!-- <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Selling Price/Unit</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="selling_price" placeholder="Selling Price/Unit">
                    </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Quantity</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="quantity" placeholder="Quantity">
                    </div>
                </div><br><br> -->


                


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
<script src="js/m_toys_and_gifts.js"></script>
<!-- <script>getdt();</script> -->



