<div style="width: 2500px" class="wrapper">
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
                        <h1>Supplier List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Supplier List</li>
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
                                <h3 class="card-title"></h3>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add Supplier</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form action="<?php echo base_url('addSupplier') ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="machine_name">Supplier Name</label><span class="text-danger">*</span>
                                                                <input type="text" name="supplierName" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Name">

                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label for="machine_name">Supplier Code</label><span class="text-danger">*</span>
                                                                <input type="text" name="supplierNumber" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Number">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="machine_name">Supplier Address</label><span class="text-danger">*</span>
                                                                <input type="text" name="supplierlocation" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Location">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="machine_name">Supplier Mobile Number</label>
                                                                <input type="number" name="supplierMnumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="machine_name">Upload NDA Document</label>
                                                                <input type="file" name="nda_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="machine_name">Upload Registration Document</label>
                                                                <input type="file" name="registration_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="machine_name">Other Document 1</label>
                                                                <input type="file" name="other_document_1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                            </div>
                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label for="machine_name">Supplier Email</label>
                                                            <input type="email" name="supplierEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Email">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="customer_location">Add State</label><span class="text-danger">*</span>
                                                            <input type="text" name="state" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add State">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="customer_location">Add GST Number</label><span class="text-danger">*</span>
                                                            <input type="text" name="gst_no" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add GST Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payment_terms">Payment Terms</label><span class="text-danger">*</span>
                                                            <input type="number" min="0" name="paymentTerms" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Payment Terms">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="machine_name">Other Document 2</label>
                                                            <input type="file" name="other_document_2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="machine_name">Other Document 3</label>
                                                            <input type="file" name="other_document_3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

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
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Supplier Name</th>
                                            <th>Supplier Number</th>
                                            <th>Supplier Address</th>
                                            <th>Supplier Email</th>
                                            <th>Supplier Mobile Number</th>
                                            <th>GST Number</th>
                                            <th>State</th>
                                            <th>Payment Terms</th>
                                            <th>NDA Documents</th>
                                            <th>Registration Documents</th>
                                            <th>Other Document 1</th>
                                            <th>Other Document 2</th>
                                            <th>Other Document 3</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Supplier Name</th>
                                            <th>Supplier Number</th>
                                            <th>Supplier Address</th>
                                            <th>Supplier Email</th>
                                            <th>Supplier Mobile Number</th>
                                            <th>GST Number</th>
                                            <th>State</th>
                                            <th>Payment Terms</th>
                                            <th>NDA Documents</th>
                                            <th>Registration Documents</th>
                                            <th>Other Document 1</th>
                                            <th>Other Document 2</th>
                                            <th>Other Document 3</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        if ($supplier_list) {
                                            foreach ($supplier_list as $s) {
                                                // print_r($m);
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $s->supplier_name; ?></td>
                                                    <td><?php echo $s->supplier_number; ?></td>
                                                    <td><?php echo $s->location; ?></td>
                                                    <td><?php echo $s->email; ?></td>
                                                    <td><?php echo $s->mobile_no; ?></td>
                                                    <td><?php echo $s->gst_number ?></td>
                                                    <td><?php echo $s->state ?></td>
                                                    <td><?php echo $s->payment_terms ?></td>
                                                    <td>
                                                        <?php
                                                        if (!empty($s->nda_document)) {
                                                        ?>
                                                            <a href="<?php echo base_url('documents/') . $s->nda_document; ?>" download>Download</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($s->registration_document)) {
                                                        ?>
                                                            <a href="<?php echo base_url('documents/') . $s->registration_document; ?>" download>Download</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($s->other_document_1)) {
                                                        ?>
                                                            <a href="<?php echo base_url('documents/') . $s->other_document_1; ?>" download>Download</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($s->other_document_2)) {
                                                        ?>
                                                            <a href="<?php echo base_url('documents/') . $s->other_document_2; ?>" download>Download</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($s->other_document_3)) {
                                                        ?>
                                                            <a href="<?php echo base_url('documents/') . $s->other_document_3; ?>" download>Download</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button type="submit" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModal2<?php echo $i; ?>"> <i class="fas fa-edit"></i></button>

                                                        <div class="modal fade" id="exampleModal2<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Update Supplier Number</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <form action="<?php echo base_url('updateSupplier') ?>" method="POST" enctype="multipart/form-data">
                                                                                    <div class="form-group">
                                                                                        <label for="machine_name">Supplier Name</label><span class="text-danger">*</span>
                                                                                        <input value="<?php echo $s->id; ?>" name="id" type="hidden" required class="form-control" id="updateName" aria-describedby="emailHelp" placeholder="Enter Supplier Name">
                                                                                        <input value="<?php echo $s->supplier_name; ?>" readonly name="updateName" type="text" required class="form-control" id="updateName" aria-describedby="emailHelp" placeholder="Enter Supplier Name">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="machine_name">Supplier Number</label><span class="text-danger">*</span>
                                                                                        <input value="<?php echo $s->supplier_number; ?>" readonly name="updateNumber" type="text" required class="form-control" id="updateName" aria-describedby="emailHelp" placeholder="Enter Supplier Number">


                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="machine_name">Supplier Address</label><span class="text-danger">*</span>
                                                                                        <input type="text" value="<?php echo $s->location; ?>" name="updatesupplierlocation" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Number">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="machine_name">Supplier Mobile Number</label><span class="text-danger">*</span>
                                                                                        <input type="number" value="<?php echo $s->mobile_no; ?>" name="updatesupplierMnumber" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Number">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="machine_name">Other Document 2</label>
                                                                                        <input type="file" name="other_document_2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                                                                        <input type="hidden" name="other_document_2_old" value="<?php echo $s->other_document_2; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="machine_name">Other Document 3</label>
                                                                                        <input type="file" name="other_document_3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                                                                        <input type="hidden" name="other_document_3_old" value="<?php echo $s->other_document_3; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="machine_name">Upload NDA Document</label>
                                                                                        <input type="file" name="nda_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                                                                        <input type="hidden" name="nda_document_old" class="form-control" value="<?php echo $s->nda_document ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                                                    </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="machine_name">Supplier Email</label><span class="text-danger">*</span>
                                                                                    <input type="email" value="<?php echo $s->email; ?>" name="updatesupplierEmail" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Number">

                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="customer_location">Add State</label><span class="text-danger">*</span>
                                                                                    <input type="text" name="ustate" required value="<?php echo $s->state ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add State">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="customer_location">Add GST Number</label><span class="text-danger">*</span>
                                                                                    <input type="text" name="ugst_no" required value="<?php echo $s->gst_number ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add GST Number">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="machine_name">Other Document 1</label>
                                                                                    <input type="file" name="other_document_1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                                                                    <input type="hidden" name="other_document_1_old" value="<?php echo $s->other_document_1; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

                                                                                </div>


                                                                                <div class="form-group">
                                                                                    <label for="payment_terms">Payment Terms</label><span class="text-danger">*</span>
                                                                                    <input type="text" value="<?php echo $s->payment_terms ?>" name="upaymentTerms" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Payment Terms">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="machine_name">Upload Registration Document</label>
                                                                                    <input type="file" name="registration_document" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">
                                                                                    <input type="hidden" name="registration_document_old" value="<?php echo $s->registration_document ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Mobile Number">

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
                                                        </div>
                                                        <!-- <button type="submit" data-toggle="modal" class="btn btn-sm btn-danger ml-4" data-target="#exampleModal<?PHP echo $i; ?>"> <i class="far fa-trash-alt"></i></button> -->
                                                        <!-- Button trigger modal -->
                                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    Launch demo modal
                                                </button> -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?PHP echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('delete') ?>" method="POST">
                                                                            <input value="<?php echo $s->id; ?>" name="id" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">
                                                                            <input value="supplier" name="table_name" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">

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