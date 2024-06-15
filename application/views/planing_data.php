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
                        <h1>Planing Data </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add Planing</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Planing</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('add_planning_data') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Select Customer Part Number / Description  </label><span class="text-danger">*</span>
                                                                <select name="customer_part_id" id="" class="form-control select2">
                                                                    <?php 
                                                                    if($customer_part)
                                                                    {
                                                                        foreach($customer_part as $c )
                                                                        {

                                                                            ?>
                                                                            <option value="<?php echo $c->id; ?>"><?php echo $c->part_number." /".$c->part_description; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Select Month  </label><span class="text-danger">*</span>
                                                                <select name="month_id" id="" class="form-control select2">
                                                                <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                                                        <!-- <option value="MAY">MAY</option>
                                                                        <option value="JUN">JUN</option>
                                                                        <option value="JUL">JUL</option>
                                                                        <option value="AUG">AUG</option>
                                                                        <option value="SEP">SEP</option>
                                                                        <option value="OCT">OCT</option>
                                                                        <option value="NOV">NOV</option>
                                                                        <option value="DEC">DEC</option>
                                                                        <option value="JAN">JAN</option>
                                                                        <option value="FEB">FEB</option> -->
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Enter Schedule Qty  </label><span class="text-danger">*</span>
                                                                <input type="number" required name="schedule_qty" class="form-control">
                                                                <input type="hidden" required name="financial_year" value="<?php echo $financial_year;?>" class="form-control">
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
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <!-- Button trigger modal -->
                                <div class="row">
                                                                    
                                                                    <div class="col-lg-2">
                                                                    <form action="<?php echo base_url('planing_data/'.$financial_year."/".$month."/0"); ?>" method="post">
                                                                        <div class="form-group">
                                                                                <label for="">Select Customer</label>
                                                                                <select name="customer_id" id="" class="form-control select2">
                                                                                        <option value="0">All</option>
                                                                                        <?php 
                                                                                        if($customer)
                                                                                        {
                                                                                            foreach($customer as $c)
                                                                                            {
                                                                                                ?>
                                                                                                    <option <?php if($c->id == $customer_id){ echo "selected";} ?> value="<?php echo $c->id?>"><?php echo $c->customer_name?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        
                                                                                        ?>

                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="financial_year"   value="<?php echo $financial_year;?>">
                                                                            <input type="hidden" name="month"   value="<?php echo $month;?>">
                                                                            <button type="submit" class="btn btn-danger mt-4">Search</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Planing</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('add_planning_data') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Select Customer Part Number / Description  </label><span class="text-danger">*</span>
                                                                <select name="customer_part_id" id="" class="form-control select2">
                                                                    <?php 
                                                                    if($customer_part)
                                                                    {
                                                                        foreach($customer_part as $c )
                                                                        {

                                                                            ?>
                                                                            <option value="<?php echo $c->id; ?>"><?php echo $c->part_number." /".$c->part_description; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Select Month  </label><span class="text-danger">*</span>
                                                                <select name="month_id" id="" class="form-control select2">
                                                                        <option value="<?php echo $month_id; ?>"><?php echo $month_id; ?></option>
                                                                        <!-- <option value="MAY">MAY</option>
                                                                        <option value="JUN">JUN</option>
                                                                        <option value="JUL">JUL</option>
                                                                        <option value="AUG">AUG</option>
                                                                        <option value="SEP">SEP</option>
                                                                        <option value="OCT">OCT</option>
                                                                        <option value="NOV">NOV</option>
                                                                        <option value="DEC">DEC</option>
                                                                        <option value="JAN">JAN</option>
                                                                        <option value="FEB">FEB</option> -->
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Enter Schedule Qty  </label><span class="text-danger">*</span>
                                                                <input type="number" required name="schedule_qty" class="form-control">
                                                                <input type="hidden" required name="financial_year" value="<?php echo $financial_year;?>" class="form-control">
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>Sr. No.</th>
                                            <th>Customer Part Number</th>  
                                            <th>Customer Part Description</th> 
                                            <th>Customer Name</th>  
                                            <th>Month </th>
                                            <th>View Details </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Sr. No.</th>
                                            <th>Customer Part Number</th>  
                                            <th>Customer Part Description</th> 
                                            <th>Customer Name</th>  
                                            <th>Month </th>
                                            <th>View Details </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($planing_data) {
                                            foreach ($planing_data as $t) {

                                                if($month == $t->month)
                                                {

                                                $customer_part_data = $this->Crud->get_data_by_id("customer_part", $t->customer_part_id, "id");
                                                $customers_data = $this->Crud->get_data_by_id("customer", $customer_part_data[0]->customer_id, "id");

                                                if($customer_id == 0)
                                                {

                                               

                                               
                                        ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $customer_part_data[0]->part_number ?></td>
                                                    <td><?php echo $customer_part_data[0]->part_description ?></td>
                                                    <td><?php echo $customers_data[0]->customer_name ?></td>
                                                    <td><?php echo $t->month ?></td>
                                                    <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('view_planing_data/').$t->id?>">View Details</a>    
                                                  </td>
                                                    
                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                            else
                                            {
                                                if($customers_data[0]->id == $customer_id)
                                                {
                                                ?>
                                                 <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $customer_part_data[0]->part_number ?></td>
                                                    <td><?php echo $customer_part_data[0]->part_description ?></td>
                                                    <td><?php echo $customers_data[0]->customer_name ?></td>
                                                    <td><?php echo $t->month ?></td>
                                                    <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('view_planing_data/').$t->id?>">View Details</a>    
                                                  </td>
                                                    
                                                </tr>
                                                <?php
                                                $i++;
                                                }
                                                

                                            }

                                        }
                                    }}
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