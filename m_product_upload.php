
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
              <a class="btn btn-success" onclick="save_info();">Save</a>
              <!-- <a class="btn btn-primary" onclick="window.open('search_m_author.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
              <a class="btn btn-danger" onclick="">Cancel</a> -->
              
              
              
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
                </div><br><br>




                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="file-3">Choose Your Excel</label>
                    </div>
                    <div class="col-sm-3">
                      <div id="filup">
                      
                      
                      <label for="file-3" class="btn btn-default">
                      <input onchange="upfile();" id="file-3" name="file-3" multiple="multiple" type="file" class="form-control">
                      Select Files  
                      </label> 
                      <div class="col-sm-12">
                      <label class="col-sm-2"></label>
                      <div class="form-group">
                      </div>
                      </div>
                      </div>
                      <!-- <input type="text" class="form-control" id="name" placeholder="Name"> -->
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
<script src="js/m_product_upload.js"></script>
<!-- <script>getdt();</script> -->



