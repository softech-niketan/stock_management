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
    $this->current_time = date('h:i:s');
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

    foreach ($po_parts_data as $p) {
      $part_data_new = $this->Crud->get_data_by_id("child_part_master", $p->part_id, "id");
      $uom_data = $this->Crud->get_data_by_id("uom", $p->uom_id, "id");
      $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");

      $i = 1;

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
          <td>' . $part_data_new[0]->hsn_code . '</td>
          <td>' . $part_data_new[0]->part_rate . '</td>
          <td>' . $p->qty . '</td>
          <td>' . $uom_data[0]->uom_name . '</td>
          <td>' . $cgst . '</td>
          <td>' . $sgst . '</td>
          <td>' . $igst . '</td>
          <td>' . $total_amount . '</td>
      
      </tr>
      ';
      $i++;
    }


    $final_final_amount = $final_total + $cgst_amount + $sgst_amount + $igst_amount;




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
<td colspan="7">
' . $supplier_data[0]->supplier_name . ' <br>
GSTIN- ' . $supplier_data[0]->gst_number . ' <br>
TELEPHONE No:  ' . $supplier_data[0]->mobile_no . ' <br></td>
<td colspan="2">Date : ' . $new_po_data[0]->po_date . '</td>
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
      <th>CSGT % </th>
      <th>SSGT % </th>
      <th>IGST % </th>
      <th>Total Amount</th>
</tr>
  ' . $parts_html . '

  <tr>
    <th colspan="9" style="text-align:right">Subtotal </th>
    <th>' . $final_total . '</th>
  </tr>
  <tr>
    <th colspan="9" style="text-align:right">CGST </th>
    <th>' . $cgst_amount . '</th>
  </tr>
  <tr>
    <th colspan="9" style="text-align:right">SGST </th>
    <th>' . $sgst_amount . '</th>
  </tr>
  <tr>
    <th colspan="9" style="text-align:right">IGST </th>
    <th>' . $igst_amount . '</th>
  </tr>
  
  <tr>
    <th colspan="9" style="text-align:right">Grand Total </th>
    <th>' . $final_final_amount . '</th>
  </tr>


  <tr>
    <td colspan="10"><b>Note :</b>  PDIR & MTC Required with each lot. Pls mention PO No. on Invoice. <br>

    <b> G. S. T.: </b> GST Extra. <br>
    <b> Delivery :</b>   Door Delivery. <br>
    
    <b> Validity :</b>  30 Days from date of purchase order <br>
    
    <b> Payment Terms : </b> as applicable <br> 

   
   
  </td>

</tr>
 
</table>

       ';



    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream("PO-Order.pdf", array("Attachment" => 1));
  }
}
