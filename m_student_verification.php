
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
              <!-- <a class="btn btn-success" onclick="save_info();">Save</a>
              <a class="btn btn-primary" onclick="window.open('search_m_author.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
              <a class="btn btn-danger" onclick="">Cancel</a> -->
              
              
              
            </div>


                            
            <!-- form start -->
            <form role="form">
              <div class="box-body col-md-12">


                
                <div class="form-group"></div>
               <div class="form-group" hidden>
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Reference No</label>
                  </div>
                  <div class="col-sm-2">
                  <input type="text" class="form-control" id="REF" v-model="REF" placeholder="Reference No">
                  </div>
                </div>
                
                <!-- <br><br> -->




                <div class="form-group"></div>
                <div class="form-group" hidden>
                    <div class="col-sm-2">
                        <label for="first_name" >Name</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                </div>
                
                <!-- <br><br> -->

                

              </div>
              <!-- /.box-body -->

              <div class="box-body">

               <!--  <table id="myTable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Session Ref</th>
                      <th scope="col">Name</th>
                      <th scope="col">Slots</th>
                      <th scope="col">Select</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table> -->
                
                <table id="exampletable"  class='table table-bordered' style="width:100%">
                  <thead>
                      <tr>
                          <th>First Name</th>
                          <th>Second Name</th>
                          <th>School</th>
                          <th>ID</th>
                          <th>Approve</th>
                          
                      </tr>
                  </thead>
                  <tfoot>
                    <tr v-for="student in STUDENTS">

                      <td>{{ student[0] }}</td>
                      <td>{{ student[1] }}</td>
                      <td>{{ student[2] }}</td>
                      <td>{{ student[3] }}</td>
                      <td><a class="btn btn-success btn-sm" @click="approve(student[0],student[1],student[5])">Approve</a></td>

                    </tr>
                  </tfoot>
                </table>
              
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
       


      </div>

</section>
<script src="js/m_student_verification.js"></script>
<!-- <script>getdt();</script> -->



