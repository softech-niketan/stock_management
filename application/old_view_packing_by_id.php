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
                        <h1>Part Master</h1>
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
                                <h3 class="card-title">

                                </h3>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add </button> -->
                            </div>
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
                                            <form action="<?php echo base_url('addcustomerpart') ?>" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">


                                                        <!-- <div class="form-group">
                                                                <label for="operation_number">Operation Number</label><span class="text-danger">*</span>
                                                                <input type="text" name="operationNumber" class="form-control" required id="exampleInputPassword1" placeholder="Operation Number">

                                                        </div>-->
                                                        <div class="form-group">
                                                            <label for="po_num">Part Number </label><span class="text-danger">*</span>
                                                            <input type="text" name="part_number" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Number" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Part Description </label><span class="text-danger">*</span>
                                                            <input type="text" name="part_desc" required class="form-control" id="exampleInputEmail1" placeholder="Enter Description" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Packing Qty </label><span class="text-danger">*</span>
                                                            <input type="number" name="qty" required class="form-control" id="exampleInputEmail1" placeholder="Enter Qty" aria-describedby="emailHelp">
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
                                            <!-- <th>Add Revision</th> -->

                                            <!-- <th>Revision Number</th>
                                            <th>Revision Date</th>
                                            <th>Revision Remark</th> -->
                                            <!-- <th>Customer Name</th> -->
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Packing Qty</th>
                                            <th>Batch code</th>
                                            <th>Click Barcode To Download</th>


                                            <!-- <th>Customer Part Type</th>
                                            <th>Part Family</th>
                                            <th>UOM</th>
                                            <th>HSN</th>
                                            <th>Saftey Stock</th> -->
                                            <!-- <th>BOM</th>
                                            <th>Drawing</th>
                                            <th>Model</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Add Revision</th> -->

                                            <!-- <th>Revision Number</th>
                                            <th>Revision Date</th>
                                            <th>Revision Remark</th> -->
                                            <!-- <th>Customer Name</th> -->
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Packing Qty</th>
                                            <th>Batch code</th>
                                            <th>Click Barcode To Download</th>

                                            <!-- <th>Customer Part Type</th>
                                            <th>Part Family</th>

                                            <th>UOM</th>
                                            <th>HSN</th>
                                            <th>Saftey Stock</th> -->
                                            <!-- <th>BOM</th>
                                            <th>Drawing</th>
                                            <th>Model</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($packing) {
                                            foreach ($packing as $po) {
                                                // echo $poo->part_number;
                                                $parts = $this->Crud->get_data_by_id("parts", $po->part_id, "id");
                                                // $customer_data = $this->Crud->get_data_by_id("customer", $po[0]->customer_id, "id");
                                                // $customer_part_data = $this->Crud->get_data_by_id("customer_part_type", $po[0]->customer_part_id, "id");
                                                // print_r($supplier_data);

                                                if (isset($_GET['urlid'])) {
                                                    $my_id = $_GET['urlid'];
                                                } else {
                                                    $my_id = "";
                                                }

                                                if (true) {
                                                }
                                        ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $parts[0]->part_number; ?></td>
                                                    <td><?php echo $parts[0]->part_description; ?></td>
                                                    <td><?php echo $po->part_qty; ?></td>
                                                    <td><?php echo $po->batch_code; ?></td>
                                                    
                                                    <td>
                                                        <div class="card bg-light mb-3" style="max-width: 18rem;" id="my-node<?php echo $i ?>">
                                                            <div class="card-body" style="font-weight: bold;">

                                                                <p class="card-text" style="font-size:20px">Part No :<?php echo $parts[0]->part_number; ?>
                                                                    <br>
                                                                    Qty : <?php echo $po->part_qty; ?>
                                                                    <br>
                                                                    Pkg Date : <?php echo $po->created_time; ?>
                                                                    <br>
                                                                    Bar Code: <?php echo $po->barcode; ?>
                                                                    <br>
                                                                    <?php
                                                                    $code = $po->barcode;
                                                                    require 'vendor/autoload.php';
                                                                    $code = $po->barcode;

                                                                   


                                                                    // This will output the barcode as HTML output to display in the browser
                                                                    // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                                    // echo $generator->getBarcode($code, $generator::TYPE_CODE_128);
                                                                    // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '">';
                                                                    //$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                                   // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';

                                                                    ?>

                                                                    
                                                                    <svg class = "barcode<?php echo $i?>"></svg>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <span class ="qrcode<?php echo $i;?>">

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
                                                        <button id="foo<?php echo $i ?>" class="btn btn-info">
                                                            Download
                                                        </button>
                                                        <button onclick="printDiv('my-node<?php echo $i ?>')" class="btn btn-danger">
                                                            Print
                                                        </button>

                                                        <script>
                                                            var node = document.getElementById('my-node<?php echo $i ?>');
                                                            var btn = document.getElementById('foo<?php echo $i ?>');
                                                            btn.onclick = function() {
                                                                // node.innerHTML = "I'm an image now."
                                                                domtoimage.toBlob(document.getElementById('my-node<?php echo $i ?>')).then(function(blob) {
                                                                    window.saveAs(blob, '<?php echo $parts[0]->part_number; ?>.png');
                                                                });
                                                            }

                                                            // $qr_code_data = $po->part_number." ".$po->part_qty." ".$po->created_time." ".$po->part_description." ".$po->vendor_code;

                                                            var qrData = 'Part no : <?php echo $po->part_number;?>' + "\n" +  'Quantity : <?php echo $po->part_qty;?>' + "\n" + 'Date : <?php echo $po->created_time;?>'+ "\n" + 'Part Description :<?php echo $po->part_description;?>' + "\n" + 'Vendor Code : <?php echo $po->vendor_code;?>'+ "\n" + 'Batch Code : <?php echo $po->batch_code;?>'; 


                                                            //  this is for generation of qr code
                                                            var qrcode = new QRCode(document.querySelector(".qrcode<?php echo $i;?>"), {
                                                                text: qrData,
                                                                width: 128,
                                                                height: 128,
                                                                colorDark : "black",
                                                                colorLight : "#ffffff",
                                                                correctLevel : QRCode.CorrectLevel.H
                                                            });
                                                            
                                                            JsBarcode(".barcode<?php echo $i;?>",<?php echo $code;?> , {
                                                               
                                                                lineColor: "black",
                                                                height:40,
                                                                displayValue: false
                                                            });





                                                        </script>












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