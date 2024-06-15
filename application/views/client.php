<div style="width:100%" class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Client</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Client</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <!-- <h3 class="card-title">Client </h3> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add Client</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('addClient') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="Client_name">Client Name</label><span class="text-danger">*</span>
                                                                <input type="text" name="clientName" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Client_name">Contact Person</label><span class="text-danger">*</span>
                                                                <input type="text" name="contactPerson" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Code">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Client_location">Client billing address</label><span class="text-danger">*</span>
                                                                <input type="text" name="clientBaddress" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Billing Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Client_location">Client shifting address</label><span class="text-danger">*</span>
                                                                <input type="text" name="clientSaddress" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Shifting Address">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Client_location">Add GST Number</label><span class="text-danger">*</span>
                                                                <input type="text" name="gst_no" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add GST Number">
                                                            </div>

                                                            <!-- Example single danger button -->
                                                            <!-- <div class="form-group">
                                                                <label for="payment_terms">Payment Terms</label><span class="text-danger">*</span>
                                                                <input type="text" name="paymentTerms" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Payment Terms">
                                                            </div> -->

                                                            <div class="form-group">
                                                                <label for="payment_terms">Phone Number</label><span class="text-danger">*</span>
                                                                <input type="number" min="0" name="phone_no" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Payment Terms">
                                                            </div>
                                                        </div>


                                                        <!-- <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="max_reshaping_revision">Max Resharpening Revision</label><span class="text-danger">*</span>
                                                                <input type="text" class="form-control" name="maxResharpeningRevision" required id="exampleInputPassword1" placeholder="Max Resharpening Revision">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="fixture_number">
                                                                    Safety Stock
                                                                </label><span class="text-danger">*</span>
                                                                <input type="text" name="safetyStock" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fixture Number">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fixture_number">
                                                                    Defined Tool Life </label><span class="text-danger">*</span>
                                                                <input type="text" name="definedToolLife" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fixture Number">
                                                                <input type="hidden" value="tool_without_insert" name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fixture Number">
                                                            </div>
                                                        </div> -->

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Client Name</th>
                                            <th>Client Code</th>
                                            <th>Client Billing Address</th>
                                            <th>Client Shifting Address</th>
                                            <th>GST Number</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($client_list) {
                                            foreach ($client_list as $t) {


                                        ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $t->client_name ?></td>
                                                    <td><?php echo $t->contact_person ?></td>
                                                    <td><?php echo $t->billing_address ?></td>
                                                    <td><?php echo $t->shifting_address ?></td>
                                                    <td><?php echo $t->gst_number ?></td>
                                                    <td><?php echo $t->phone_no ?></td>

                                                    <td>
                                                        <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModal2<?php echo $i ?>"> <i class="fas fa-edit"></i></button>

                                                        <div class="modal fade" id="exampleModal2<?php echo $i ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Add Tool</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">



                                                                        <form action="<?php echo base_url('updateClient') ?>" method="POST">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">

                                                                                    <div class="form-group">
                                                                                        <label for="Client_name">Client Name</label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<?php echo  $t->client_name  ?>" name="uclientName" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Name">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="Client_name">Contact Person</label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<?php echo  $t->contact_person  ?>" name="ucontactPerson" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Code">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="Client_location">Client billing address</label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<?php echo  $t->billing_address  ?>" name="uclientBaddress" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Billing Address">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="Client_location">Client shifting address</label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<?php echo  $t->shifting_address  ?>" name="uclientSaddress" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Client Shifting Address">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="Client_location">Add GST Number</label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<?php echo  $t->gst_number  ?>" name="ugst_no" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add GST Number">
                                                                                    </div>

                                                                                    <!-- Example single danger button -->
                                                                                    <!-- <div class="form-group">
                                                                <label for="payment_terms">Payment Terms</label><span class="text-danger">*</span>
                                                                <input type="text" name="paymentTerms" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Payment Terms">
                                                            </div> -->

                                                                                    <div class="form-group">
                                                                                        <label for="payment_terms">Phone Number</label><span class="text-danger">*</span>
                                                                                        <input type="number" value="<?php echo  $t->phone_no  ?>" min="0" name="uphone_no" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Payment Terms">
                                                                                        <input type="hidden" name="id" value="<?php echo $t->id ?>">
                                                                                    </div>
                                                                                </div>



                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <button type="submit" data-toggle="modal" class="btn btn-sm btn-danger ml-4" data-target="#exampleModal3<?php echo $i ?>"> <i class="far fa-trash-alt"></i></button> -->
                                                        <!-- Button trigger modal -->
                                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    Launch demo modal
                                                </button> -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal3<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="<?php echo base_url('delete') ?>" method="POST">

                                                                        <div class="modal-body">

                                                                            <input value="<?php echo $t->id; ?>" name="id" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                                                            <input value="client" name="table_name" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">

                                                                            Are you sure you want to delete
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger">Delete </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Client Name</th>
                                            <th>Client Code</th>
                                            <th>Client Billing Address</th>
                                            <th>Client Shifting Address</th>
                                            <th>GST Number</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->