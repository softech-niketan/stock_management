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
                        <h1>Create Box Packing</h1>
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
                            <div class="card-header">
                                <div class="row">
                                    <?php
                                    if ($box[0]->lock_status == "no") {
                                    ?>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <form action="<?php echo base_url('add_box_packing_data') ?>" method="post">
                                                    <label for="">Scan Code</label>
                                                    <input type="number" placeholder="Enter Packing Barcode" required name="pack_id" class="form-control">
                                                    <input type="hidden" value="<?Php echo $box_id; ?>" name="box_id" class="form-control">
                                                    <input type="hidden" value="<?Php echo $box[0]->box_name; ?>" name="box_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger mt-4">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <!-- <button type="submit" class="btn btn-info mt-4">Lock Box</button> -->
                                                <button type="button" class="btn btn-primary float-left mt-4" data-toggle="modal" data-target="#exampleModal">
                                                    Lock Box </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Lock Box </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url('change_box_status') ?>" method="POST" enctype='multipart/form-data'>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <label for="">Are You Sure Want To Lock This Box ?</label>
                                                                            <input type="hidden" name="box_id" value="<?php echo $box[0]->id ?>" class="form-control">
                                                                            <input type="hidden" name="status" value="yes" class="form-control">

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
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <p>Status : Box Locked !!</p>
                                                </form>
                                            </div>
                                        </div>
                                    <?php
                                    }


                                    ?>


                                </div>
                            </div>
                            <?php
                            if ($box[0]->lock_status == "yes") {
                            ?>
                                <div class="card-header float-right ">
                                    <div class="card bg-light mb-3" style="max-width: 18rem;" id="my-node">
                                        <div class="card-body" style="font-weight: bold;">


                                            <p class="card-text" style="font-size:20px">Box Name (Part No) :<?php echo $box[0]->box_name; ?>
                                                <br>
                                                Pkg Date : <?php echo $box[0]->created_time; ?>
                                                <br>
                                                Part Qty: <?php echo $total_part_qty; ?>
                                                <br>
                                                Bar Code: <?php echo $box[0]->barcode; ?>
                                                <br>
                                                <?php
                                                $code = $box[0]->barcode;
                                                require 'vendor/autoload.php';
                                                $code = $box[0]->barcode;









                                                // This will output the barcode as HTML output to display in the browser
                                                // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                // echo $generator->getBarcode($code, $generator::TYPE_CODE_128);
                                                // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '">';
                                                // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';

                                                ?>

                                                <br>
                                                <canvas class = "barcode"></canvas>
                                                <span class ="qrcode"></span>
                                                <span style="font-size:12px">
                                                </span>
                                            </p>


                                        </div>
                                    </div>
                                    <script>
                                        function printDiv(id) {
                                            var divContents = document.getElementById(id).innerHTML;
                                            var a = window.open('', '', 'height=500, width=500');
                                            a.document.write('<html>');
                                            a.document.write('<body >');
                                            a.document.write(divContents);
                                            a.document.write('</body></html>');
                                            a.document.close();
                                            a.print();
                                        }
                                    </script>


                                    <button id="foo" class="btn btn-info">
                                        Download
                                    </button>
                                    <button onclick="printDiv('my-node')" class="btn btn-danger">
                                        Print
                                    </button>

                                    <script>
                                        var node = document.getElementById('my-node');
                                        var btn = document.getElementById('foo');
                                        btn.onclick = function() {
                                            // node.innerHTML = "I'm an image now."
                                            domtoimage.toBlob(document.getElementById('my-node')).then(function(blob) {
                                                window.saveAs(blob, '<?php echo $box[0]->barcode; ?>.png');
                                            });
                                        }
                                        <?php
                                            $po = $parts;
                                        ?>
                                        var qrData = 'part no : <?php echo $po->part_number;?>' + "\n" +  'Quantity : <?php echo $total_part_qty;?>' + "\n" + 'Date : <?php echo $box[0]->created_time;?>'+ "\n" + 'Part Description :<?php echo $po->part_description;?>' + "\n" + 'Vendor Code : <?php echo $po->vendor_code;?>'; 

                                        var qrcode = new QRCode(document.querySelector(".qrcode"), {
                                            text: qrData,
                                            width: 128,
                                            height: 128,
                                            colorDark : "#5868bf",
                                            colorLight : "#ffffff",
                                            correctLevel : QRCode.CorrectLevel.H
                                        });

                                        JsBarcode(".barcode",<?php echo $code;?> , {
                                                               
                                            lineColor: "black",
                                            height:40,
                                            displayValue: false
                                        });
                                    </script>



                                </div>
                            <?php
                            }

                            ?>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url('add_box') ?>" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">


                                                        <!-- <div class="form-group">
                                                                <label for="operation_number">Operation Number</label><span class="text-danger">*</span>
                                                                <input type="text" name="operationNumber" class="form-control" required id="exampleInputPassword1" placeholder="Operation Number">

                                                        </div>-->
                                                        <div class="form-group">
                                                            <label for="po_num">Box Name </label><span class="text-danger">*</span>
                                                            <input type="text" name="box_name" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Number" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Box Size </label>
                                                            <input type="text" name="box_size" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" aria-describedby="emailHelp">
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-6">

                                                        <!-- <div class="form-group">
                                                            <label for="po_num">Part Drawing </label><span class="text-danger">*</span>
                                                            <input type="file" name="part_drawing" required class="form-control" id="exampleInputEmail1" placeholder="Enter Safty/buffer stock" aria-describedby="emailHelp">
                                                        </div> -->



                                                        <!-- <div class="form-group">
                                                            <label> Customer Part Type </label><span class="text-danger">*</span>
                                                            <select class="form-control select2" name="customer_part_id" style="width: 100%;">
                                                                <?php
                                                                foreach ($customers_part_type as $c1) {
                                                                ?>
                                                                    <option value="<?php echo $c1->id; ?>"><?php echo $c1->customer_type_name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div> -->


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


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Part Name</th>
                                            <th>Part Description</th>
                                            <th>Batch Code</th>
                                            <th>Part Qty</th>
                                            <th>Delete</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $total = 0;
                                        if ($box_packing) {
                                            foreach ($box_packing as $po) {
                                                // echo $poo->part_number;
                                                $packing_data = $this->Crud->get_data_by_id("packing", $po->pack_id, "barcode");
                                                $parts_data = $this->Crud->get_data_by_id("parts", $packing_data[0]->part_id, "id");
                                                // $customer_part_data = $this->Crud->get_data_by_id("customer_part_type", $po[0]->customer_part_id, "id");
                                                // print_r($supplier_data);
                                                $total = $total + $packing_data[0]->part_qty;

                                        ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <!-- <td><?php echo $packing_data[0]->packing_name; ?></td> -->
                                                    <td><?php echo $parts_data[0]->part_number; ?></td>
                                                    <td><?php echo $parts_data[0]->part_description; ?></td>
                                                    <td><?php echo $packing_data[0]->batch_code; ?></td>
                                                    <td><?php echo $packing_data[0]->part_qty; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($box[0]->lock_status == "no") {
                                                        ?>
                                                            <button type="button" class="btn btn-danger float-left" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
                                                                Delete </button>
                                                            <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo base_url('delete') ?>" method="POST" enctype='multipart/form-data'>
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">

                                                                                        <label for="">Are You Sure Want To Delete This Packing ?</label>
                                                                                        <input type="hidden" name="id" value="<?php echo $po->id ?>" class="form-control">
                                                                                        <input type="hidden" name="table_name" value="box_packing" class="form-control">

                                                                                    </div>

                                                                                </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger">Save changes</button>
                                                                        </div>
                                                                        </form>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <?php

                                                        } else {
                                                            echo "Box Locked Can't Delete";
                                                        } ?>
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
                                            <th colspan="4">Total</th>
                                            <th><?php echo $total; ?></th>
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