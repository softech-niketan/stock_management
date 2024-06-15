<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newcontroller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Kolkata');

		$this->user_name = $this->session->userdata('user_name');
		$this->user_id = $this->session->userdata('user_id');
		$this->current_date = date('Y-m-d');
		$this->current_time = date('h:i:A');


		$d = date_parse_from_format("Y-m-d", $this->current_date);
		$this->date = $d["day"];
		$this->month = $d["month"];
		$this->year = $d["year"];
	}

	public function generate_new_po()
	{
		$supplier_id = $this->input->post('supplier_id');
		$po_date = $this->input->post('po_date');
		$expiry_po_date = $this->input->post('expiry_po_date');
		$remark = $this->input->post('remark');

		$data['new_po'] = $this->Crud->read_data("new_po");

		// if ($data['new_po']) {
		// 	$count = count($data['new_po']) + 1;
		// } else {
		// 	$count = 0;
		// }

		$count = $this->Crud->read_data_num("new_po") + 1;



		$po_number = "TH/PUR/" . $this->year . "-22/0000" . $count;

		$data = array(
			"supplier_id" => $supplier_id,
			"po_number" => $po_number,
			"po_date" => $po_date,
			"expiry_po_date" => $expiry_po_date,
			"remark" => $remark,
			"created_by" => $this->user_id,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
			"created_by" => $this->current_date,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year" => $this->year,
		);


		$result = $this->Crud->insert_data("new_po", $data);
		if ($result) {
			echo "<script>alert('Successfully Added');document.location='" . base_url('view_new_po_by_id/') . $result . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	//view

	public function view_new_po_by_id()
	{
		$new_po_id = $this->uri->segment('2');

		$data['new_po'] = $this->Crud->get_data_by_id("new_po", $new_po_id, "id");
		$data['supplier'] = $this->Crud->get_data_by_id("supplier", $data['new_po'][0]->supplier_id, "id");
		$data['gst_structure'] = $this->Crud->read_data("gst_structure");
		$data['uom'] = $this->Crud->read_data("uom");


		$arr = array(
			'supplier_id' => $data['supplier'][0]->id,
		);
		// $data['child_part'] = $this->Crud->get_data_by_id_multiple("child_part", $arr);

		$data['po_parts'] = $this->Crud->get_data_by_id("po_parts", $new_po_id, "po_id");

		$child_part_list = $this->db->query('SELECT DISTINCT part_number,supplier_id FROM `child_part_master` where supplier_id = ' . $data['supplier'][0]->id . '');
		$data['child_part'] = $child_part_list->result();


		$this->load->view('header');
		$this->load->view('view_new_po_by_id', $data);
		$this->load->view('footer');
	}
	public function view_po_by_supplier_id()
	{
		$supplier_id = $this->uri->segment('2');

		$data['supplier_data'] = $this->Crud->get_data_by_id("supplier", $supplier_id, "id");
		$data['new_po'] = $this->Crud->get_data_by_id("new_po", $supplier_id, "supplier_id");


		$this->load->view('header');
		$this->load->view('view_po_by_supplier_id', $data);
		$this->load->view('footer');
	}
	public function pending_po()
	{
		// $supplier_id = $this->uri->segment('2');

		// $data['supplier_data'] = $this->Crud->get_data_by_id("supplier", $supplier_id, "id");
		$data['new_po'] = $this->Crud->get_data_by_id("new_po", "pending", "status");


		$this->load->view('header');
		$this->load->view('pending_po', $data);
		$this->load->view('footer');
	}
	public function new_po_list_supplier()
	{
		$new_po_id = $this->uri->segment('2');

		// $data['new_po'] = $this->Crud->get_data_by_id("new_po", $new_po_id, "id");
		// $data['supplier'] = $this->Crud->get_data_by_id("supplier", $data['new_po'][0]->supplier_id, "id");
		// $data['gst_structure'] = $this->Crud->read_data("gst_structure");
		// $data['uom'] = $this->Crud->read_data("supplier");

		$data['supplier_list'] = $this->Crud->read_data("supplier");
		// $arr = array(
		//     'supplier_id' => $data['supplier'][0]->id,);
		// $data['child_part'] = $this->Crud->get_data_by_id_multiple("child_part", $arr);

		// $data['po_parts'] = $this->Crud->get_data_by_id("po_parts", $new_po_id, "po_id");



		$this->load->view('header');
		$this->load->view('new_po_list_supplier', $data);
		$this->load->view('footer');
	}


	//update

	public function update_po_parts()
	{
		$id = $this->input->post('id');

		$uom_id = $this->input->post('uom_id');
		$delivery_date = $this->input->post('delivery_date');
		$qty = $this->input->post('qty');
		$tax_id = $this->input->post('tax_id');

		// $data = array(
		// 	"contractor_code" => $number,
		// );
		// $check = $this->Crud->read_data_where("contractor", $data);
		// if ($check != 0) {
		// 	echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// } else {
		$data = array(
			"tax_id" => $tax_id,
			"uom_id" => $uom_id,
			"delivery_date" => $delivery_date,
			"qty" => $qty,
			"pending_qty" => $qty,
		);
		$result = $this->Crud->update_data("po_parts", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error 410 :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
		//}
	}
	public function update_drawing()
	{
		$id = $this->input->post('id');

		$type = $this->input->post('type');

		if (!empty($_FILES['file']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['file']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
				$uploadData = $this->upload->data();
				$drawing = $uploadData['file_name'];
			} else {
				$drawing = '';
				echo "no 1";
			}
		} else {
			$drawing = '';
			echo "no 2";
		}

		// );
		// $check = $this->Crud->read_data_where("contractor", $data);
		// if ($check != 0) {
		// 	echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// } else {
		$data = array(

			$type => $drawing,
		);
		$result = $this->Crud->update_data("customer_part_drawing", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error 410 :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
		//}
	}
	public function validate_invoice_amount()
	{
		$inwarding_id = $this->input->post('inwarding_id');
		$invoice_amount = $this->input->post('invoice_amount');
		$status = $this->input->post('status');
		$actual_price = $this->input->post('actual_price');
		$plus_price = $this->input->post('plus_price');
		$minus_price = $this->input->post('minus_price');



		$msg = "";

		if (true) {

			if ($invoice_amount >= $minus_price) {
				if ($invoice_amount <= $plus_price) {
					$msg = "<script>alert('Updated Sucessfully....');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					$msg = "<script>alert('Invoice Amount Does Not Match, Please Try Again.');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				$msg = "<script>alert('Invoice Amount Does Not Match, Please Try Again..');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			$msg = "<script>alert('Invoice Amount Does Not Match, Please Try Again...');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}


		$data = array(
			"invoice_amount" => $invoice_amount,
			"status" => $status,

		);
		$result = $this->Crud->update_data("inwarding", $data, $inwarding_id);
		if ($result) {
			echo $msg;
		} else {
			echo "<script>alert('Error 410 :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
		//}
	}
	public function accept_inwarding_data()
	{
		$inwarding_id = $this->input->post('inwarding_id');
		$invoice_number = $this->input->post('invoice_number');

		$arr = array(
			'id' => $inwarding_id,


		);
		$inwarding_data = $this->Crud->get_data_by_id_multiple("inwarding", $arr);

		$arr2 = array(
			'inwarding_id' => $inwarding_id,
			'invoice_number' => $invoice_number,

		);
		$grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr2);


		if ($grn_details_data) {

			foreach ($grn_details_data as $g) {
				$part_id = $g->part_id;
				$qty = $g->accept_qty;
				$po_number = $g->po_number;
				$invoice_number = $g->invoice_number;
				$po_part_id = $g->po_part_id;

				$po_parts_data = $this->Crud->get_data_by_id("po_parts", $po_part_id, "id");
				$child_part_data = $this->Crud->get_data_by_id("child_part", $part_id, "id");
				$po_parts_qty = $po_parts_data[0]->pending_qty;
				$pending_qty = $po_parts_qty - $qty;
				// $data_update = array(

				// 	"pending_qty" => $pending_qty,

				// );
				// $result = $this->Crud->update_data("po_parts", $data_update, $po_part_id);

				if (true) {
					$exsisting_stock = $child_part_data[0]->stock;
					$new_stock = $exsisting_stock + $qty;
					$data_update_child_part = array(

						"stock" => $new_stock,

					);

					// print_r($data_update_child_part);
					// echo "<br>";

					$result = $this->Crud->update_data("child_part_master", $data_update_child_part, $part_id);
				} else {
					echo "update error po_parts";
					echo "<br>";
				}
			}

			if ($result) {

				$data_update_inwarding = array(

					"status" => "accept",

				);
				$result2 = $this->Crud->update_data("inwarding", $data_update_inwarding, $inwarding_id);
				if ($result2) {
					echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					echo "<script>alert('Error 410 :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				echo "<script>alert('Error 410 :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			// echo "grn_details table data not found";
			echo "<script>alert('Error 410 :  Not Updated, No  Inwadring  Found ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}





		//}
	}
	public function accept_po()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');


		// } else {
		$data = array(
			"status" => $status,

		);
		$result = $this->Crud->update_data("new_po", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error 410 :  Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
		//}
	}


	// add new
	public function add_po_parts()
	{
		$supplier_id = $this->input->post('supplier_id');
		$po_date = $this->input->post('po_date');
		$po_id = $this->input->post('po_id');
		$po_number = $this->input->post('po_number');
		$part_id = $this->input->post('part_id');
		$invoice_number = $this->input->post('invoice_number');


		$child_part_data = $this->Crud->get_data_by_id("child_part_master", $part_id, "id");

		// print_r($child_part_data);




		$data = array(
			"part_id" => $part_id,
			"po_number" => $po_number,
		);
		// print_r($data);
		$check = $this->Crud->read_data_where("po_parts", $data);
		if ($check) {
			echo "<script>alert('Error 403 : Part  Already Exists To This PO Number , Enter Different Part ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {


			$data = array(
				"po_id" => $po_id,
				"po_number" => $po_number,
				"supplier_id" => $supplier_id,
				"part_id" => $part_id,
				"tax_id" => $this->input->post('tax_id'),
				"uom_id" => $child_part_data[0]->uom_id,
				"delivery_date" => $this->input->post('delivery_date'),
				"expiry_date" => $this->input->post('expiry_date'),
				"qty" => $this->input->post('qty'),
				"pending_qty" => $this->input->post('qty'),
				"invoice_number" => $this->input->post('invoice_number'),
				"created_by" => $this->user_id,
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,
				"created_day" => $this->date,
				"created_month" => $this->month,
				"created_year" => $this->year,
			);


			$result = $this->Crud->insert_data("po_parts", $data);
			if ($result) {
				echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unab le to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_planning_data()
	{
		$customer_part_id = $this->input->post('customer_part_id');
		$month_id = $this->input->post('month_id');
		$schedule_qty = $this->input->post('schedule_qty');
		$financial_year = $this->input->post('financial_year');

		$data = array(

			"financial_year" => $financial_year,
			"month" => $month_id,
			"customer_part_id" => $customer_part_id,
			"shortage_qty" => $this->date,

		);


		$result_data_main = $this->Crud->insert_data("planing", $data);


		$arr = array(
			'customer_part_id' => $customer_part_id,


		);
		$bom_data = $this->Crud->get_data_by_id_multiple("bom", $arr);



		if ($bom_data) {
			foreach ($bom_data as $b) {
				$child_part_data = $this->Crud->get_data_by_id("child_part", $b->child_part_id, "id");
				$actual_stock = $child_part_data[0]->stock;

				$bom_qty = $b->quantity;

				$required_qty = $schedule_qty * $bom_qty;

				$shortage_qty = $required_qty - $actual_stock;


				$data = array(

					"planing_id" => $result_data_main,
					"child_part_id" => $b->child_part_id,
					"bom_qty" => $bom_qty,
					"schedule_qty" => $schedule_qty,
					"required_qty" => $required_qty,
					"shortage_qty" => $shortage_qty,
					"actual_stock" => $actual_stock,
				);


				$result = $this->Crud->insert_data("planing_data", $data);
			}
		} else {
		}








		if ($result) {
			echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_grn_qty()
	{
		$inwarding_id = $this->input->post('inwarding_id');
		$po_number = $this->input->post('new_po_id');
		$grn_number = $this->input->post('grn_number');
		$invoice_number = $this->input->post('invoice_number');
		$part_id = $this->input->post('part_id');
		$qty = $this->input->post('qty');
		$po_part_id = $this->input->post('po_part_id');
		$part_rate = $this->input->post('part_rate');
		$tax_id = $this->input->post('tax_id');
		$pending_qty = $this->input->post('pending_qty');


		$inwarding_price = $part_rate * $qty;

		$gst_structure = $this->Crud->get_data_by_id("gst_structure", $tax_id, "id");

		$cgst_amount = ($inwarding_price * $gst_structure[0]->cgst) / 100;
		$sgst_amount = ($inwarding_price * $gst_structure[0]->sgst) / 100;
		$igst_amount = ($inwarding_price * $gst_structure[0]->igst) / 100;



		$inwarding_price = $inwarding_price + $cgst_amount + $sgst_amount + $igst_amount;


		$data = array(
			"inwarding_id" => $inwarding_id,
			"po_number" => $po_number,
			"grn_number" => $grn_number,
			"invoice_number" => $invoice_number,
			"part_id" => $part_id,
			"qty" => $qty,
			"po_part_id" => $po_part_id,
			"inwarding_price" => $inwarding_price,
			"created_by" => $this->user_id,
			"created_date" => $this->current_date,
			"created_time" => $this->current_time,
			"created_day" => $this->date,
			"created_month" => $this->month,
			"created_year" => $this->year,
		);
		$result = $this->Crud->insert_data("grn_details", $data);
		if ($result) {
			$pending_qty =
				$data = array(
					"pending_qty" => $pending_qty - $qty,


				);
			$result = $this->Crud->update_data("po_parts", $data, $po_part_id);
			echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_grn_qty()
	{
		$verified_qty = $this->input->post('verified_qty');
		$privious_qty = $this->input->post('privious_qty');
		$grn_details_id = $this->input->post('grn_details_id');

		$tax_id = $this->input->post('tax_id');
		$part_rate = $this->input->post('part_rate');


		$inwarding_price = $part_rate * $verified_qty;

		$gst_structure = $this->Crud->get_data_by_id("gst_structure", $tax_id, "id");

		$cgst_amount = ($inwarding_price * $gst_structure[0]->cgst) / 100;
		$sgst_amount = ($inwarding_price * $gst_structure[0]->sgst) / 100;
		$igst_amount = ($inwarding_price * $gst_structure[0]->igst) / 100;



		$inwarding_price = $inwarding_price + $cgst_amount + $sgst_amount + $igst_amount;

		if ($verified_qty == $privious_qty) {
			$verified_status = "verified";
		} else {
			$verified_status = "not-verified";
		}
		$data = array(
			"verified_qty" => $verified_qty,
			"verfified_price" => $inwarding_price,
			"verified_status" => $verified_status,

		);
		$result = $this->Crud->update_data("grn_details", $data, $grn_details_id);

		if ($result) {
			echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_grn_qty_accept_reject()
	{
		$accept_qty = $this->input->post('accept_qty');
		// $reject_qty = $this->input->post('reject_qty');
		$grn_details_id = $this->input->post('grn_details_id');
		$verified_qty = $this->input->post('verified_qty');
		$remark = $this->input->post('remark');
		$part_id = $this->input->post('part_id');

		$reject_qty = $verified_qty - $accept_qty;


		$child_part_master_data = $this->Crud->get_data_by_id("child_part_master", $part_id, "id");

		$prev_stock = $child_part_master_data[0]->stock;
		$new_stock = $prev_stock + $accept_qty;
		$data = array(
			"accept_qty" => $accept_qty,
			"reject_qty" => $reject_qty,
			"remark" => $remark,


		);

		$result = $this->Crud->update_data("grn_details", $data, $grn_details_id);

		if ($result) {
			$data22 = array(
				"stock" => $new_stock,


			);

			$result22 = $this->Crud->update_data("child_part_master", $data22, $part_id);
			if ($result22) {
				echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add2');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_status_grn_inwarding()
	{
		$inwarding_id = $this->input->post('inwarding_id');
		$status = $this->input->post('status');




		$data = array(
			"status" => $status,


		);
		$result = $this->Crud->update_data("inwarding", $data, $inwarding_id);

		if ($result) {
			echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	// add new
	public function add_invoice_number()
	{
		$invoice_number = $this->input->post('invoice_number');
		$invoice_date = $this->input->post('invoice_date');
		$po_id = $this->input->post('new_po_id');
		$grn_date = $this->input->post('grn_date');


		$data = array(
			"created_month" => $this->month,
			"created_year" => $this->year,
		);
		$inwarding_data = $this->Crud->read_data_where("inwarding", $data);

		// print_r($inwarding_data);
		// $inwarding_data = $this->Crud->read_data("inwarding");



		// echo count($inwarding_data);


		$data = array(
			"invoice_number" => $invoice_number,
			// "po_id" => $po_id,
		);
		$check = $this->Crud->read_data_where("inwarding", $data);
		if ($check != 0) {
			echo "<script>alert('Error 403 : Invoice Number  Already Exists , Enter Different Invoice Number ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if ($inwarding_data) {
				$inwarding_count = $inwarding_data + 1;
			} else {
				$inwarding_count = 1;
			}
			$grn_number = $this->year . "-22" . "/000" . $inwarding_count;

			$data = array(
				"invoice_number" => $invoice_number,
				"po_id" => $po_id,
				"invoice_date" => $invoice_date,
				"grn_date" => $grn_date,
				"grn_number" => $grn_number,
				"created_date" => $this->current_date,
				"created_month" => $this->month,
				"created_day" => $this->date,
				"created_year" => $this->year,
				"status" => "pending",

			);


			$result = $this->Crud->insert_data("inwarding", $data);
			if ($result) {
				echo "<script>alert('Successfully Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
}
