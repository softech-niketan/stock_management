<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">ERP Users</h1>
          <!-- <a href="<?php echo base_url('export_promocode'); ?>" class="btn btn-primary text-white">
                 Export Promocode
                </a> -->
        </div><!-- /.col -->

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">

    <div>
      <!-- Small boxes (Stat box) -->
      <div class="row">


        <br>
        <div class="col-lg-12">

          <!-- Modal -->
          <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add EPR Users</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <form action="<?php echo base_url('add_users_data') ?>" method="POST" enctype="multipart/form-data">

                  </div>
                  <div class="form-group">
                    <label for="on click url">User Full Name<span class="text-danger">*</span></label> <br>
                    <input required type="text" name="user_name" placeholder="Enter Full Name" class="form-control" value="" id="">


                  </div>
                  <div class="form-group">
                    <label for="on click url">User Email<span class="text-danger">*</span></label> <br>
                    <input required type="email" name="user_email" placeholder="Enter Email" class="form-control" value="" id="">


                  </div>
                  <div class="form-group">
                    <label for="on click url">User Password<span class="text-danger">*</span></label> <br>
                    <input required type="password" name="user_password" placeholder="Enter Password" class="form-control" value="" id="">


                  </div>
                  <div class="form-group">
                    <label for="on click url">Select Role<span class="text-danger">*</span></label> <br>
                    <select name="user_role" class="form-control" id="">
                      <option value="Admin">Admin</option>
                      <option value="packing">Packing</option>
                      <option value="box">Box</option>
                      <option value="invoice">Invoice </option>
                      <option value="gate">Gate Security </option>

                    </select>


                  </div>


                </div>








                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card">

            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromo">
                Add ERP Users
              </button>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Sr No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  if (true) {
                    $i = 1;
                    foreach ($user_info as $u) {
                      //$product_into = $this->Ojwebsitemodel->get_product_info_new($u->product_id);

                  ?>


                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $u->user_name ?></td>
                        <td><?php echo $u->user_email ?></td>
                        <td><?php echo $u->user_password ?></td>
                        <td><?php echo $u->type ?></td>





                      </tr>

                  <?php
                      $i++;
                    }
                  }
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- ./col -->
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>