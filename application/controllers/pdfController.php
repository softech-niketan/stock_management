<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/karachi');

    // $this->oj_user_name = $this->session->userdata('oj_user_name');
    // $this->oj_id =$this->session->userdata('oj_id');
    // $this->cart_total = $this->Common_admin_model->get_sum_column("cart_items","toal_amount","customer_id",$this->oj_id);

    // $this->user_details = $this->Common_admin_model->get_data_by_id("users",$this->oj_id,"id");
    // $this->cart_items= $this->Common_admin_model->full_puter_join($this->oj_id);
    $this->current_date = date('Y-m-d');
    $this->current_time = date('h:i:A');
    // $this->orders_users = $this->Common_admin_model->get_data_by_id("orders",$this->oj_id,"customer_id");

  }

  public function generate_invoice()
  {
    $new_po_id = $this->uri->segment('2');

    $client_data = $this->Crud->read_data("client");

    $new_po_data = $this->Crud->get_data_by_id("new_po", $new_po_id, "id");
    // print_r($new_po_data);
    // echo "<br>";
    $supplier_data = $this->Crud->get_data_by_id("supplier", $new_po_data[0]->supplier_id, "id");
    // print_r($supplier_data);
    // echo "<br>";
    $po_parts_data = $this->Crud->get_data_by_id("po_parts", $new_po_data[0]->id, "po_id");
    // print_r($po_parts_data);
    // echo "<br>";
    $parts_html = "";
    $final_total = 0;
    $cgst_amount = 0;
    $sgst_amount = 0;
    $igst_amount = 0;

    $i = 1;
    foreach ($po_parts_data as $p) {
      $part_data_new = $this->Crud->get_data_by_id("child_part_master", $p->part_id, "id");
      $uom_data = $this->Crud->get_data_by_id("uom", $p->uom_id, "id");
      $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
      $part_data_new2 = $this->Crud->get_data_by_id("child_part", $part_data_new[0]->part_number, "part_number");
      $supplier_data = $this->Crud->get_data_by_id("supplier", $part_data_new[0]->supplier_id, "id");
      $payment_terms = "";
      if ($supplier_data) {
        $payment_terms = $supplier_data[0]->payment_terms;
      }

      if ($part_data_new2) {
        $hsn_code = $part_data_new2[0]->hsn_code;
      } else {
        $hsn_code = "";
      }



      if ((int)$gst_structure_data[0]->igst === 0) {
        $gst = (int)$gst_structure_data[0]->cgst + (int)$gst_structure_data[0]->sgst;
        $cgst = (int)$gst_structure_data[0]->cgst;
        $sgst = (int)$gst_structure_data[0]->sgst;
        $igst = 0;
      } else {
        $gst = (int)$gst_structure_data[0]->igst;
        $cgst = 0;
        $sgst = 0;
        $igst = $gst;
      }


      $gst_amount = ($gst * $part_data_new[0]->part_rate) / 100;
      $final_amount = $gst_amount + $part_data_new[0]->part_rate;
      $final_row_amount = $final_amount * $p->qty;

      // $final_total = $final_total + $final_row_amount;
      $total_amount = $p->qty * $part_data_new[0]->part_rate;
      $final_total = $final_total + $total_amount;

      $cgst_amount = $cgst_amount + (($total_amount * $cgst) / 100);
      $sgst_amount = $sgst_amount + (($total_amount * $sgst) / 100);
      $igst_amount = $igst_amount + (($total_amount * $igst) / 100);



      $parts_html .= '
      <tr>
          <td>' . $i . '</td>
          <td>' . $part_data_new[0]->part_number . ' / ' . $part_data_new[0]->part_description . '</td>
          <td>' .  $hsn_code . '</td>
          <td>' . $part_data_new[0]->part_rate . '</td>
          <td>' . $p->qty . '</td>
          <td>' . $uom_data[0]->uom_name . '</td>
          <td>' . $cgst . '</td>
          <td>' . $sgst . '</td>
          <td>' . $igst . '</td>
          <td>' . number_format((float)$total_amount, 2, '.', '') . '</td>
      
      </tr>
      ';
      $i++;
    }


    $final_final_amount = $final_total + $cgst_amount + $sgst_amount + $igst_amount;


    //     <tr>
    // <th>
    //     </th>
    // </tr>
    // <th colspan="10">    <img width="95px" height="120px"   src="tulasi.jpg" alt="cart-image">


    $html_content = '
       
      


          <table border="1px">

          <tr>
              <th colspan="9" style="text-align:center">Purchase Order</th>
              <th></th>
          </tr>
          <tr>
          <td colspan="3">To,</td>
          <td colspan="6">PO NO.:- ' . $new_po_data[0]->po_number . '</td>
          <td></td>
          </tr>
          <tr>
          <td colspan="6">
          ' . $supplier_data[0]->supplier_name . ' <br>
          ' . $supplier_data[0]->location . ' <br>
          GSTIN- ' . $supplier_data[0]->gst_number . ' <br>
          TELEPHONE No:  ' . $supplier_data[0]->mobile_no . ' <br></td>
          <td colspan="3">Date : ' . $new_po_data[0]->po_date . '</td>
          <td></td>
          </tr>
          <tr>
          <td colspan="6">Billing Address:<br>
          ' . $client_data[0]->billing_address . '
          GSTIN-' . $client_data[0]->gst_number . '
          Mob No: ' . $client_data[0]->phone_no . '
          </td>
          <td  colspan="3">Shipping Address: <br>
          ' . $client_data[0]->shifting_address . ' 
          </td>
          <th></th>
          </tr>
          <tr>
                <th>Sr No</th>
                <th>Description Of Goods </th>
                <th>HSN Code </th>
                <th>Rate/Unit  </th>
                <th>QTY </th>
                <th>UOM </th>
                <th>CGST % </th>
                <th>SGST % </th>
                <th>IGST % </th>
                <th>Total Amount (Rs)</th>
          </tr>
            ' . $parts_html . '

            <tr>
              <th colspan="9" style="text-align:right">Subtotal </th>
              <th>'  . number_format((float)$final_total, 2, '.', '') . '</th>
            </tr>
            <tr>
              <th colspan="9" style="text-align:right">CGST </th>
              <th>' .  number_format((float)$cgst_amount, 2, '.', '') . '</th>
            </tr>
            <tr>
              <th colspan="9" style="text-align:right">SGST </th>
              <th>'  . number_format((float)$sgst_amount, 2, '.', '') . '</th>
            </tr>
            <tr>
              <th colspan="9" style="text-align:right">IGST </th>
              <th>' .  number_format((float)$igst_amount, 2, '.', '') . '</th>
            </tr>
            
            <tr>
              <th colspan="9" style="text-align:right">Grand Total (Rs) </th>
              <th>' . number_format((float)$final_final_amount, 2, '.', '') . '</th>
            </tr>


            <tr>
              <td colspan="10"><b>Note :</b>  PDIR & MTC Required with each lot. Pls mention PO No. on Invoice. <br>

              <b> G. S. T.: </b> GST Extra. <br>
              <b> Delivery :</b>   Door Delivery. <br>
              
              <b> Validity :</b>  30 Days from date of purchase order <br>
              
              <b> Payment Terms : </b> ' . $payment_terms . ' <br> 
              <h4 style="text-align: right;margin-right:10px"> For, BSP METATECH  </h4> 
              <h6 style="text-align: right">  </h6>
              <h6 style="text-align: right">  </h6>
              <h6 style="text-align: right">  </h6>
              <h6 style="text-align: right">  </h6>
              <h6 style="text-align: right">  </h6>
              <h4 style="text-align: right;margin-right:25px"> Authorized Signature </h4>

            
            
            </td>

          </tr>
          
          </table>

       ';



    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream("PO-Order.pdf", array("Attachment" => 1));
  }
  public function generate_job_card()
  {
    $job_card_id = $this->uri->segment('2');
    $job_card = $this->Crud->get_data_by_id("job_card", $job_card_id, "id");
    $customer_part_data = $this->Crud->get_data_by_id("customer_part", $job_card[0]->customer_part_id, "id");
    $customer_part_operation = $this->Crud->get_data_by_id("customer_part_operation", $job_card[0]->customer_part_id, "customer_master_id");
    $customer_part_operation_data = $this->Crud->get_data_by_id("customer_part_operation_data", $customer_part_operation[0]->id, "customer_part_operation_id");
    $uom = $this->Crud->get_data_by_id("uom", $customer_part_data[0]->uom, "id");
    $customer_data = $this->Crud->get_data_by_id("customer", $customer_part_data[0]->customer_id, "id");
    $bom_data = $this->Crud->get_data_by_id("bom", $job_card[0]->customer_part_id, "customer_part_id");

    $table1 = '';
    $table2 = '';


    if ($bom_data) {
      $i = 1;
      foreach ($bom_data as $b) {
        if (true) {
          $child_part_data = $this->Crud->get_data_by_id("child_part", $b->child_part_id, "id");

          $table2 .= '
          <tr>
            <td>' . $i . '</td>
            <td>' . $child_part_data[0]->part_number . '</td>
            <td>' . $child_part_data[0]->part_description . '</td>
            <td>' . "" . '</td>

            <td>' . $b->quantity . '</td>
            <td>' . $job_card[0]->req_qty * $b->quantity . '</td>
            <td>' . $customer_part_data[0]->uom . '</td>
            <td></td>
            <td></td>



          </tr>';
          $i++;
        }
      }
    }

    if ($customer_part_operation) {
      $i = 1;

      // foreach ($customer_part_operation as $bb) {

      $customer_part_operation_data = $this->Crud->get_data_by_id("customer_part_operation_data", $customer_part_operation[0]->id, "customer_part_operation_id");

      if ($customer_part_operation_data) {

        // $customer_part_operation = $this->Crud->get_data_by_id("customer_part_operation", $customer_part_operation_data[0]->customer_part_operation_id, "id");
        // $operations = $this->Crud->get_data_by_id("operations", $customer_part_operation_data[0]->operation_id, "id");
        // $data['toolList'] = $this->Crud->get_data_by_id("tools", "insert", "type");
        foreach ($customer_part_operation_data as $b) {

          $customer_part_operation = $this->Crud->get_data_by_id("customer_part_operation", $b->customer_part_operation_id, "id");
          $operations = $this->Crud->get_data_by_id("operations", $customer_part_operation[0]->operation_id, "id");
          // $data['toolList'] = $this->Crud->get_data_by_id("tools", "insert", "type");



          $table1 .= '
              <tr>

                  <td>' . $i . '</td>
                  <td>' . $b->product . '</td>
                  <td>' . $b->process . '</td>
                  <td>' . $b->specification_tolerance . '</td>
                  <td>' . $b->evalution . '</td>
                  <td>' . $b->size . '</td>
                  <td>' . $b->frequency . '</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  </tr>





      ' .


            $i++;
        }
      }
    }



    $html_content = '
   <style>

   table{
     width: 100%;
   }
   table, th, td {
    border: 1px solid black;
  }

  td {
    text-align: center;
  }

  th {
    text-align: center;
  }
  
  
  </style>
<table cellspacing="0">
    <tr>
        <td rowspan="3" colspan="2"><img width="95px" height="120px"   src="tulasi.jpg" alt="cart-image"></td>
        <td rowspan="3" colspan="3">
        <h2>JOB CARD</h2>
        </td>
        <td>Job Card No</td>
        <td>TH/HOSE</td>
       <td></td>
       <td></td>
       
    
        <td>Doc No.</td>
        <td>TUH/QA/002</td>
       
    </tr>
    <tr>
        <td>Issue Date</td>

        <td></td>
        <td>Completion Date</td>

        <td style=""></td>
       
        <td>Rev No</td>
        <td>01</td>
    </tr>
    <tr>
        <td>Lot Qty</td>

        <td>' . $job_card[0]->req_qty . '</td>
        <td>UOM</td>

        <td>' . $customer_part_data[0]->uom . '</td>
       
        <td>Rev Date</td>
        <td>14/09/2021</td>
    </tr>
    <tr>
        <td>Customer</td>
        <td>' . $customer_data[0]->customer_name . '</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Lead Time</td>
        <td></td>
        <td></td>
      
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Part NO</td>
        <td>' . $customer_part_data[0]->part_number . '</td>
        <td></td>
        <td></td>
        <td></td>
        <td>P.O. NO</td>
        <td></td>
       
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Rev No</td>
        <td>' . $customer_part_data[0]->part_number . '</td>
        <td></td>
        <td></td>
        <td></td>
        <td>P.O. Date</td>
        <td></td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
  <h3 style="text-align: center">Bill Of Material </h3>
    <table cellspacing="0">
    
<tr >
 
    <th>Sr. No.</th>
    <th>Item Number</th>
    <th>Item Description</th>
    <th>Store Location</th>
    <th>BOM Qty</th>
    <th>REQ Qty</th>
    <th>UOM</th>
    <th>GRN NO </th>
    <th>HOSE Make/Mfg.Date </th>
    </tr>
   
    </tr>
    
    ' . $table2 . '
          
    
    
    </table>
    <br>



    <table cellspacing="0">

    
   
    <tr >
        <th colspan="3">Characteristics</th>
        <th rowspan="2" >Product Specification / Tolerance</th>
        <th rowspan="2" >Evaluation / Measurement Techn</th>
        <th rowspan="2" >Size</th>
        <th rowspan="2" >Frequency</th>
        <th colspan="2" >Set Up Approval</th>
        <th colspan="4" >In Process Observation</th>
        <th >Last Price</th>
        <th >Qty</th>
        <th >Qty</th>
        <th rowspan="2" >Remark</th>
    </tr>
    <tr >
        <th>Sr. No.</th>
        <th>Product</th>
        <th>Process</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>Prod</th>
        <th>Acc</th>
        


    </tr>
    

 
    ' . $table1 . '

    </table>
    
    
    ';



    // print_r($html_content);
    $this->pdf->set_paper('A4', 'landscape');

    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream("Job_card.pdf", array("Attachment" => 1));
  }
}
