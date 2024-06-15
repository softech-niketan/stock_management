<div class="wrapper">
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
                        <h1>Gate Out Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Part Master</li>
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

                            <!-- Modal -->


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>INVOICE NO</th>
                                            <th>PART CODE</th>
                                            <th>PART DESCRIPTION</th>
                                            <th>QTY</th>
                                            <th>GATEOUT CODE</th>
                                            <th>GATE OUT DATE</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($invoice_match) {
                                            foreach ($invoice_match as $po) {
                                                // echo $poo->part_number;
                                                $invoice = $this->Crud->get_data_by_id("invoice", $po->invoice_number, "barcode");
                                                $invoice_box = $this->Crud->get_data_by_id("invoice_box", $invoice[0]->id, "invoice_id");
                                                $box = $this->Crud->get_data_by_id("box", $invoice_box[0]->box_id, "barcode");
                                                $box_packing = $this->Crud->get_data_by_id("box_packing", $box[0]->id, "box_id");
                                                $packing = $this->Crud->get_data_by_id("packing", $box_packing[0]->pack_id, "barcode");
                                                $parts = $this->Crud->get_data_by_id("parts", $packing[0]->part_id, "id");
                                                // $customer_part_data = $this->Crud->get_data_by_id("customer_part_type", $po[0]->customer_part_id, "id");
                                                // print_r($supplier_data);
                                        ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $invoice[0]->invoice_number; ?></td>
                                                    <td><?php echo $parts[0]->part_number; ?></td>
                                                    <td><?php echo $parts[0]->part_description; ?></td>
                                                    <td><?php echo $invoice[0]->qty; ?></td>
                                                    <td><?php echo $invoice[0]->invoice_number . "4000" . $invoice[0]->id ?></td>
                                                    <td><?php echo $po->created_date . "/" . $po->created_time ?></td>




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