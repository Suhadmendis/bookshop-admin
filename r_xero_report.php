
<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<section class="content container-fluid" id="app">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Xero Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="btn-group" style="padding: 10px;">
              <!-- <a class="btn btn-success" onclick="save_info();">Save</a>
              <a class="btn btn-primary" onclick="window.open('search_m_school.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
              <a class="btn btn-danger" onclick="">Cancel</a> -->
              <br>
            </div>


                
            <!-- form start -->
            <form role="form">
              <div class="box-body col-md-12">


                
                <div class="form-group"></div>
               <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Slot 1</label>
                  </div>
                  <div class="col-sm-2">
                  <!-- <input type="text" class="form-control" id="REF" v-model="REF" placeholder="Reference No"> -->
                  <input type="text" class="form-control" id="REF"  placeholder="Reference No">
                  </div>
                </div><br><br>




                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Slot 2</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        
                    </div>
                    <div class="col-sm-3">
                      <a class="btn btn-info" onclick="print_view();">View</a>                         
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
<script src="js/r_xero_report.js"></script>
<!-- <script>getdt();</script> -->



