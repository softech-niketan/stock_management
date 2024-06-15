<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Kolkata');

		$this->user_name = $this->session->userdata('user_name');
		$this->user_id = $this->session->userdata('user_id');
		$this->current_date = date('Y-m-d');
		$this->current_time = date('h:i:s');


		$d = date_parse_from_format("Y-m-d", $this->current_date);
		$this->date = $d["day"];
		$this->month = $d["month"];
		$this->year = $d["year"];
	}

	public function view_history_operation_parts()
	{
		$part_no = $this->uri->segment('2');
		$operation_id = $this->uri->segment('3');

		$data_old = array(
			'part_id' => $part_no,
			'operation_id' => $operation_id,

		);

		$data['part_operations'] = $this->Common_admin_model->get_data_by_id_multiple_condition("part_operations", $data_old);
		// $data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		// $data['part_creation'] = $this->Common_admin_model->get_data_by_id("part_creation",$part_no,"part_number");
		// print_r(($data['part_operations']));
		// $data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		// $data['groups'] = $this->Common_admin_model->get_all_data("groups");
		// $data['size'] = $this->Common_admin_model->get_all_data("size");
		// $data['operations'] = $this->Common_admin_model->get_all_data("operations");
		// $data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		// $data['part_creation_revision'] = $role_management_data->result();
		// print_r($data['orders']);
		$this->load->view('header.php');
		$this->load->view('view_history_operation_parts.php', $data);

		// part_stocks
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function pdfg()
	{
		// $this->load->library('pdf');
		$html = $this->load->view('GeneratePdfView');
		$this->pdf->createPDF($html, 'mypdf', false);
	}
	public function signin()
	{
		// $data['userInfo'] = $this->Crud->read_data("userInfo");
		$this->form_validation->set_rules('email', ' Email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', ' Password', 'trim|required|min_length[3]');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			redirect('login');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$arr = array(
				'user_email' => $email,
				'user_password' => $password
			);
			$result = $this->Crud->get_data_by_id_multiple("userinfo", $arr);
			if ($result == 0) {
				$data = array(
					'errors' => 'Email and Password Invalid'
				);
				$this->session->set_flashdata($data);
				redirect('login');
			} else {
				if ($result) {

					$user_data = array(
						'user_id' => $result[0]->id,
						'user_email' => $result[0]->user_email,
						'user_login' => true,
						'user_name' => $result[0]->user_name,
						'type' => $result[0]->type
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login', 'success');
					redirect('index');
				} else {
					// $this->session->set_flashdata('logout', 'error');
				}
			}
		}
	}

	public function logout()
	{
		$user_data = array(
			'user_id' => '',
			'user_email' => '',
			'user_login' => '',
			'user_name' => ''
		);
		$this->session->set_userdata($user_data);
		redirect('index');
	}

	public function contractor()
	{
		$data['contractor'] = $this->Crud->read_data("contractor");
		$this->load->view('header');
		$this->load->view('contractor', $data);
		$this->load->view('footer');
	}

	public function consumable()
	{
		$data['part_list'] = $this->Crud->read_data("consumable_item");
		$this->load->view('header');
		$this->load->view('consumable', $data);
		$this->load->view('footer');
	}


	public function hus_number()
	{
		$data['other_data'] = $this->Crud->get_data_by_id("other_data", "hus", "type");
		$this->load->view('header');
		$this->load->view('hus_number', $data);
		$this->load->view('footer');
	}

	public function store()
	{
		$data['store_list'] = $this->Crud->read_data("store");

		$data['supplier_list'] = $this->Crud->read_data("supplier");
		$data['part_list'] = $this->Crud->read_data("consumable_item");
		$this->load->view('header');
		$this->load->view('store', $data);
		$this->load->view('footer');
	}
	public function issue()
	{
		$data['issue_list'] = $this->Crud->read_data("issue");
		$data['part_list'] = $this->Crud->read_data("consumable_item");

		$data['hus1'] = $this->Crud->get_data_by_id("other_data", "hus", "type");


		$data['oc1'] = $this->Crud->get_data_by_id("other_data", "oc", "type");
		$data['wbs1'] = $this->Crud->get_data_by_id("other_data", "wbs", "type");

		$data['contractor_new'] = $this->Crud->read_data("contractor");
		$this->load->view('header');
		$this->load->view('issue', $data);
		$this->load->view('footer');
	}
	public function oc_number()
	{
		$data['other_data'] = $this->Crud->get_data_by_id("other_data", "oc", "type");
		$this->load->view('header');
		$this->load->view('oc_number', $data);
		$this->load->view('footer');
	}
	public function wbs_number()
	{
		$data['other_data'] = $this->Crud->get_data_by_id("other_data", "wbs", "type");
		$this->load->view('header');
		$this->load->view('wbs_number', $data);
		$this->load->view('footer');
	}

	public function supplier()
	{
		$data['supplier_list'] = $this->Crud->read_data("supplier");
		$this->load->view('header');
		$this->load->view('supplier', $data);
		$this->load->view('footer');
	}

	public function po_details()
	{
		$data['customers'] = $this->Crud->read_data("customer");
		$data['po_details']  = $this->Crud->read_data("po_details");
		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['customer_name'] = $this->Crud->get_data_by_id("customer");


		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('po_details', $data);
		$this->load->view('footer');
	}

	public function loading_user()
	{
		$data['customers'] = $this->Crud->read_data("customer");
		$data['po_details']  = $this->Crud->read_data("po_details");

		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['customer_name'] = $this->Crud->get_data_by_id("customer");



		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('loading_user', $data);
		$this->load->view('footer');
	}

	public function dispatch_tracking()
	{
		$data['c_po_so'] = $this->Crud->read_data("c_po_so");
		$data['dispatch_tracking']  = $this->Crud->read_data("dispatch_tracking");
		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['customer_name'] = $this->Crud->get_data_by_id("customer");



		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('dispatch_tracking', $data);
		$this->load->view('footer');
	}
	public function billing_track()
	{
		$data['c_po_so_details'] = $this->Crud->read_data("c_po_so");
		$data['bill_tracking_details']  = $this->Crud->read_data("bill_tracking");
		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['customer_name'] = $this->Crud->get_data_by_id("customer");



		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('billing_track', $data);
		$this->load->view('footer');
	}
	public function billing()
	{
		$data['c_po_so_details'] = $this->Crud->read_data("c_po_so");
		$data['bill_tracking_details']  = $this->Crud->read_data("bill_tracking");
		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['customer_name'] = $this->Crud->get_data_by_id("customer");



		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('billing', $data);
		$this->load->view('footer');
	}

	public function customer()
	{
		$data['customers'] = $this->Crud->read_data("customer");

		$this->load->view('header');
		$this->load->view('customer', $data);
		$this->load->view('footer');
	}
	public function customer_master()
	{
		$data['customers'] = $this->Crud->read_data("customer");

		$this->load->view('header');
		$this->load->view('customer_master', $data);
		$this->load->view('footer');
	}
	public function inwarding()
	{
		$data['customers'] = $this->Crud->read_data("customer");
		$data['new_po'] = $this->Crud->read_data("new_po");

		$this->load->view('header');
		$this->load->view('inwarding', $data);
		$this->load->view('footer');
	}
	public function inwarding_invoice()
	{
		$new_po_id = $this->uri->segment('2');
		$data['new_po_id'] = $this->uri->segment('2');


		$data['inwarding_data'] = $this->Crud->get_data_by_id("inwarding", $new_po_id, "po_id");

		$data['po_parts'] = $this->Crud->get_data_by_id("po_parts", $new_po_id, "po_id");


		$this->load->view('header');
		$this->load->view('inwarding_invoice', $data);
		$this->load->view('footer');
	}
	public function grn_validation()
	{
		$new_po_id = $this->uri->segment('2');
		$data['new_po_id'] = $this->uri->segment('2');


		$data['inwarding_data'] = $this->Crud->get_data_by_id("inwarding", "generate_grn", "status");



		$this->load->view('header');
		$this->load->view('grn_validation', $data);
		$this->load->view('footer');
	}
	public function accept_reject_validation()
	{
		$new_po_id = $this->uri->segment('2');
		$data['new_po_id'] = $this->uri->segment('2');


		$data['inwarding_data'] = $this->Crud->read_data("inwarding");
		// $data['inwarding_data'] = $this->Crud->get_data_by_id("inwarding", "validate_grn", "status");



		$this->load->view('header');
		$this->load->view('accept_reject_validation', $data);
		$this->load->view('footer');
	}
	public function inwarding_details()
	{
		$invoice_number = $this->uri->segment('4');
		$data['invoice_number'] = $this->uri->segment('4');
		$new_po_id = $this->uri->segment('3');
		$data['new_po_id'] = $this->uri->segment('3');
		$inwarding_id = $this->uri->segment('2');
		$data['inwarding_id'] = $this->uri->segment('2');


		$arr = array(
			'id' => $inwarding_id,

		);


		$inwarding_data = $this->Crud->get_data_by_id_multiple("inwarding", $arr);
		$data['inwarding_data'] = $this->Crud->get_data_by_id_multiple("inwarding", $arr);


		$ar2 = array(
			'inwarding_id' => $inwarding_id,
			'invoice_number' => $invoice_number,

		);
		$invoice_amount = $inwarding_data[0]->invoice_amount;


		$grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr);


		$arr = array(
			'id' => $new_po_id,
			'invoice_number' => $invoice_number,

		);

		$data['new_po'] = $this->Crud->get_data_by_id("new_po", $new_po_id, "id");
		// $data['gst_structure'] = $this->Crud->get_data_by_id("gst_structure", $data['new_po'][0]->tax_id, "id");
		$data['supplier'] = $this->Crud->get_data_by_id("supplier", $data['new_po'][0]->supplier_id, "id");
		$data['gst_structure'] = $this->Crud->read_data("gst_structure");
		$data['uom'] = $this->Crud->read_data("uom");


		$arr = array(
			'supplier_id' => $data['supplier'][0]->id,
		);
		$data['child_part'] = $this->Crud->get_data_by_id_multiple("child_part_master", $arr);

		$arr3123123123 = array(
			'po_id' => $new_po_id,
			'invoice_number' => $invoice_number,

		);
		$data['po_parts'] = $this->Crud->get_data_by_id("po_parts", $new_po_id, "po_id");

		// $data['po_parts'] = $this->Crud->get_data_by_id_multiple("po_parts", $arr);


		$this->load->view('header');
		$this->load->view('inwarding_details', $data);
		$this->load->view('footer');
	}
	public function inwarding_details_validation()
	{
		$invoice_number = $this->uri->segment('4');
		$data['invoice_number'] = $this->uri->segment('4');
		$new_po_id = $this->uri->segment('3');
		$data['new_po_id'] = $this->uri->segment('3');
		$inwarding_id = $this->uri->segment('2');
		$data['inwarding_id'] = $this->uri->segment('2');


		$arr = array(
			'id' => $inwarding_id,

		);


		$inwarding_data = $this->Crud->get_data_by_id_multiple("inwarding", $arr);
		$data['inwarding_data'] = $this->Crud->get_data_by_id_multiple("inwarding", $arr);


		$ar2 = array(
			'inwarding_id' => $inwarding_id,
			'invoice_number' => $invoice_number,

		);
		$invoice_amount = $inwarding_data[0]->invoice_amount;


		$grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr);


		$data['new_po'] = $this->Crud->get_data_by_id("new_po", $new_po_id, "id");
		// $data['gst_structure'] = $this->Crud->get_data_by_id("gst_structure", $data['new_po'][0]->tax_id, "id");
		$data['supplier'] = $this->Crud->get_data_by_id("supplier", $data['new_po'][0]->supplier_id, "id");
		$data['gst_structure'] = $this->Crud->read_data("gst_structure");
		$data['uom'] = $this->Crud->read_data("uom");


		$arr = array(
			'supplier_id' => $data['supplier'][0]->id,
		);
		$data['child_part'] = $this->Crud->get_data_by_id_multiple("child_part", $arr);

		$data['po_parts'] = $this->Crud->get_data_by_id("po_parts", $new_po_id, "po_id");





		$this->load->view('header');
		$this->load->view('inwarding_details_validation', $data);
		$this->load->view('footer');
	}
	public function inwarding_details_accept_reject()
	{
		$invoice_number = $this->uri->segment('4');
		$data['invoice_number'] = $this->uri->segment('4');
		$new_po_id = $this->uri->segment('3');
		$data['new_po_id'] = $this->uri->segment('3');
		$inwarding_id = $this->uri->segment('2');
		$data['inwarding_id'] = $this->uri->segment('2');


		$arr = array(
			'id' => $inwarding_id,

		);


		$inwarding_data = $this->Crud->get_data_by_id_multiple("inwarding", $arr);
		$data['inwarding_data'] = $this->Crud->get_data_by_id_multiple("inwarding", $arr);


		$ar2 = array(
			'inwarding_id' => $inwarding_id,
			'invoice_number' => $invoice_number,

		);
		$invoice_amount = $inwarding_data[0]->invoice_amount;


		$grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr);


		$data['new_po'] = $this->Crud->get_data_by_id("new_po", $new_po_id, "id");
		// $data['gst_structure'] = $this->Crud->get_data_by_id("gst_structure", $data['new_po'][0]->tax_id, "id");
		$data['supplier'] = $this->Crud->get_data_by_id("supplier", $data['new_po'][0]->supplier_id, "id");
		$data['gst_structure'] = $this->Crud->read_data("gst_structure");
		$data['uom'] = $this->Crud->read_data("uom");


		$arr = array(
			'supplier_id' => $data['supplier'][0]->id,
		);
		$data['child_part'] = $this->Crud->get_data_by_id_multiple("child_part", $arr);

		$data['po_parts'] = $this->Crud->get_data_by_id("po_parts", $new_po_id, "po_id");





		$this->load->view('header');
		$this->load->view('inwarding_details_accept_reject', $data);
		$this->load->view('footer');
	}
	public function inwarding_by_po()
	{
		$po_number = $this->input->post('po_number');
		$data['po_number'] = $this->input->post('po_number');
		$data['new_po'] = $this->Crud->get_data_by_id("new_po", $po_number, "po_number");



		$data['customers'] = $this->Crud->read_data("customer");

		$this->load->view('header');
		$this->load->view('inwarding_by_po', $data);
		$this->load->view('footer');
	}

	public function inwarding_po_check()
	{
		$po_number = $this->input->post('po_number');
		$data['po_number'] = $this->input->post('po_number');

		$data['purchase_order'] = $this->Crud->get_data_by_id("purchase_order", $po_number, "po_number");

		$data['customers'] = $this->Crud->read_data("customer");

		$this->load->view('header');
		$this->load->view('inwarding_po_check', $data);
		$this->load->view('footer');
	}

	public function part_type()
	{
		$data['part_type'] = $this->Crud->read_data("part_type");

		$this->load->view('header');
		$this->load->view('part_type', $data);
		$this->load->view('footer');
	}
	public function customer_part_type()
	{
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");

		$this->load->view('header');
		$this->load->view('customer_part_type', $data);
		$this->load->view('footer');
	}
	public function uom()
	{
		$data['uom'] = $this->Crud->read_data("uom");

		$this->load->view('header');
		$this->load->view('uom', $data);
		$this->load->view('footer');
	}
	public function gst()
	{
		$data['gst'] = $this->Crud->read_data("gst_structure");

		$this->load->view('header');
		$this->load->view('gst', $data);
		$this->load->view('footer');
	}
	public function customer_child_part()
	{

		$data['id'] = $this->uri->segment('2');

		$data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['uom'] = $this->Crud->read_data("uom");

		$data['supplier_list'] = $this->Crud->read_data("supplier");



		$this->load->view('header');
		$this->load->view('customer_child_part', $data);
		$this->load->view('footer');
	}
	public function child_part_documents()
	{

		$data['id'] = $this->uri->segment('2');

		// $data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['uom'] = $this->Crud->read_data("uom");

		$data['supplier_list'] = $this->Crud->read_data("supplier");
		// $data['part_creation_revision'] = $this->Crud->read_data("part_creation");
		$role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		$data['part_creation_revision'] = $role_management_data->result();

		$child_part_list = $this->db->query('SELECT DISTINCT part_number FROM `child_part`');
		$data['child_part_list'] = $child_part_list->result();

		$this->load->view('header');
		$this->load->view('child_part_documents', $data);
		$this->load->view('footer');
	}
	public function part_operations()
	{
		// $type = $this->uri->segment('2');
		// $data['type'] = $this->uri->segment('2');
		// $part_id = $this->uri->segment('3');
		// $data['part_id'] = $this->uri->segment('3');

		// $data['part_info'] = $this->Common_admin_model->get_data_by_id("part_creation", $part_id, "id");

		// // print_r($data['part_info']);
		// // print_r($data['part_info']);


		// $data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		// $data['part_operations'] = $this->Common_admin_model->get_all_data("part_operations");
		// $data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		// $data['groups'] = $this->Common_admin_model->get_all_data("groups");
		// $data['size'] = $this->Common_admin_model->get_all_data("size");
		// $data['operations'] = $this->Common_admin_model->get_all_data("operations");
		// $data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		// $data['new_part'] = $role_management_data->result();
		// $role_management_data = $this->db->query('SELECT DISTINCT operation_id FROM `part_operations` WHERE part_id=' . $part_id . '  ');
		// $data['part_operations_revision'] = $role_management_data->result();
		// // print_r($data['part_operations_revision']);
		// $this->load->view('includes/header.php');
		// $this->load->view('part_operations.php', $data);
		// $this->load->view('includes/footer.php');
		$type = $this->uri->segment('2');
		$data['type'] = $this->uri->segment('2');
		$part_id = $this->uri->segment('3');
		$data['part_id'] = $this->uri->segment('3');

		$data['part_info'] = $this->Common_admin_model->get_data_by_id("part_creation", $part_id, "id");
		// print_r($data['part_info']);


		$data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		// $data['part_operations'] = $this->Common_admin_model->get_all_data("part_operations");
		// $data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		// $data['groups'] = $this->Common_admin_model->get_all_data("groups");
		// $data['size'] = $this->Common_admin_model->get_all_data("size");
		$data['operations'] = $this->Common_admin_model->get_all_data("operations");
		// $data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		$role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		$data['new_part'] = $role_management_data->result();
		$role_management_data = $this->db->query('SELECT DISTINCT part_id,operation_id FROM `part_operations` WHERE part_id=' . $part_id . ' ');
		$data['part_operations_revision'] = $role_management_data->result();
		// print_r($data['new_part']);
		$this->load->view('header.php');
		$this->load->view('part_operations.php', $data);

		$this->load->view('footer.php');
	}
	public function add_part_operations()
	{
		$data_old = array(
			'part_id' => $this->input->post('part_id'),
			'operation_id' => $this->input->post('operation_id'),
			'revision_number' => $this->input->post('revision_number'),

		);

		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition_count("part_operations", $data_old);

		// // $customer_count = $this->Common_admin_model->get_data_by_id_count("part_operations",$this->input->post('part_id'),"part_id");



		if ($customer_count > 0) {
			echo "<script>alert('Error : Part Already Present!!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {



			if (!empty($_FILES['drawing']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['drawing']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('drawing')) {
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture1 = '';
					echo "no 1";
				}
			} else {
				$picture1 = '';
				echo "no 2";
			}

			$data = array(
				'part_id' => $this->input->post('part_id'),
				'operation_id' => $this->input->post('operation_id'),
				'operation_description' => $this->input->post('operation_description'),
				'drawing' => $picture1,
				'revision_number' => $this->input->post('revision_number'),
				'revision_date' => $this->input->post('revision_date'),
				'revision_remark' => $this->input->post('revision_remark'),
				'created_date' => $this->current_date,
			);

			$insert = $this->Common_admin_model->insert('part_operations', $data);

			if ($insert) {





				echo "<script>alert(' Operations  Added  ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error While Adding Operations Parts !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_operations()
	{
		$customer_count = $this->Common_admin_model->get_data_by_id_count("operations", $this->input->post('name'), "name");



		if ($customer_count > 0) {
			echo "<script>alert('Operations  already Present!!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			$data = array(
				'name' => $this->input->post('name'),
				'created_by' => $this->user_id,
				'created_date' => $this->current_date,
				'created_time' => $this->current_time,
			);

			$insert = $this->Common_admin_model->insert('operations', $data);

			if ($insert) {
				echo "<script>alert('operations Added  ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error While operations  !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_operations_data()
	{
		// $customer_count = $this->Common_admin_model->get_data_by_id_count("operations", $this->input->post('name'), "name");
		$customer_count = 0;



		if ($customer_count > 0) {
			echo "<script>alert('Operations  already Present!!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			$data = array(
				'operation_name' => $this->input->post('operation_name'),
				'product' => $this->input->post('product'),
				'process' => $this->input->post('process'),
				'specification_tolerance' => $this->input->post('specification_tolerance'),
				'evalution' => $this->input->post('evalution'),
				'size' => $this->input->post('size'),
				'frequency' => $this->input->post('frequency'),
				// 'created_by' => $this->user_id,
				// 'created_date' => $this->current_date,
				// 'created_time' => $this->current_time,
			);

			$insert = $this->Common_admin_model->insert('operation_data', $data);

			if ($insert) {
				echo "<script>alert('operations Added  ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error While operations  !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function operations()
	{

		$data['operations'] = $this->Common_admin_model->get_all_data("operations");

		// print_r($data['orders']);
		$this->load->view('header.php');
		$this->load->view('operations.php', $data);

		$this->load->view('footer.php');
	}
	public function operations_data()
	{

		$data['operation_data'] = $this->Common_admin_model->get_all_data("operation_data");

		// print_r($data['orders']);
		$this->load->view('header.php');
		$this->load->view('operations_data.php', $data);

		$this->load->view('footer.php');
	}

	public function view_history_part()
	{
		$part_no = $this->uri->segment('2');

		// $data['part_creation'] = $this->Common_admin_model->get_all_data("part_creation");
		$data['part_creation'] = $this->Common_admin_model->get_data_by_id("part_creation", $part_no, "part_number");

		// $data['sub_group'] = $this->Common_admin_model->get_all_data("sub_group");
		// $data['groups'] = $this->Common_admin_model->get_all_data("groups");
		// $data['size'] = $this->Common_admin_model->get_all_data("size");
		// $data['operations'] = $this->Common_admin_model->get_all_data("operations");
		// $data['parts_type'] = $this->Common_admin_model->get_all_data("parts_type");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `part_creation` ');
		// $data['part_creation_revision'] = $role_management_data->result();
		// print_r($data['orders']);
		$this->load->view('header.php');
		$this->load->view('view_history_part.php', $data);

		$this->load->view('footer.php');
	}

	public function add_part_creation()
	{
		echo	$part_id = $this->input->post('part_id');
		echo "<br>";

		$array = array(
			"id" => $part_id,

		);

		$child_part_data = $this->Crud->get_data_by_id_multiple_condition("child_part", $array);

		$data_old = array(
			'part_number' => $child_part_data[0]->part_number,
			'revision_number' => $this->input->post('revision_number'),

		);

		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition("part_creation", $data_old);




		if ($customer_count > 0) {
			echo "<script>alert('Error : Customer Part Number and Revision Number Must Be Unique');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if (!empty($_FILES['cad_file']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['cad_file']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('cad_file')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture4 = '';
					echo "no 1";
				}
			} else {
				$picture4 = '';
				echo "no 2";
			}
			if (!empty($_FILES['part_drawing']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['part_drawing']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('part_drawing')) {
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture1 = '';
					echo "no 1";
				}
			} else {
				$picture1 = '';
				echo "no 2";
			}


			if (!empty($_FILES['ppap_document']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['ppap_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('ppap_document')) {
					$uploadData = $this->upload->data();
					$picture2 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture2 = '';
					echo "no 1";
				}
			} else {
				$picture2 = '';
				echo "no 2";
			}
			if (!empty($_FILES['modal_document']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['modal_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('modal_document')) {
					$uploadData = $this->upload->data();
					$picture3 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture3 = '';
					echo "no 1";
				}
			} else {
				$picture3 = '';
				echo "no 2";
			}

			if (!empty($_FILES['q_d']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['q_d']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('q_d')) {
					$uploadData = $this->upload->data();
					$q_d = $uploadData['file_name'];
					//echo "yes";
				} else {
					$q_d = '';
					echo "no 1";
				}
			} else {
				$q_d = '';
				echo "no 2";
			}
			if (!empty($_FILES['a_d']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['a_d']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('a_d')) {
					$uploadData = $this->upload->data();
					$a_d = $uploadData['file_name'];
					//echo "yes";
				} else {
					$a_d = '';
					echo "no 1";
				}
			} else {
				$a_d = '';
				echo "no 2";
			}
			if (!empty($_FILES['c_d']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['c_d']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('c_d')) {
					$uploadData = $this->upload->data();
					$c_d = $uploadData['file_name'];
					//echo "yes";
				} else {
					$c_d = '';
					echo "no 1";
				}
			} else {
				$c_d = '';
				echo "no 2";
			}

			// $sub_group_data = $this->Common_admin_model->get_data_by_id("sub_group", $this->input->post('sub_group_id'), "id");
			// $group_id = $sub_group_data[0]->group_id;






			$data = array(
				'part_number' => $child_part_data[0]->part_number,
				'part_description' =>  $child_part_data[0]->part_description,
				'internal_part_number' => "",
				'group_id' => "",
				'supplier_id' => $this->input->post('supplier_id'),
				'type_id' => "",
				'size_id' => "",
				'part_drawing' => $picture1,
				'ppap_document' => $picture2,
				'modal_document' => $picture3,
				'cad_file' => $picture4,
				'c_d' => $c_d,
				'a_d' => $a_d,
				'q_d' => $q_d,
				'revision_number' => $this->input->post('revision_number'),
				'revision_date' => $this->input->post('revision_date'),
				'revision_remark' => $this->input->post('revision_remark'),
				'created_date' => $this->current_date,
			);

			$insert = $this->Common_admin_model->insert('part_creation', $data);

			if ($insert) {





				echo "<script>alert('Parts Added  ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error While Adding part_creation  !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_part_creation2()
	{
		echo	$part_id = $this->input->post('part_number');
		echo "<br>";

		$array = array(
			"part_number" => $part_id,

		);

		$child_part_data = $this->Crud->get_data_by_id_multiple_condition("child_part", $array);

		$data_old = array(
			'part_number' => $child_part_data[0]->part_number,
			'revision_number' => $this->input->post('revision_number'),

		);

		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition("part_creation", $data_old);




		if ($customer_count > 0) {
			echo "<script>alert('Error : Customer Part Number and Revision Number Must Be Unique');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if (!empty($_FILES['cad_file']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['cad_file']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('cad_file')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture4 = '';
					echo "no 1";
				}
			} else {
				$picture4 = '';
				echo "no 2";
			}
			if (!empty($_FILES['part_drawing']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['part_drawing']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('part_drawing')) {
					$uploadData = $this->upload->data();
					$picture1 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture1 = '';
					echo "no 1";
				}
			} else {
				$picture1 = '';
				echo "no 2";
			}


			if (!empty($_FILES['ppap_document']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['ppap_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('ppap_document')) {
					$uploadData = $this->upload->data();
					$picture2 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture2 = '';
					echo "no 1";
				}
			} else {
				$picture2 = '';
				echo "no 2";
			}
			if (!empty($_FILES['modal_document']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['modal_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('modal_document')) {
					$uploadData = $this->upload->data();
					$picture3 = $uploadData['file_name'];
					//echo "yes";
				} else {
					$picture3 = '';
					echo "no 1";
				}
			} else {
				$picture3 = '';
				echo "no 2";
			}

			if (!empty($_FILES['q_d']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['q_d']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('q_d')) {
					$uploadData = $this->upload->data();
					$q_d = $uploadData['file_name'];
					//echo "yes";
				} else {
					$q_d = '';
					echo "no 1";
				}
			} else {
				$q_d = '';
				echo "no 2";
			}
			if (!empty($_FILES['a_d']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['a_d']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('a_d')) {
					$uploadData = $this->upload->data();
					$a_d = $uploadData['file_name'];
					//echo "yes";
				} else {
					$a_d = '';
					echo "no 1";
				}
			} else {
				$a_d = '';
				echo "no 2";
			}
			if (!empty($_FILES['c_d']['name'])) {
				$image_path = "./documents/";
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['c_d']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('c_d')) {
					$uploadData = $this->upload->data();
					$c_d = $uploadData['file_name'];
					//echo "yes";
				} else {
					$c_d = '';
					echo "no 1";
				}
			} else {
				$c_d = '';
				echo "no 2";
			}

			// $sub_group_data = $this->Common_admin_model->get_data_by_id("sub_group", $this->input->post('sub_group_id'), "id");
			// $group_id = $sub_group_data[0]->group_id;






			$data = array(
				'part_number' => $child_part_data[0]->part_number,
				'part_description' =>  $child_part_data[0]->part_description,
				'internal_part_number' => "",
				'group_id' => "",
				'sub_group_id' => "",
				'type_id' => "",
				'size_id' => "",
				'part_drawing' => $picture1,
				'ppap_document' => $picture2,
				'modal_document' => $picture3,
				'cad_file' => $picture4,
				'c_d' => $c_d,
				'a_d' => $a_d,
				'q_d' => $q_d,
				'revision_number' => $this->input->post('revision_number'),
				'revision_date' => $this->input->post('revision_date'),
				'revision_remark' => $this->input->post('revision_remark'),
				'created_date' => $this->current_date,
			);

			$insert = $this->Common_admin_model->insert('part_creation', $data);

			if ($insert) {





				echo "<script>alert('Parts Added  ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Error While Adding part_creation  !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}

	public function update_part_drawings()
	{
		if (!empty($_FILES['document']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('document')) {
				$uploadData = $this->upload->data();
				$picture1 = $uploadData['file_name'];
			} else {
				$picture1 = '';
			}
		} else {
			$picture1 = $this->input->post('old_img');
		}

		$id = $this->input->post('id');
		$document_name  = "a";

		if ($this->input->post('document_name') == "ppap_document") {
			$document_name  = "ppap_document";
		} else if ($this->input->post('document_name') == "cad_file") {
			$document_name  = "cad_file";
		} else if ($this->input->post('document_name') == "modal_document") {
			$document_name  = "modal_document";
		} else if ($this->input->post('document_name') == "a_d") {
			$document_name  = "a_d";
		} else if ($this->input->post('document_name') == "c_d") {
			$document_name  = "c_d";
		} else if ($this->input->post('document_name') == "q_d") {
			$document_name  = "q_d";
		}

		$data = array(
			$document_name => $picture1,
		);

		$document_name;
		$query = $this->Common_admin_model->update("part_creation", $data, "id", $id);

		if ($query) {

			echo "<script>alert(' Update Success !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While  Updating , Please try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function change_box_status()
	{

		$id = $this->input->post('box_id');

		$data = array(
			"lock_status" => "yes",
		);

		$query = $this->Common_admin_model->update("box", $data, "id", $id);

		if ($query) {
			echo "<script>alert('Update Successfully !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While  Updating , Please try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function return_invoice()
	{

		$invoice_number = $this->input->post('invoice_number');
		$id = $this->input->post('id');

		$data = array(
			"status" => "pending",
		);

		$query = $this->Crud->update_data_new("invoice", $data, $invoice_number, "barcode");

		if ($query) {
			$data = array(
				"id" => $id
			);
			$result = $this->Crud->delete_data("invoice_match", $data);

			echo "<script>alert('Update Successfully !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While  Updating , Please try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function delete_invoice()
	{


		// delete_invoice



		$id = $this->input->post('id');

		$array_invoice_box = array(
			"invoice_id" => $id,

		);

		$invoice_box = $this->Crud->get_data_by_id_multiple_condition("invoice_box", $array_invoice_box);

		if ($invoice_box) {
			foreach ($invoice_box as $i) {
				$data = array(

					"status" => "pending",
				);

				$query = $this->Crud->update_data_new("box", $data, $i->box_id, "barcode");
			}
		}


		if (true) {
			$data = array(
				"id" => $id
			);
			$result = $this->Crud->delete_data("invoice", $data);

			echo "<script>alert('Update Successfully !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While  Updating , Please try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function change_invoice_status()
	{

		$id = $this->input->post('invoice_id');

		$data = array(
			"lock_status" => "yes",
			// "status" => "used",
		);

		$query = $this->Common_admin_model->update("invoice", $data, "id", $id);

		if ($query) {
			echo "<script>alert('Update Successfully !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While  Updating , Please try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function update_part_document_individual()
	{
		if (!empty($_FILES['document']['name'])) {
			$image_path = "./documents/";
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('document')) {
				$uploadData = $this->upload->data();
				$document = $uploadData['file_name'];
			} else {
				$document = '';
			}
		} else {
			$document = $this->input->post('old_img');
		}

		$id = $this->input->post('id');
		// $document_name  = "a";

		// if ($this->input->post('document_name') == "ppap_document") {
		// 	$document_name  = "ppap_document";
		// } else if ($this->input->post('document_name') == "cad_file") {
		// 	$document_name  = "cad_file";
		// } else if ($this->input->post('document_name') == "modal_document") {
		// 	$document_name  = "modal_document";
		// } else if ($this->input->post('document_name') == "a_d") {
		// 	$document_name  = "a_d";
		// } else if ($this->input->post('document_name') == "c_d") {
		// 	$document_name  = "c_d";
		// } else if ($this->input->post('document_name') == "q_d") {
		// 	$document_name  = "q_d";
		// }

		$data = array(
			"document" => $document,
		);

		$query = $this->Common_admin_model->update("customer_part_documents", $data, "id", $id);

		if ($query) {

			echo "<script>alert(' Update Success !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Error While  Updating , Please try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	public function child_part()
	{

		// $data['id'] = $this->uri->segment('2');

		// $data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['uom'] = $this->Crud->read_data("uom");
		$data['cparttypelist'] = $this->Crud->read_data("part_type");

		$data['supplier_list'] = $this->Crud->read_data("supplier");

		$child_part_list = $this->db->query('SELECT DISTINCT part_number FROM `child_part`');
		$data['child_part_list'] = $child_part_list->result();



		$this->load->view('header');
		$this->load->view('child_part', $data);
		$this->load->view('footer');
	}
	public function child_part_supplier()
	{

		// $data['id'] = $this->uri->segment('2');

		// $data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['uom'] = $this->Crud->read_data("uom");
		$data['cparttypelist'] = $this->Crud->read_data("part_type");

		$data['supplier_list'] = $this->Crud->read_data("supplier");

		$child_part_list = $this->db->query('SELECT DISTINCT part_number,supplier_id FROM `child_part_master`');
		$data['child_part_list'] = $child_part_list->result();
		$child_part_list = $this->db->query('SELECT DISTINCT part_number FROM `child_part`');
		$data['child_part_master'] = $child_part_list->result();


		// print_r($data['child_part_master']);

		$this->load->view('header');
		$this->load->view('child_part_supplier', $data);
		$this->load->view('footer');
	}
	public function part_stocks()
	{

		// $data['id'] = $this->uri->segment('2');

		$data['child_part_list'] = $this->Crud->read_data("child_part_master");
		$data['uom'] = $this->Crud->read_data("uom");
		$data['cparttypelist'] = $this->Crud->read_data("part_type");

		$data['supplier_list'] = $this->Crud->read_data("supplier");



		$this->load->view('header');
		$this->load->view('part_stocks', $data);
		$this->load->view('footer');
	}
	public function planning_year_page()
	{

		// $data['id'] = $this->uri->segment('2');

		$data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['uom'] = $this->Crud->read_data("uom");
		$data['cparttypelist'] = $this->Crud->read_data("part_type");

		$data['supplier_list'] = $this->Crud->read_data("supplier");



		$this->load->view('header');
		$this->load->view('planning_year_page', $data);
		$this->load->view('footer');
	}
	public function planing_data()
	{

		//echo $this->input->post('customer_id');
		if (!empty($this->input->post('customer_id'))) {
			$data['customer_id'] = $this->input->post('customer_id');
			$customer_id = $this->input->post('customer_id');
		} else {
			$data['customer_id'] = $this->uri->segment('4');
			$customer_id = $this->uri->segment('4');
		}
		$data['financial_year'] = $this->uri->segment('2');
		$data['month'] = $this->uri->segment('3');
		$financial_year = $this->uri->segment('2');
		$month = $this->uri->segment('3');
		$data['planing_data'] = $this->Crud->get_data_by_id("planing", $financial_year, "financial_year");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		$data['customer'] = $this->Crud->read_data("customer");




		$this->load->view('header');
		$this->load->view('planing_data', $data);
		$this->load->view('footer');
	}
	public function planing_data_month()
	{

		$data['financial_year'] = $this->uri->segment('2');
		$financial_year = $this->uri->segment('2');
		$data['planing_data'] = $this->Crud->get_data_by_id("planing", $financial_year, "financial_year");
		$data['customer_part'] = $this->Crud->read_data("customer_part");




		$this->load->view('header');
		$this->load->view('planing_data_month', $data);
		$this->load->view('footer');
	}
	public function view_planing_data()
	{

		$data['planing_id'] = $this->uri->segment('2');
		$planing_id = $this->uri->segment('2');
		$financial_year = $this->uri->segment('2');
		$data['planing_data'] = $this->Crud->get_data_by_id("planing_data", $planing_id, "planing_id");




		$this->load->view('header');
		$this->load->view('view_planing_data', $data);
		$this->load->view('footer');
	}

	public function erp_users()
	{

		// $data['planing_id'] = $this->uri->segment('2');
		// $planing_id = $this->uri->segment('2');
		// $financial_year = $this->uri->segment('2');
		// $data['planing_data'] = $this->Crud->get_data_by_id("planing_data", $planing_id, "planing_id");
		$data['user_info'] = $this->Crud->read_data("userinfo");




		$this->load->view('header');
		$this->load->view('erp_users', $data);
		$this->load->view('footer');
	}
	public function add_users_data()
	{



		$data = array(
			'user_name' => $this->input->post('user_name'),
			'user_email' => $this->input->post('user_email'),
			'user_password' => $this->input->post('user_password'),
			'type' => $this->input->post('user_role'),


		);



		$inser_query = $this->Crud->insert_data("userinfo", $data);

		if ($inser_query) {



			if ($inser_query) {
				echo "<script>alert('User  Added Successfully');document.location='erp_users'</script>";
			} else {
				echo "<script>alert('Error IN User  Adding ,try again');document.location='erp_users'</script>";
			}
		} else {
			echo "Error";
		}
	}
	public function customer_part()
	{
		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");

		$role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` ');
		$data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('customer_part', $data);
		$this->load->view('footer');
	}
	public function job_card()
	{
		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['job_card'] = $this->Crud->read_data("job_card");
		$data['customer_part'] = $this->Crud->read_data("customer_part");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('job_card', $data);
		$this->load->view('footer');
	}
	public function job_card_released()
	{
		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['job_card'] = $this->Crud->read_data("job_card");
		$data['customer_part'] = $this->Crud->read_data("customer_part");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('job_card_released', $data);
		$this->load->view('footer');
	}
	public function part_master()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['parts'] = $this->Crud->read_data("parts");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('parts', $data);
		$this->load->view('footer');
	}
	public function part_stock()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['parts'] = $this->Crud->read_data("parts");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('part_stock', $data);
		$this->load->view('footer');
	}
	public function create_packing()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['parts'] = $this->Crud->read_data("parts");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('create_packing', $data);
		$this->load->view('footer');
	}
	public function create_packing_bulk()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['parts'] = $this->Crud->read_data("parts");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('create_packing_bulk', $data);
		$this->load->view('footer');
	}
	public function create_box()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['parts'] = $this->Crud->read_data("parts");
		$data['box'] = $this->Crud->read_data("box");

		$to_date = $this->input->post('to_date');
		$from_date = $this->input->post('from_date');

		if ($this->input->post('to_date')) {
		} else {
			$from_date = $this->current_date;
			$to_date = $this->current_date;
		}


		$data['from_date'] = $from_date;
		// echo "<br>";
		$data['to_date'] = $to_date;
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		// $data['packing'] = $this->Crud->read_data("packing");

		$role_management_data = $this->db->query("SELECT *   FROM `box` WHERE created_time >= '$from_date' AND created_time <=  '$to_date' ");

		// echo "SELECT *   FROM `box` WHERE created_time <= '$from_date' AND created_time >=  '$to_date'";
		$data['box'] = $role_management_data->result();


		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('create_box', $data);
		$this->load->view('footer');
	}
	public function create_invoice()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		// $data['parts'] = $this->Crud->read_data("parts");
		$data['invoice'] = $this->Crud->read_data("invoice");
		$data['parts'] = $this->Crud->read_data("parts");


		$data['parts'] = $this->Crud->read_data("parts");
		$data['box'] = $this->Crud->read_data("box");

		$to_date = $this->input->post('to_date');
		$from_date = $this->input->post('from_date');

		if ($this->input->post('to_date')) {
		} else {
			$from_date = $this->current_date;
			$to_date = $this->current_date;
		}


		$data['from_date'] = $from_date;
		// echo "<br>";
		$data['to_date'] = $to_date;
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		// $data['packing'] = $this->Crud->read_data("packing");

		$role_management_data = $this->db->query("SELECT *   FROM `invoice` WHERE created_time >= '$from_date' AND created_time <=  '$to_date' ");

		// echo "SELECT *   FROM `box` WHERE created_time <= '$from_date' AND created_time >=  '$to_date'";
		$data['invoice'] = $role_management_data->result();
		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('create_invoice', $data);
		$this->load->view('footer');
	}

	public function verify_invoice()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		// $data['parts'] = $this->Crud->read_data("parts");
		$data['invoice_match'] = $this->Crud->read_data("invoice_match");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('verify_invoice', $data);
		$this->load->view('footer');
	}
	public function gate_out_report()
	{
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		// $data['parts'] = $this->Crud->read_data("parts");
		$data['invoice_match'] = $this->Crud->read_data("invoice_match");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('gate_out_report', $data);
		$this->load->view('footer');
	}
	public function view_packing()
	{
		$to_date = $this->input->post('to_date');
		$from_date = $this->input->post('from_date');

		if ($this->input->post('to_date')) {
		} else {
			$from_date = $this->current_date;
			$to_date = $this->current_date;
		}


		$data['from_date'] = $from_date;
		// echo "<br>";
		$data['to_date'] = $to_date;
		// $customer_id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		// $data['packing'] = $this->Crud->read_data("packing");

		// $role_management_data = $this->db->query("SELECT *   FROM `packing` WHERE created_time <= '$from_date' AND created_time >=  '$to_date' ");
		$role_management_data = $this->db->query("SELECT *   FROM `packing` INNER JOIN parts ON parts.id = packing.part_id WHERE packing.created_time >= '$from_date' AND packing.created_time <=  '$to_date' ");


		// echo "SELECT *   FROM `packing` WHERE created_time >= $from_date AND created_date <=  $to_date";
		$data['packing'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('view_packing', $data);
		$this->load->view('footer');
	}
	public function view_packing_by_id()
	{
		$id = $this->uri->segment('2');
		// $data['customer_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['packing'] = $this->Crud->get_data_by_id("packing", $id, "id", true);

		// $data['packing'] = $this->Crud->read_data("packing");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['packing'][0]->barcode);
		$this->load->view('header');
		$this->load->view('view_packing_by_id', $data);
		$this->load->view('footer');
	}
	public function add_packing_to_box()
	{
		$id = $this->uri->segment('2');
		$data['box_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['box_packing'] = $this->Crud->get_data_by_id("box_packing", $id, "box_id");


		$data['box'] = $this->Crud->get_data_by_id("box", $id, "id");





		$data['packing'] = $this->Crud->read_data("packing");


		$box_packing = $this->Crud->get_data_by_id("box_packing", $id, "box_id");
		$part_qty = 0;
		$part_id = 0;
		if ($box_packing) {
			foreach ($box_packing as $b) {
				$part_id = $b->part_id;
				$packing_data = $this->Crud->get_data_by_id("packing", $b->pack_id, "barcode");


				$part_qty = $packing_data[0]->part_qty + $part_qty;
			}
		}
		$data['parts'] = $this->Crud->get_parts_packing_data($part_id);


		$data['total_part_qty'] = $part_qty;



		// $data['box'] = $this->Crud->read_data("box");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['packing'][0]->barcode);
		$this->load->view('header');
		$this->load->view('add_packing_to_box', $data);
		$this->load->view('footer');
	}
	public function add_box_to_invoice()
	{
		$id = $this->uri->segment('2');
		$data['invoice_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");
		$data['invoice_box'] = $this->Crud->get_data_by_id("invoice_box", $id, "invoice_id");
		$data['invoice'] = $this->Crud->get_data_by_id("invoice", $id, "id");
		// print_r($data['invoice']);
		$data['parts_data'] = $this->Crud->get_data_by_id("parts", $data['invoice'][0]->part_id, "id");

		$data['packing'] = $this->Crud->read_data("packing");
		$data['box'] = $this->Crud->read_data("box");
		$part_qty = 0;
		$part_number = 0;
		if ($data['invoice_box']) {
			foreach ($data['invoice_box'] as $po) {

				$box_data = $this->Crud->get_data_by_id("box", $po->box_id, "barcode");
				$box_packing = $this->Crud->get_data_by_id("box_packing", $box_data[0]->id, "box_id");

				if ($box_packing) {
					foreach ($box_packing as $b) {
						$packing_data = $this->Crud->get_data_by_id("packing", $b->pack_id, "barcode");
						$parts = $this->Crud->get_data_by_id("parts", $packing_data[0]->part_id, "id");

						$part_qty = $packing_data[0]->part_qty + $part_qty;
						$part_number = $parts[0]->part_number;
					}
				}
			}
		}


		$data['total_part_qty'] = 	$part_qty;
		$data['part_number_display'] = 	$part_number;
		$part_id = $data['invoice'][0]->part_id;
		$data['parts'] = $this->Crud->get_parts_packing_data($part_id);




		// $data['invoice_box'] = $this->Crud->read_data("invoice_box");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['packing'][0]->barcode);
		$this->load->view('header');
		$this->load->view('add_box_to_invoice', $data);
		$this->load->view('footer');
	}


	public function add_box_to_invoice_verify()
	{
		$id = $this->uri->segment('2');
		$data['invoice_id'] = $this->uri->segment('2');

		// // $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		// $data['customers'] = $this->Crud->read_data("customer");

		$data['invoice_box_match'] = $this->Crud->get_data_by_id("invoice_box", $id, "invoice_id");
		$data['invoice'] = $this->Crud->get_data_by_id("invoice_match", $id, "id");

		$data['invoice_main'] = $this->Crud->get_data_by_id("invoice", $data['invoice'][0]->invoice_number, "barcode");
		$data['invoice_box'] = $this->Crud->get_data_by_id("invoice_box_match", $data['invoice_main'][0]->id, "invoice_id");
		$data['checked'] = false;

		// echo count($data['invoice_box_match']);
		// echo count($data['invoice_box']);

		// echo count($data['invoice_box_match']);
		if ($data['invoice_main']) {
			if ($data['invoice_box']) {

				if ((int)count($data['invoice_box_match']) == (int)count($data['invoice_box'])) {
					$data['checked'] = true;
				} else {
					$data['checked'] = true;
				}
			} else {
				$data['checked'] = true;
			}
		} else {
			$data['checked'] = true;
		}

		// echo $data['checked'];
		// echo count($data['invoice_box_match']);
		// $data['packing'] = $this->Crud->read_data("packing");
		// $data['box'] = $this->Crud->read_data("box");
		// $data['invoice_box'] = $this->Crud->read_data("invoice_box");

		// $role_management_data = $this->db->query('SELECT DISTINCT part_number FROM `customer_part` WHERE customer_id = ' . $customer_id . ' ');
		// $data['customer_part_list'] = $role_management_data->result();

		// print_r($data['packing'][0]->barcode);
		$this->load->view('header');
		$this->load->view('add_box_to_invoice_verify', $data);
		$this->load->view('footer');
	}
	public function customer_part_documents_by_id()
	{
		$customer_id = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";

		$role_management_data = $this->db->query('SELECT * FROM `customer_part_documents` WHERE customer_id = ' . $customer_id . '');
		$data['customer_part_rate'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('customer_part_documents_by_id', $data);
		$this->load->view('footer');
	}
	public function view_job_card_details()
	{
		$job_card_id = $this->uri->segment('2');
		$data['job_card'] = $this->Crud->get_data_by_id("job_card", $job_card_id, "id");
		$data['customer_part_data'] = $this->Crud->get_data_by_id("customer_part", $data['job_card'][0]->customer_part_id, "id");
		$data['customer_part_operation'] = $this->Crud->get_data_by_id("customer_part_operation", $data['job_card'][0]->customer_part_id, "customer_master_id");
		$data['customer_part_operation_data'] = $this->Crud->get_data_by_id("customer_part_operation_data", $data['customer_part_operation'][0]->id, "customer_part_operation_id");
		$data['uom'] = $this->Crud->get_data_by_id("uom", $data['customer_part_data'][0]->uom, "id");
		$data['customer_data'] = $this->Crud->get_data_by_id("customer", $data['customer_part_data'][0]->customer_id, "id");
		$data['bom_data'] = $this->Crud->get_data_by_id("bom", $data['job_card'][0]->customer_part_id, "customer_part_id");


		// print_r(count($data['customer_part_operation_data']));
		$this->load->view('header');
		$this->load->view('view_job_card_details', $data);
		$this->load->view('footer');
	}
	public function view_job_card_details_released()
	{
		$job_card_id = $this->uri->segment('2');
		$data['job_card'] = $this->Crud->get_data_by_id("job_card", $job_card_id, "id");
		$data['customer_part_data'] = $this->Crud->get_data_by_id("customer_part", $data['job_card'][0]->customer_part_id, "id");
		$data['customer_part_operation'] = $this->Crud->get_data_by_id("customer_part_operation", $data['job_card'][0]->customer_part_id, "customer_master_id");
		$data['customer_part_operation_data'] = $this->Crud->get_data_by_id("customer_part_operation_data", $data['customer_part_operation'][0]->id, "customer_part_operation_id");
		$data['uom'] = $this->Crud->get_data_by_id("uom", $data['customer_part_data'][0]->uom, "id");
		$data['customer_data'] = $this->Crud->get_data_by_id("customer", $data['customer_part_data'][0]->customer_id, "id");
		$data['bom_data'] = $this->Crud->get_data_by_id("bom", $data['job_card'][0]->customer_part_id, "customer_part_id");


		// print_r(count($data['customer_part_operation_data']));
		$this->load->view('header');
		$this->load->view('view_job_card_details_released', $data);
		$this->load->view('footer');
	}
	public function part_document_by_name()
	{
		$customer_id = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');
		$part_id = $this->uri->segment('3');
		$data['part_id'] = $this->uri->segment('3');
		$type = $this->uri->segment('4');
		$data['type'] = $this->uri->segment('4');
		$data['customer_data'] = $this->Crud->get_data_by_id("customer", $customer_id, "id");

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";

		$role_management_data = $this->db->query('SELECT * FROM `customer_part_documents` WHERE customer_id = ' . $customer_id . ' AND customer_master_id = ' . $part_id . '');
		$data['customer_part_rate'] = $role_management_data->result();

		$data['customer_part']  = $this->Crud->get_data_by_id("customer_part", $part_id, "id");

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('part_document_by_name', $data);
		$this->load->view('footer');
	}
	public function customer_part_drawing()
	{
		$customer_id = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";

		$role_management_data = $this->db->query('SELECT DISTINCT customer_master_id FROM `customer_part_drawing` ORDER BY `id` DESC');
		$data['customer_part_rate'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('customer_part_drawing_by_id', $data);
		$this->load->view('footer');
	}
	public function customer_part_price_by_id()
	{
		$customer_id = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";

		$role_management_data = $this->db->query('SELECT DISTINCT customer_master_id FROM `customer_part_rate`  ORDER BY `id` DESC');
		$data['customer_part_rate'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('customer_part_price_by_id', $data);
		$this->load->view('footer');
	}
	public function customer_part_operation_by_id()
	{
		$customer_id = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		$data['operations'] = $this->Crud->read_data("operations");
		// $data['customer_part_list'] = "";

		$role_management_data = $this->db->query('SELECT DISTINCT customer_master_id,operation_id FROM `customer_part_operation`  ORDER BY `id` DESC');
		$data['customer_part_rate'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('customer_part_operation_by_id', $data);
		$this->load->view('footer');
	}
	public function add_operation_details()
	{
		$customer_part_operation_id = $this->uri->segment('2');
		$data['customer_part_operation'] = $this->Crud->get_data_by_id("customer_part_operation", $customer_part_operation_id, "id");
		$data['customer_part_operation_data'] = $this->Crud->get_data_by_id("customer_part_operation_data", $customer_part_operation_id, "customer_part_operation_id");
		$data['operation_data'] = $this->Crud->read_data("operation_data");



		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('add_operation_details', $data);
		$this->load->view('footer');
	}
	public function view_part_rate_history()
	{
		$customer_master_id = $this->uri->segment('2');
		$data['customer_master_id'] = $this->uri->segment('2');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";



		// $role_management_data = $this->db->query('SELECT DISTINCT customer_master_id FROM `customer_part_rate` ORDER BY `id` DESC');
		// $data['customer_part_rate'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$data['customer_part_rate'] = $this->Crud->get_data_by_id("customer_part_rate", $customer_master_id, "customer_master_id");

		$this->load->view('header');
		$this->load->view('view_part_rate_history', $data);
		$this->load->view('footer');
	}
	public function view_part_drawing_history()
	{
		$customer_master_id = $this->uri->segment('2');
		$data['customer_master_id'] = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";



		// $role_management_data = $this->db->query('SELECT DISTINCT customer_master_id FROM `customer_part_rate` ORDER BY `id` DESC');
		// $data['customer_part_rate'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$data['customer_part_rate'] = $this->Crud->get_data_by_id("customer_part_drawing", $customer_master_id, "customer_master_id");

		$this->load->view('header');
		$this->load->view('view_part_drawing_history', $data);
		$this->load->view('footer');
	}
	public function view_part_operation_history()
	{
		$customer_master_id = $this->uri->segment('2');
		$data['customer_master_id'] = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');
		$data['operation_id'] = $this->uri->segment('3');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";



		// $role_management_data = $this->db->query('SELECT DISTINCT customer_master_id FROM `customer_part_rate` ORDER BY `id` DESC');
		// $data['customer_part_rate'] = $role_management_data->result();

		$data['customer_part_rate'] = $this->Crud->get_data_by_id("customer_part_operation", $customer_master_id, "customer_master_id");
		// print_r($data['customer_part_rate']);

		$this->load->view('header');
		$this->load->view('view_part_operation_history', $data);
		$this->load->view('footer');
	}
	public function customer_price()
	{
		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		// $data['customer_part_list'] = "";

		$role_management_data = $this->db->query('SELECT DISTINCT customer_master_id FROM `customer_part_rate` ');
		$data['customer_part_rate'] = $role_management_data->result();

		// print_r($data['customer_part_list']);
		$this->load->view('header');
		$this->load->view('customer_price', $data);
		$this->load->view('footer');
	}



	public function insert()
	{
		$data['toolList'] = $this->Crud->get_data_by_id("tools", "insert", "type");

		$this->load->view('header');
		$this->load->view('insert', $data);
		$this->load->view('footer');
	}

	public function tool_with_insert()
	{
		$data['toolList'] = $this->Crud->get_data_by_id("tools", "tool_with_insert", "type");

		$this->load->view('header');
		$this->load->view('tool_with_insert', $data);
		$this->load->view('footer');
	}
	public function singlerequesrreasons()
	{
		$data['requestList'] = $this->Crud->read_data("single_r_r");


		$this->load->view('header');
		$this->load->view('singlerequesrreasons', $data);
		$this->load->view('footer');
	}

	public function source_list()
	{
		$data['source_list'] = $this->Crud->get_data_by_id("c_source_supplier", "source", "type");
		$this->load->view('header');
		$this->load->view('source_list', $data);
		$this->load->view('footer');
	}

	public function store_stock()
	{
		// $data['consumable_item'] = $this->Crud->get_data_by_id("c_source_supplier", "source", "type");
		$data['consumable_item_details'] = $this->Crud->read_data("consumable_item");
		$data['inward_quantity'] = $this->Crud->read_data("store");
		$data['issue_quantity'] = $this->Crud->read_data("issue");
		$this->load->view('header');
		$this->load->view('store_stock', $data);
		$this->load->view('footer');
	}



	public function shifts()
	{
		$data['shiftList'] = $this->Crud->read_data("shifts");


		$this->load->view('header');
		$this->load->view('shifts', $data);
		$this->load->view('footer');
	}


	public function delete()
	{
		$id = $this->input->post('id');
		$table_name = $this->input->post('table_name');

		$data = array(
			"id" => $id
		);
		$result = $this->Crud->delete_data($table_name, $data);
		if ($result) {
			echo "<script>alert('Deleted Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert(' Not Deleted');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function delete_po()
	{
		$id = $this->input->post('id');
		$table_name = $this->input->post('table_name');

		$data = array(
			"id" => $id
		);
		$result = $this->Crud->delete_data($table_name, $data);
		if ($result) {
			echo "<script>alert(' Deleted Sucessfully');document.location='" . base_url('new_po_list_supplier') . "'</script>";
		} else {
			echo "<script>alert(' Not Deleted');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}


	public function addContractor()
	{
		$name = $this->input->post('contractorName');
		$number = $this->input->post('contractorCode');
		$data = array(
			"contractor_code" => $number,
		);
		$check = $this->Crud->read_data_where("contractor", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"contractor_name" => $name,
				"contractor_code" => $number,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("contractor", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_box_packing_data()
	{
		$box_id = $this->input->post('box_id');
		$box_name = $this->input->post('box_name');
		$pack_id = $this->input->post('pack_id');
		$array = array(
			"barcode" => $pack_id,
			"status" => "pending"
		);


		// echo  ."<br>";
		// print_r($array);
		// $packing_data = $this->Crud->get_data_by_id("packing", $pack_id, "barcode");

		$packing_data = $this->Crud->get_data_by_id_multiple_condition("packing", $array);
		// $packing_data = $this->Crud->get_data_by_id_multiple_condition("parts", $array);
		$parts_data = $this->Crud->get_data_by_id("parts", $packing_data[0]->part_id, "id");

		// echo  $parts_data[0]->part_number;
		$part_id = $packing_data[0]->part_id;
		$part_qty = $packing_data[0]->part_qty;


		// $packing_data = $this->Crud->get_data_by_id_multiple_condition("packing", $array);

		// print_r($packing_data);
		if ($box_name == $parts_data[0]->part_number) {
			if ($packing_data) {
				$data = array(
					"box_id" => $box_id,
					"pack_id" => $pack_id,
					"part_id" => $part_id,
					"part_qty" => $part_qty,
					"created_by" => $this->user_id,
					"created_date" => $this->current_date,
					"created_time" => $this->current_time,
				);

				$result = $this->Crud->insert_data("box_packing", $data);
				if ($result) {


					$data222 = array(
						"status" => "used",

					);
					$result = $this->Crud->update_data("packing", $data222, $packing_data[0]->id);

					echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				} else {
					echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				echo "<script>alert('Error : Packing barcode not found  !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			echo "<script>alert('Error : Part Id Not Matched !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_invoice_box_data()
	{
		$invoice_id = $this->input->post('invoice_id');
		$box_id = $this->input->post('box_id');
		$qty = $this->input->post('qty');
		$part_id = $this->input->post('part_id');
		$total_part_qty = $this->input->post('total_part_qty');
		$box_data = $this->Crud->get_data_by_id("box", $box_id, "barcode");

		// $array = array(
		// 	"barcode" => $pack_id,
		// );


		// print_r($array);
		$array = array(
			"barcode" => $box_id,
			"status" => "pending"
		);


		// print_r($array);
		// $packing_data = $this->Crud->get_data_by_id("packing", $pack_id, "barcode");

		$packing_data = $this->Crud->get_data_by_id_multiple_condition("box", $array);

		// $packing_data = $this->Crud->get_data_by_id("box", $box_id, "barcode");

		// $packing_data = $this->Crud->get_data_by_id_multiple_condition("packing", $array);

		// print_r($packing_data);
		if ($packing_data) {

			$array_main = array(
				"box_id" => $box_data[0]->id,
				// "status" => "pending"
			);


			// print_r($array);
			// $packing_data = $this->Crud->get_data_by_id("packing", $pack_id, "barcode");

			$packing_main_packing = $this->Crud->get_data_by_id_multiple_condition("box_packing", $array_main);
			if ($packing_main_packing) {

				$pack_id = $packing_main_packing[0]->pack_id;
				$array_main22 = array(
					"barcode" => $pack_id,
					"part_id" => $part_id
				);


				// print_r($array);
				// $packing_data = $this->Crud->get_data_by_id("packing", $pack_id, "barcode");

				$packing_main_packingpacking = $this->Crud->get_data_by_id_multiple_condition("packing", $array_main22);

				if ($packing_main_packingpacking) {
					$part_qty = 0;
					// foreach ($packing_main_packingpacking as $pq) {
					// 	$part_qty = $part_qty + $pq->part_qty;
					// }

					// echo $part_qty;

					$box_packing = $this->Crud->get_data_by_id("box_packing", $box_data[0]->id, "box_id");
					$part_qty = 0;
					if ($box_packing) {
						foreach ($box_packing as $b) {
							$packing_data = $this->Crud->get_data_by_id("packing", $b->pack_id, "barcode");

							$part_qty = $packing_data[0]->part_qty + $part_qty;
						}
					}

					// echo $part_qty; . .
					if ($part_qty <= $qty) {
						$data = array(
							"box_id" => $box_id,
							"invoice_id" => $invoice_id,
							"created_by" => $this->user_id,
							"created_date" => $this->current_date,
							"created_time" => $this->current_time,
						);

						$result = $this->Crud->insert_data("invoice_box", $data);
						if ($result) {
							$data222 = array(
								"status" => "used",
							);
							$result = $this->Crud->update_data_new("box", $data222, $box_id, "barcode");
							$result = $this->Crud->update_data_new("box_packing", $data222, $box_packing[0]->id, "box_id");
							echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
						} else {
							echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
						}
					} else {
						echo "<script>alert('Error  406 : Part Qty Mismatch, Please Try Again Later');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
					}
				} else {
					echo "<script>alert('Error  405 : Packing Part Number Mismatch Please Try Again');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				echo "<script>alert('Error  403 : Box barcode not found !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			echo "<script>alert('Error : Box barcode not found !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_invoice_box_data_match()
	{
		$invoice_id = $this->input->post('invoice_id');
		$box_id = $this->input->post('box_id');

		// $array = array(
		// 	"barcode" => $pack_id,
		// );

		// $invoice_data = $this->Crud->get_data_by_id("invoice", $invoice_id, "barcode");

		// print_r($array);
		$array = array(
			"box_id" => $box_id,
			"invoice_id" => $invoice_id,
			// "status" => "pending"
		);


		// print_r($array);
		// $packing_data = $this->Crud->get_data_by_id("packing", $pack_id, "barcode");

		$packing_data = $this->Crud->get_data_by_id_multiple_condition("invoice_box", $array);

		// $packing_data = $this->Crud->get_data_by_id("box", $box_id, "barcode");

		// $packing_data = $this->Crud->get_data_by_id_multiple_condition("packing", $array);

		// print_r($packing_data);
		if ($packing_data) {
			$data = array(
				"box_id" => $box_id,
				"invoice_id" => $invoice_id,
				"created_by" => $this->user_id,
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("invoice_box_match", $data);
			if ($result) {
				$data222 = array(
					"status" => "used",

				);
				$result = $this->Crud->update_data("box", $data222, $packing_data[0]->id);
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			echo "<script>alert('Error : Box barcode not found in this invoice !!!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function add_invoice_box_data_invoice_box_match()
	{
		$invoice_id = $this->input->post('invoice_id');
		$box_id = $this->input->post('box_id');
		// $array = array(
		// 	"barcode" => $pack_id,
		// );


		// print_r($array);
		$packing_data = $this->Crud->get_data_by_id("invoice_box", $box_id, "box_id");

		// $packing_data = $this->Crud->get_data_by_id_multiple_condition("packing", $array);

		// print_r($packing_data);
		if ($packing_data) {
			$data = array(
				"box_id" => $box_id,
				"invoice_id" => $invoice_id,
				"created_by" => $this->user_id,
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("invoice_box_match", $data);
			if ($result) {
				echo "<script>alert('Error : Box barcode not found in this invoice !!!!');document.location='" . base_url('verify_invoice') . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			echo "<script>alert('Error : Box barcode not found in this invoice !!!!');document.location='" . base_url('verify_invoice') . "'</script>";
		}
	}
	public function adduom()
	{
		$name = $this->input->post('uomName');
		$data = array(
			"uom_name" => $name,
		);
		$check = $this->Crud->read_data_where("uom", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"uom_name" => $name,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("uom", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function addpartType()
	{
		$name = $this->input->post('parttypeName');
		$data = array(
			"part_type_name" => $name,
		);
		$check = $this->Crud->read_data_where("part_type", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"part_type_name" => $name,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("part_type", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function addCustomerType()
	{
		$name = $this->input->post('customerPartName');
		$data = array(
			"customer_type_name" => $name,
		);
		$check = $this->Crud->read_data_where("customer_part_type", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"customer_type_name" => $name,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("customer_part_type", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function create_packing_data()
	{
		$part_id = $this->input->post('part_id');
		$part_qty = $this->input->post('part_qty');
		$batch_code = $this->input->post('batch_code');

		$packing = $this->Crud->read_data("packing");
		if ($packing) {
			$count = count($packing);
		} else {
			$count = 0;
		}

		$barcode = 100000 + $count;
		if (false) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"barcode" => $barcode,
				"part_id" => $part_id,
				"part_qty" => $part_qty,
				"batch_code" => $batch_code,
				"created_by" => $this->user_id,
				"created_time" => $this->current_date,
				"created_date" => $this->current_time,
			);
			// $text = "123";
			// echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=40&text=" . $text . "&print=true'/>";
			// print_

			$result = $this->Crud->insert_data("packing", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . base_url('view_packing_by_id/') . $result . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function create_packing_data_bulk()
	{

		$packing_qty = $this->input->post('packing_qty');

		$barcode_array = array();

		for ($i = 1; $i <= $packing_qty; $i++) {
			$part_id = $this->input->post('part_id');
			$part_qty = $this->input->post('part_qty');
			$batch_code = $this->input->post('batch_code');
			$packing = $this->Crud->read_data("packing");
			if ($packing) {
				$count = count($packing);
			} else {
				$count = 0;
			}

			$barcode = 100000 + $count;

			$my_array = array(
				"barcode" => $barcode,
				"part_id" => $part_id,
				"part_qty" => $part_qty,
				"batch_code" => $batch_code,
				"created_time" => $this->current_date,
				"created_date" => $this->current_time,
			);
			// $barcode_array = push($barcode);

			array_push($barcode_array, $my_array);

			if (false) {
				echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				$data = array(
					"barcode" => $barcode,
					"part_id" => $part_id,
					"part_qty" => $part_qty,
					"batch_code" => $batch_code,

					"created_by" => $this->user_id,
					"created_time" => $this->current_date,
					"created_date" => $this->current_time,
				);
				$result = $this->Crud->insert_data("packing", $data);
				if ($result) {
					// echo "<script>alert('Added Sucessfully');document.location='" . base_url('view_packing_by_id/') . $result . "'</script>";
				} else {
					echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			}
		}



		// print_r($barcode_array);
		// foreach ($barcode_array as $b) {
		// 	print_r($b["part_qty"]);
		// 	print_r($b["barcode"]);
		// 	echo "<br>";
		// 	// foreach ($b as $c) {
		// 	// 	echo $c->barcode;
		// 	// 	echo $c->part_id;
		// 	// 	echo "<br>";
		// 	// }
		// }

		if ($barcode_array) {
			$data['barcode_array'] = $barcode_array;
			$this->load->view('header');
			$this->load->view('bulk_barcode', $data);
			// $this->load->view('footer');
		} else {
			echo "Something Went Wrong !!";
		}
	}
	public function add_box()
	{
		$box_size = $this->input->post('box_size');
		$box_name = $this->input->post('box_name');

		$box = $this->Crud->read_data("box");
		if ($box) {
			$count = count($box);
		} else {
			$count = 0;
		}

		$barcode = 200000 + $count;
		if (false) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"barcode" => $barcode,
				"box_name" => $box_name,
				"box_size" => $box_size,
				"created_by" => $this->user_id,
				"created_time" => $this->current_date,
				"created_date" => $this->current_time,
			);
			// $text = "123";
			// echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=40&text=" . $text . "&print=true'/>";
			// print_r($data);

			$result = $this->Crud->insert_data("box", $data);
			// print_r($result);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . base_url('add_packing_to_box/') . $result . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_invoice_data()
	{
		$invoice_number = $this->input->post('invoice_number');
		$qty = $this->input->post('qty');
		$part_id = $this->input->post('part_id');
		// $box_name = $this->input->post('box_name');
		$data_old = array(
			'invoice_number' => $this->input->post('invoice_number'),


		);

		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition_count("invoice", $data_old);

		$invoice = $this->Crud->read_data("invoice");
		if ($invoice) {
			$count = count($invoice);
		} else {
			$count = 0;
		}

		$barcode = 300000 + $count;
		if ($customer_count > 0) {
			echo "<script>alert('Error : Invoice Number Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"barcode" => $barcode,
				"invoice_number" => $invoice_number,
				"part_id" => $part_id,
				"qty" => $qty,
				"created_by" => $this->user_id,
				"created_time" => $this->current_date,
				"created_date" => $this->current_time,
			);
			// $text = "123";
			// echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=40&text=" . $text . "&print=true'/>";
			// print_r($data);

			$result = $this->Crud->insert_data("invoice", $data);
			// print_r($result);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . base_url('add_box_to_invoice/') . $result . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_invoice_data_match()
	{
		$invoice_number = $this->input->post('invoice_number');
		$total_stock = $this->input->post('total_stock');
		// $box_name = $this->input->post('box_name');
		$data_old = array(
			'barcode' => $this->input->post('invoice_number'),


		);

		$customer_count = $this->Common_admin_model->get_data_by_id_multiple_condition_count("invoice", $data_old);

		// $invoice = $this->Crud->read_data("invoice");
		// if ($invoice) {
		// 	$count = count($invoice);
		// } else {
		// 	$count = 0;
		// }

		// $barcode = 300000 + $count;
		if ($customer_count == 0) {
			echo "<script>alert('Error : Invoice Number Not Found !!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			$data_old2 = array(
				'invoice_number' => $this->input->post('invoice_number'),


			);

			$customer_count2 = $this->Common_admin_model->get_data_by_id_multiple_condition_count("invoice_match", $data_old2);
			if ($customer_count2 >= 1) {
				echo "<script>alert('Error : Invoice Number Already In Verification Process , Please Select Invoice Number From Following Talbe !!!');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {

				$data = array(
					// "barcode" => $barcode,
					"invoice_number" => $invoice_number,
					"total_stock" => $total_stock,
					"created_by" => $this->user_id,
					"created_time" => $this->current_date,
					"created_date" => $this->current_time,
				);
				// $text = "123";
				// echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=40&text=" . $text . "&print=true'/>";
				// print_r($data);

				$result = $this->Crud->insert_data("invoice_match", $data);

				$data22 = array(
					"status" => "used",

				);
				$result2 = $this->Crud->update_data_new("invoice", $data22, $invoice_number, "barcode");
				// print_r($result);
				if ($result2) {
					echo "<script>alert('Added Sucessfully');document.location='" . base_url('add_box_to_invoice_verify/') . $result . "'</script>";
				} else {
					echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			}
		}
	}
	public function match_invoice_data()
	{
		$invoice_number = $this->input->post('invoice_number');
		$data['invoice_number'] = $this->input->post('invoice_number');
		$data['invoice_id'] = $this->input->post('invoice_number');
		// $box_name = $this->input->post('box_name');
		$data_old = array(
			'invoice_number' => $this->input->post('invoice_number'),


		);

		$data['invoice'] = $this->Common_admin_model->get_data_by_id_multiple_condition("invoice", $data_old);

		// $invoice = $this->Crud->read_data("invoice");
		// if ($invoice) {
		// 	$count = count($invoice);
		// } else {
		// 	$count = 0;
		// }

		// $barcode = 300000 + $count;
		if (false) {
			echo "<script>alert('Error : Invoice Number Not Found !!');document.location='" . base_url('verify_invoice') . "'</script>";
		} else {

			$this->load->view('header');
			$this->load->view('match_invoice_data', $data);
			$this->load->view('footer');
			// $this->load->view('header');
			// $this->load->view('', $data);
			// $this->load->view('footer');
		}
	}
	public function add_customer_price()
	{
		$customer_master_id = $this->input->post('customer_master_id');
		$rate = $this->input->post('rate');
		$revision_no = $this->input->post('revision_no');
		$revision_date = $this->input->post('revision_date');
		$revision_remark = $this->input->post('revision_remark');
		$uploading_document = $this->input->post('uploading_document');
		$customer_part_id = $this->input->post('customer_part_id');
		$data = array(
			"customer_part_id" => $customer_part_id,
			// "revision_no" => $revision_no,
		);
		$check = $this->Crud->read_data_where("customer_part_rate", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if (!empty($_FILES['uploading_document']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['uploading_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('uploading_document')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					$picture4 = '';
					echo "no 1";
				}
			} else {
				$picture4 = '';
				echo "no 2";
			}

			$data = array(
				"rate" => $rate,
				"customer_master_id" => $customer_master_id,
				"revision_no" => $revision_no,
				"revision_date" => $revision_date,
				"revision_remark" => $revision_remark,
				"uploading_document" => $picture4,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("customer_part_rate", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_customer_operation()
	{
		$customer_master_id = $this->input->post('customer_master_id');
		$operation_id = $this->input->post('operation_id');
		$revision_no = $this->input->post('revision_no');
		$revision_date = $this->input->post('revision_date');
		$revision_remark = $this->input->post('revision_remark');
		$uploading_document = $this->input->post('uploading_document');
		$customer_part_id = $this->input->post('customer_part_id');
		$mfg = $this->input->post('mfg');
		$name = $this->input->post('name');
		$data = array(
			"customer_part_id" => $customer_part_id,
			// "revision_no" => $revision_no,
		);
		$check = $this->Crud->read_data_where("customer_part_rate", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {



			$data = array(
				"operation_id" => $operation_id,
				"customer_master_id" => $customer_master_id,
				"revision_no" => $revision_no,
				"revision_date" => $revision_date,
				"revision_remark" => $revision_remark,
				"mfg" => $mfg,
				"name" => $name,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("customer_part_operation", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_customer_operation_data()
	{
		// $customer_master_id = $this->input->post('customer_master_id');
		// $operation_id = $this->input->post('operation_id');
		// $revision_no = $this->input->post('revision_no');
		// $revision_date = $this->input->post('revision_date');
		// $revision_remark = $this->input->post('revision_remark');
		// $uploading_document = $this->input->post('uploading_document');
		// $customer_part_id = $this->input->post('customer_part_id');
		// $mfg = $this->input->post('mfg');
		// $name = $this->input->post('name');
		// $data = array(
		// 	"customer_part_id" => $customer_part_id,
		// 	// "revision_no" => $revision_no,
		// );
		$check = 0;
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {



			$data = array(

				"customer_part_operation_id" => $this->input->post('customer_part_operation_id'),
				"product" => $this->input->post('product'),
				"operation_name" => $this->input->post('operation_name'),
				"process" => $this->input->post('process'),
				"specification_tolerance" => $this->input->post('specification_tolerance'),
				"evalution" => $this->input->post('evalution'),
				"size" => $this->input->post('size'),
				"frequency" => $this->input->post('frequency'),

			);

			$result = $this->Crud->insert_data("customer_part_operation_data", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_job_card()
	{
		$customer_part_id = $this->input->post('customer_part_id');
		$datacheck = array(
			"customer_master_id" => $customer_part_id,
			// "revision_no" => $revision_no,
		);

		$checustomer_part_operation_data = $this->Crud->read_data_where("customer_part_operation", $datacheck);

		$datacheckcustomer_part_drawing = array(
			"customer_master_id" => $customer_part_id,
			// "revision_no" => $revision_no,
		);

		$customer_part_drawing_data = $this->Crud->read_data_where("customer_part_drawing", $datacheckcustomer_part_drawing);

		$datacheckcustomer_part_rate = array(
			"customer_part_rate" => $customer_part_id,
			// "revision_no" => $revision_no,
		);

		$customer_part_rate_data = $this->Crud->read_data_where("customer_part_rate", $datacheckcustomer_part_rate);

		$check = 0;
		if ($checustomer_part_operation_data == 0) {
			echo "<script>alert('Please Add Customer Part Operaions First, To Generate PDF');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else if ($customer_part_drawing_data == 0) {
			echo "<script>alert('Please Add Customer Part Drawing First, To Generate PDF ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else if ($customer_part_rate_data == 0) {
			echo "<script>alert('Please Add Customer Part Rate First, To Generate PDF ');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {


			$data = array(

				"customer_part_id" => $this->input->post('customer_part_id'),
				"req_qty" => $this->input->post('req_qty'),
				"created_date" => $this->current_date,
				"created_time" => $this->current_time,

			);

			$result = $this->Crud->insert_data("job_card", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}

	public function add_customer_drawing()
	{
		$customer_master_id = $this->input->post('customer_master_id');
		// $rate = $this->input->post('rate');
		$revision_no = $this->input->post('revision_no');
		$revision_date = $this->input->post('revision_date');
		$revision_remark = $this->input->post('revision_remark');
		// $uploading_document = $this->input->post('uploading_document');
		// $customer_part_id = $this->input->post('customer_part_id');
		$data = array(
			"customer_master_id" => $customer_master_id,
			// "revision_no" => $revision_no,
		);
		$check = $this->Crud->read_data_where("customer_part_drawing", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if (!empty($_FILES['drawing']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['drawing']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('drawing')) {
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
			if (!empty($_FILES['cad']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['cad']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('cad')) {
					$uploadData = $this->upload->data();
					$cad = $uploadData['file_name'];
				} else {
					$cad = '';
					echo "no 1";
				}
			} else {
				$cad = '';
				echo "no 2";
			}
			if (!empty($_FILES['model']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['model']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('model')) {
					$uploadData = $this->upload->data();
					$model = $uploadData['file_name'];
				} else {
					$model = '';
					echo "no 1";
				}
			} else {
				$model = '';
				echo "no 2";
			}

			$data = array(
				"customer_master_id" => $customer_master_id,
				"revision_no" => $revision_no,
				"revision_date" => $revision_date,
				"revision_remark" => $revision_remark,
				"drawing" => $drawing,
				"cad" => $cad,
				"model" => $model,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("customer_part_drawing", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_customer_document()
	{
		$customer_master_id = $this->input->post('customer_master_id');
		$customer_id = $this->input->post('customer_id');
		$type = $this->input->post('type');
		$document_name = $this->input->post('document_name');

		// $uploading_document = $this->input->post('uploading_document');
		// $customer_part_id = $this->input->post('customer_part_id');
		// $data = array(
		// 	"customer_master_id" => $customer_master_id,
		// 	"revision_no" => $revision_no,
		// );
		// $check = $this->Crud->read_data_where("customer_part_drawing", $data);
		$check = 0;
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if (!empty($_FILES['document']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('document')) {
					$uploadData = $this->upload->data();
					$document = $uploadData['file_name'];
				} else {
					$document = '';
					echo "no 1";
				}
			} else {
				$document = '';
				echo "no 2";
			}


			$data = array(
				"customer_master_id" => $customer_master_id,
				"customer_id" => $customer_id,
				"type" => $type,
				"document_name" => $document_name,
				"document" => $document,

				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("customer_part_documents", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}

	public function updatecustomerpartprice()
	{
		$customer_master_id = $this->input->post('customer_master_id');
		$rate = $this->input->post('rate');
		$revision_no = $this->input->post('revision_no');
		$revision_date = $this->input->post('revision_date');
		$revision_remark = $this->input->post('revision_remark');
		$uploading_document = $this->input->post('uploading_document');
		$customer_part_id = $this->input->post('customer_part_id');
		$data = array(
			"customer_part_id" => $customer_part_id,
			"revision_no" => $revision_no,
		);
		$check = $this->Crud->read_data_where("customer_part_rate", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if (!empty($_FILES['uploading_document']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['uploading_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('uploading_document')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					$picture4 = '';
					echo "no 1";
				}
			} else {
				$picture4 = '';
				echo "no 2";
			}

			$data = array(
				"rate" => $rate,
				"customer_master_id" => $customer_master_id,
				"revision_no" => $revision_no,
				"revision_date" => $revision_date,
				"revision_remark" => $revision_remark,
				"uploading_document" => $uploading_document,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("customer_part_rate", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function update_job_card()
	{
		$req_qty = $this->input->post('req_qty');
		$id = $this->input->post('id');
		// $rate = $this->input->post('rate');
		// $revision_no = $this->input->post('revision_no');
		// $revision_date = $this->input->post('revision_date');
		// $revision_remark = $this->input->post('revision_remark');
		// $uploading_document = $this->input->post('uploading_document');
		// $customer_part_id = $this->input->post('customer_part_id');
		// $data = array(
		// 	"customer_part_id" => $customer_part_id,
		// 	"revision_no" => $revision_no,
		// );
		// $check = $this->Crud->read_data_where("customer_part_rate", $data);
		$check = 0;
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			// if (!empty($_FILES['uploading_document']['name'])) {
			// 	$image_path = "./documents/";
			// 	$config['allowed_types'] = '*';
			// 	$config['upload_path'] = $image_path;
			// 	$config['file_name'] = $_FILES['uploading_document']['name'];

			// 	//Load upload library and initialize configuration
			// 	$this->load->library('upload', $config);
			// 	$this->upload->initialize($config);

			// 	if ($this->upload->do_upload('uploading_document')) {
			// 		$uploadData = $this->upload->data();
			// 		$picture4 = $uploadData['file_name'];
			// 	} else {
			// 		$picture4 = '';
			// 		echo "no 1";
			// 	}
			// } else {
			// 	$picture4 = '';
			// 	echo "no 2";
			// }

			$data = array(
				"req_qty" => $req_qty,

			);
			$result = $this->Crud->update_data("job_card", $data, $id);


			// $result = $this->Crud->insert_data("job_card", $data);
			if ($result) {
				echo "<script>alert('Update Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function update_job_card_status()
	{
		$req_qty = $this->input->post('req_qty');
		$id = $this->input->post('id');
		// $rate = $this->input->post('rate');
		// $revision_no = $this->input->post('revision_no');
		// $revision_date = $this->input->post('revision_date');
		// $revision_remark = $this->input->post('revision_remark');
		// $uploading_document = $this->input->post('uploading_document');
		// $customer_part_id = $this->input->post('customer_part_id');
		// $data = array(
		// 	"customer_part_id" => $customer_part_id,
		// 	"revision_no" => $revision_no,
		// );
		// $check = $this->Crud->read_data_where("customer_part_rate", $data);
		$check = 0;
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			// if (!empty($_FILES['uploading_document']['name'])) {
			// 	$image_path = "./documents/";
			// 	$config['allowed_types'] = '*';
			// 	$config['upload_path'] = $image_path;
			// 	$config['file_name'] = $_FILES['uploading_document']['name'];

			// 	//Load upload library and initialize configuration
			// 	$this->load->library('upload', $config);
			// 	$this->upload->initialize($config);

			// 	if ($this->upload->do_upload('uploading_document')) {
			// 		$uploadData = $this->upload->data();
			// 		$picture4 = $uploadData['file_name'];
			// 	} else {
			// 		$picture4 = '';
			// 		echo "no 1";
			// 	}
			// } else {
			// 	$picture4 = '';
			// 	echo "no 2";
			// }

			$data = array(
				"status" => "released"

			);
			$result = $this->Crud->update_data("job_card", $data, $id);


			// $result = $this->Crud->insert_data("job_card", $data);
			if ($result) {
				echo "<script>alert('Update Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function update_prod_qty()
	{
		$production_qty = $this->input->post('production_qty');
		$child_part_master_id = $this->input->post('child_part_master_id');
		$req_qty = $this->input->post('req_qty');
		$datacheck = array(
			"id" => $child_part_master_id,
			// "revision_no" => $revision_no,
		);
		$child_part_master_data = $this->Crud->get_data_by_id('child_part_master', $child_part_master_id, 'id');

		// $child_part_master_data = $this->Crud->read_data_where("child_part_master", $datacheck);
		// print_r($child_part_master_data);
		$check = 0;
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			$prev_stock = $child_part_master_data[0]->stock;
			$prev_production_qty = $child_part_master_data[0]->production_qty;
			$prev_rejection_qty = $req_qty;


			$new_rejection_caluclated_qty = $production_qty - $req_qty;

			$new_stock = $prev_stock - $production_qty;
			$production_qty = $prev_production_qty + $production_qty;
			$new_rejection_qty = $prev_rejection_qty + $new_rejection_caluclated_qty;


			$data = array(
				"stock" => $new_stock,
				"production_qty" => $production_qty,
				"rejection_prodcution_qty" => $new_rejection_qty,

			);



			$result = $this->Crud->update_data("child_part_master", $data, $child_part_master_id);
			if ($result) {
				echo "<script>alert('Update Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updatecustomerpartdrwing()
	{
		$customer_master_id = $this->input->post('customer_master_id');
		$revision_no = $this->input->post('revision_no');
		$revision_date = $this->input->post('revision_date');
		$revision_remark = $this->input->post('revision_remark');
		$cad = $this->input->post('cad');
		$model = $this->input->post('model');
		$data = array(
			"customer_master_id" => $customer_master_id,
			"revision_no" => $revision_no,
		);
		$check = $this->Crud->read_data_where("customer_part_drawing", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {

			if (!empty($_FILES['drawing']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['drawing']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('drawing')) {
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
			// if (!empty($_FILES['cad']['name'])) {
			// 	$image_path = "./documents/";
			// 	$config['allowed_types'] = '*';
			// 	$config['upload_path'] = $image_path;
			// 	$config['file_name'] = $_FILES['cad']['name'];

			// 	//Load upload library and initialize configuration
			// 	$this->load->library('upload', $config);
			// 	$this->upload->initialize($config);

			// 	if ($this->upload->do_upload('cad')) {
			// 		$uploadData = $this->upload->data();
			// 		$cad = $uploadData['file_name'];
			// 	} else {
			// 		$cad = '';
			// 		echo "no 1";
			// 	}
			// } else {
			// 	$cad = '';
			// 	echo "no 2";
			// }
			// if (!empty($_FILES['model']['name'])) {
			// 	$image_path = "./documents/";
			// 	$config['allowed_types'] = '*';
			// 	$config['upload_path'] = $image_path;
			// 	$config['file_name'] = $_FILES['model']['name'];

			// 	//Load upload library and initialize configuration
			// 	$this->load->library('upload', $config);
			// 	$this->upload->initialize($config);

			// 	if ($this->upload->do_upload('model')) {
			// 		$uploadData = $this->upload->data();
			// 		$model = $uploadData['file_name'];
			// 	} else {
			// 		$model = '';
			// 		echo "no 1";
			// 	}
			// } else {
			// 	$model = '';
			// 	echo "no 2";
			// }

			$data = array(
				"customer_master_id" => $customer_master_id,
				"revision_no" => $revision_no,
				"revision_date" => $revision_date,
				"revision_remark" => $revision_remark,
				"drawing" => $drawing,
				"cad" => $cad,
				"model" => $model,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);

			$result = $this->Crud->insert_data("customer_part_drawing", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function addStore()
	{
		$supplier_name = $this->input->post('supplier_name');
		$part = $this->input->post('part');
		$entered_date = $this->input->post('dateee');
		$invoice_amount = $this->input->post('invoice_amount');
		$po_number = $this->input->post('po_number');
		$quantity = $this->input->post('quantity');
		$invoice_number = $this->input->post('invoice_number');
		$rate = $this->input->post('rate');
		$s = "store";
		$this->db->from("store");
		$this->db->order_by("id", "desc");
		$query = $this->db->get()->result();
		$date = $this->current_date;
		$q = explode("-", $date);
		$year = $q[0];
		$year = $year . $q[1] . $q[2];
		if ($query == NULL) {
			$grn_number = $year . "-" . '1';
		} else {
			// $des =  $query->limit(1)->result();
			// print_r($des);
			$grn_number = $year . "-" . ($query[0]->id + 1);
		}
		$data = array(
			"supplier_id" => $supplier_name,
			"po_number" => $po_number,
			"supplier_invoice_number" => $invoice_number,
			"part_id" => $part,
			"quantity" => $quantity,
			"rate" => $rate,
			"grn_number" => $grn_number,
			"invoice_amount" => $invoice_amount,
			"entered_date" => $entered_date,
			"created_id" => $this->user_id,
			"date" => $this->current_date,
			"time" => $this->current_time,

		);

		$result = $this->Crud->insert_data("store", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function addissue()
	{
		$contractor = $this->input->post('contractor');
		$parttt = $this->input->post('parttt');
		$issue_date = $this->input->post('issue_date');
		$oc = $this->input->post('oc');
		$slip_details = $this->input->post('slip_details');
		$wbs = $this->input->post('wbs');
		$hus = $this->input->post('hus');
		$quantity = $this->input->post('quantity');

		$data = array(
			"contractor_id" => $contractor,
			"part_id" => $parttt,
			"oc_id" => $oc,
			"hus_id" => $hus,
			"wbs_id" => $wbs,
			"item_quantity" => $quantity,
			"slip_details" => $slip_details,
			"issue_date" => $issue_date,
			"created_id" => $this->user_id,
			"date" => $this->current_date,
			"time" => $this->current_time,

		);

		$result = $this->Crud->insert_data("issue", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}


	public function updateContractor()
	{
		$id = $this->input->post('id');

		$name = $this->input->post('ucontractorName');
		$number = $this->input->post('ucontractorCode');

		$data = array(
			"contractor_code" => $number,
		);
		$check = $this->Crud->read_data_where("contractor", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"contractor_name" => $name,
				"contractor_code" => $number,
			);
			$result = $this->Crud->update_data("contractor", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateuom()
	{
		$id = $this->input->post('id');

		$name = $this->input->post('uuomName');

		$data = array(
			"uom_name" => $name,
		);
		$check = $this->Crud->read_data_where("uom", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"uom_name" => $name,

			);
			$result = $this->Crud->update_data("uom", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updatepartType()
	{
		$id = $this->input->post('id');

		$name = $this->input->post('uparttypeName');

		$data = array(
			"part_type_name" => $name,
		);
		$check = $this->Crud->read_data_where("part_type", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"part_type_name" => $name,

			);
			$result = $this->Crud->update_data("part_type", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateCustomerType()
	{
		$id = $this->input->post('id');

		$name = $this->input->post('ucustomerPartName');

		$data = array(
			"customer_type_name" => $name,
		);
		$check = $this->Crud->read_data_where("customer_part_type", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"customer_type_name" => $name,

			);
			$result = $this->Crud->update_data("customer_part_type", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateStore()
	{
		$id = $this->input->post('id');

		$supplier_name = $this->input->post('usupplier_name');
		$part = $this->input->post('upart');
		$dateee = $this->input->post('udateee');
		$invoice_amount = $this->input->post('uinvoice_amount');
		$po_number = $this->input->post('upo_number');
		$quantity = $this->input->post('uquantity');
		$invoice_number = $this->input->post('uinvoice_number');
		$rate = $this->input->post('urate');

		$data = array(
			"supplier_id" => $supplier_name,
			"po_number" => $po_number,
			"entered_date" => $dateee,
			"supplier_invoice_number" => $invoice_number,
			"part_id" => $part,
			"quantity" => $quantity,
			"rate" => $rate,
			"invoice_amount" => $invoice_amount,


		);
		$result = $this->Crud->update_data("store", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Update');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function updateissue()
	{
		$id = $this->input->post('id');
		$contractor = $this->input->post('ucontractor');
		$part_id = $this->input->post('upart');
		$uissue_date = $this->input->post('uissue_date');
		$hus = $this->input->post('uhus');
		$oc = $this->input->post('uoc');
		$slip_details = $this->input->post('uslip_details');
		$wbs = $this->input->post('uwbs');
		$quantity = $this->input->post('uquantity');

		$data = array(
			"contractor_id" => $contractor,
			"oc_id" => $oc,
			"part_id" => $part_id,
			"hus_id" => $hus,
			"issue_date" => $uissue_date,
			"wbs_id" => $wbs,
			"item_quantity" => $quantity,
			"slip_details" => $slip_details,
		);
		$result = $this->Crud->update_data("issue", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Update');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}


	public function addConsumable()
	{
		$number = $this->input->post('partNumber');
		$description = $this->input->post('description');
		$vendor_code = $this->input->post('vendor_code');
		$data = array(
			"part_number" => $number,
		);
		$check = $this->Crud->read_data_where("consumable_item", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"part_number" => $number,
				"part_description" => $description,
				"vendor_code" => $vendor_code,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("consumable_item", $data);
			if ($result) {
				echo "<script>alert(' Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateConsumable()
	{
		$id = $this->input->post('id');
		$number = $this->input->post('upartNumber');
		$description = $this->input->post('udescription');
		$data = array(
			"part_number" => $number,
			"part_description" => $description,
		);
		$check = $this->Crud->read_data_where("consumable_item", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"part_number" => $number,
				"part_description" => $description,

			);
			$result = $this->Crud->update_data("consumable_item", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function addOtherData()
	{

		$husnumber = $this->input->post('hus_num');
		$type = $this->input->post('type');
		// if ($type == 'hus') {
		// 	$col = 'hus_number';
		// } elseif ($type == 'oc') {
		// 	$col = 'oc_number';
		// } else {
		// 	$col = 'wbs_number';
		// }

		$data = array(
			"type" => $type,
			"number" => $husnumber,
		);
		$check = $this->Crud->read_data_where("other_data", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"type" => $type,
				"number" => $husnumber,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("other_data", $data);
			if ($result) {
				echo "<script>alert(' Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function addTransport()
	{

		$weight = $this->input->post('weight');
		$c_po_so_id = $this->input->post('id');
		$transporter_name = $this->input->post('transporter_name');
		$vehicle_number = $this->input->post('vehicle_number');
		$lr_number = $this->input->post('lr_number');
		$dispatch_date = $this->input->post('dispatch_date');


		$data = array(
			"weight" => $weight,
			"c_po_so_id" => $c_po_so_id,
			"transporter_name" => $transporter_name,
			"vehicle_number" => $vehicle_number,
			"lr_number" => $lr_number,
			"dispatch_date" => $dispatch_date,
		);
		$check = $this->Crud->read_data_where("dispatch_tracking", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"weight" => $weight,
				"c_po_so_id" => $c_po_so_id,
				"transporter_name" => $transporter_name,
				"vehicle_number" => $vehicle_number,
				"lr_number" => $lr_number,
				"dispatch_date" => $dispatch_date,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("dispatch_tracking", $data);
			if ($result) {
				echo "<script>alert(' Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateTransport()
	{

		$weight = $this->input->post('uweight');
		$id = $this->input->post('uid');
		$transporter_name = $this->input->post('utransporter_name');
		$vehicle_number = $this->input->post('uvehicle_number');
		$lr_number = $this->input->post('ulr_number');
		$dispatch_date = $this->input->post('udispatch_date');


		$data = array(
			"weight" => $weight,
			"transporter_name" => $transporter_name,
			"vehicle_number" => $vehicle_number,
			"lr_number" => $lr_number,
			"dispatch_date" => $dispatch_date,
		);
		$check = $this->Crud->read_data_where("dispatch_tracking", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"weight" => $weight,
				"transporter_name" => $transporter_name,
				"vehicle_number" => $vehicle_number,
				"lr_number" => $lr_number,
				"dispatch_date" => $dispatch_date,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			// $result = $this->Crud->insert_data("dispatch_tracking", $data);
			$result = $this->Crud->update_data("dispatch_tracking", $data, $id);

			if ($result) {
				echo "<script>alert(' Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateCompletedDate()
	{

		$id = $this->input->post('comoleted_id');
		$completed_date = $this->input->post('completed_date');



		$data = array(
			"completed_date" => $completed_date,

		);
		// $result = $this->Crud->insert_data("dispatch_tracking", $data);
		$result = $this->Crud->update_data("dispatch_tracking", $data, $id);

		if ($result) {
			echo "<script>alert(' Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert(' Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}
	public function updateOtherData()
	{
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$husnumber = $this->input->post('uhus_num');

		$data = array(
			"type" => $type,
			"number" => $husnumber,
		);

		$check = $this->Crud->read_data_where("other_data", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$result = $this->Crud->update_data("other_data", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}


	public function addchildpart()
	{


		$part_number = $this->input->post('part_number');
		$part_desc = $this->input->post('part_desc');
		$part_rate = $this->input->post('part_rate');
		$saft_stk = $this->input->post('saft_stk');
		$revision_date = $this->current_date;
		$revision_no = $this->input->post('revision_no');
		$supplier_id = $this->input->post('supplier_id');
		$uom_id = $this->input->post('uom_id');
		$child_part_id = $this->input->post('child_part_id');
		$hsn_code = $this->input->post('hsn_code');
		$revision_remark = $this->input->post('revision_remark');
		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;


		$data = array(
			"part_number" => $part_number,

			"supplier_id" => $supplier_id,



		);
		$check = $this->Crud->read_data_where("child_part", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			if (!empty($_FILES['part_drawing']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['part_drawing']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('part_drawing')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					$picture4 = '';
					echo "no 1";
				}
			} else {
				$picture4 = '';
				echo "no 2";
			}

			if (!empty($_FILES['modal']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['modal']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('modal')) {
					$uploadData = $this->upload->data();
					$picture5 = $uploadData['file_name'];
				} else {
					$picture5 = '';
					echo "no 1";
				}
			} else {
				$picture5 = '';
				echo "no 2";
			}

			if (!empty($_FILES['cad_file']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['cad_file']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('cad_file')) {
					$uploadData = $this->upload->data();
					$picture6 = $uploadData['file_name'];
				} else {
					$picture6 = '';
					echo "no 1";
				}
			} else {
				$picture6 = '';
				echo "no 2";
			}



			$data = array(
				"part_number" => $part_number,
				"part_description" => $part_desc,
				"supplier_id" => $supplier_id,
				"part_rate" => $part_rate,
				"uom_id" => $uom_id,
				"safty_buffer_stk" => $saft_stk,
				"revision_no" => $revision_no,
				"child_part_id" => $child_part_id,
				"hsn_code" => $hsn_code,
				"revision_remark" => $revision_remark,
				"part_drawing" => $picture4,
				"modal_document" => $picture5,
				"cad_file" => $picture6,

				"revision_date" => $revision_date,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,


			);
			$result = $this->Crud->insert_data("child_part", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function addchildpart_supplier()
	{

		$child_part_id = $this->input->post('child_part_id');


		$array = array(
			"id" => $child_part_id,

		);

		$child_part_data = $this->Crud->get_data_by_id_multiple_condition("child_part", $array);
		$child_part_id = $this->input->post('child_part_id');
		$part_desc = $this->input->post('part_desc');
		$part_rate = $this->input->post('upart_rate');
		// $saft_stk = $this->input->post('saft_stk');
		$revision_date = $this->current_date;
		$revision_no = 1;
		$supplier_id = $this->input->post('supplier_id');
		// $uom_id = $this->input->post('uom_id');
		$child_part_id = $this->input->post('child_part_id');
		// $hsn_code = $this->input->post('hsn_code');
		$revision_remark = "first";
		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;


		$data = array(
			"part_number" => $child_part_data[0]->part_number,

			"supplier_id" => $supplier_id,



		);
		$check = $this->Crud->read_data_where("child_part_master", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {


			if (!empty($_FILES['quotation_document']['name'])) {
				$image_path = "./documents/";
				$config['allowed_types'] = '*';
				$config['upload_path'] = $image_path;
				$config['file_name'] = $_FILES['quotation_document']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('quotation_document')) {
					$uploadData = $this->upload->data();
					$picture4 = $uploadData['file_name'];
				} else {
					$picture4 = '';
					echo "no 1";
				}
			} else {
				$picture4 = '';
				echo "no 2";
			}


			$data = array(
				"part_number" => $child_part_data[0]->part_number,
				"part_description" => $child_part_data[0]->part_description,
				"supplier_id" => $supplier_id,
				"part_rate" => $part_rate,
				"uom_id" => $child_part_data[0]->uom_id,
				"revision_no" => $revision_no,
				"child_part_id" => $child_part_id,
				"revision_remark" => $revision_remark,
				"revision_date" => $revision_date,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
				"quotation_document" => $picture4,


			);
			$result = $this->Crud->insert_data("child_part_master", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updatechildpart()
	{
		$id = $this->input->post('id');

		$part_number = $this->input->post('upart_number');
		$part_desc = $this->input->post('upart_desc');
		$part_rate = $this->input->post('upart_rate');
		$saft_stk = $this->input->post('usaft_stk');
		$revision_date = $this->input->post('urevision_date');
		$revision_no = $this->input->post('urevision_no');
		$supplier_id = $this->input->post('usupplier_id');
		$uom_id = $this->input->post('uuom_id');
		$child_part_id = $this->input->post('child_part_id');
		$revision_remark = $this->input->post('revision_remark');
		$hsn_code = $this->input->post('hsn_code');

		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;


		$data = array(
			"part_number" => $part_number,

			"supplier_id" => $supplier_id,



		);
		// $check = $this->Crud->read_data_where("child_part", $data);
		// if ($check > 1) {
		// 	echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// } else {
		if (!empty($_FILES['part_drawing']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['part_drawing']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('part_drawing')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				$picture4 = '';
				echo "no 1";
			}
		} else {
			$picture4 = '';
			echo "no 2";
		}

		if (!empty($_FILES['modal']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['modal']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('modal')) {
				$uploadData = $this->upload->data();
				$picture5 = $uploadData['file_name'];
			} else {
				$picture5 = '';
				echo "no 1";
			}
		} else {
			$picture5 = '';
			echo "no 2";
		}

		if (!empty($_FILES['cad_file']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['cad_file']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('cad_file')) {
				$uploadData = $this->upload->data();
				$picture6 = $uploadData['file_name'];
			} else {
				$picture6 = '';
				echo "no 1";
			}
		} else {
			$picture6 = '';
			echo "no 2";
		}

		$data = array(
			"part_number" => $part_number,
			"part_description" => $part_desc,
			"supplier_id" => $supplier_id,
			"part_rate" => $part_rate,
			"uom_id" => $uom_id,
			"safty_buffer_stk" => $saft_stk,
			"revision_no" => $revision_no,
			"child_part_id" => $child_part_id,
			"hsn_code" => $hsn_code,
			"revision_remark" => $revision_remark,
			"part_drawing" => $picture4,
			"modal_document" => $picture5,
			"cad_file" => $picture6,

			"revision_date" => $revision_date,
			"created_id" => $this->user_id,
			"date" => $this->current_date,
			"time" => $this->current_time,


		);
		$result = $this->Crud->insert_data("child_part", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}

		//}
	}
	public function updatechildpart_supplier()
	{
		$id = $this->input->post('id');
		$array = array(
			"id" => $id,

		);

		$child_part_data = $this->Crud->get_data_by_id_multiple_condition("child_part_master", $array);

		// print_r($child_part_data);
		$part_number = $child_part_data[0]->part_number;
		$part_desc = $child_part_data[0]->part_description;

		$part_rate = $this->input->post('upart_rate');
		$revision_date = $this->input->post('urevision_date');
		$revision_no = $this->input->post('urevision_no');
		$supplier_id = $this->input->post('supplier_id');
		$uom_id = $child_part_data[0]->uom_id;
		$child_part_id = $child_part_data[0]->child_part_id;
		$revision_remark = $this->input->post('revision_remark');
		$hsn_code = $child_part_data[0]->hsn_code;
		$saft_stk = $child_part_data[0]->safty_buffer_stk;

		if (!empty($_FILES['quotation_document']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['quotation_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('quotation_document')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				$picture4 = '';
				echo "no 1";
			}
		} else {
			$picture4 = '';
			echo "no 2";
		}

		$data = array(
			"part_number" => $part_number,
			"part_description" => $part_desc,
			"supplier_id" => $supplier_id,
			"vendor_code" => $vendor_code,

			"part_rate" => $part_rate,
			"uom_id" => $uom_id,
			"safty_buffer_stk" => $saft_stk,
			"revision_no" => $revision_no,
			"child_part_id" => $child_part_id,
			"hsn_code" => $hsn_code,
			"revision_remark" => $revision_remark,
			"quotation_document" => $picture4,

			"revision_date" => $revision_date,
			"created_id" => $this->user_id,
			"date" => $this->current_date,
			"time" => $this->current_time,


		);
		$result = $this->Crud->insert_data("child_part_master", $data);
		if ($result) {
			echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}

		//}
	}

	public function addcustomerpart()
	{


		$part_number = $this->input->post('part_number');
		$part_desc = $this->input->post('part_desc');
		$qty = $this->input->post('qty');
		$vendor_code = $this->input->post('vendor_code');
		// $revision_date = $this->input->post('revision_date');
		// $revision_no = $this->input->post('revision_no');
		// $revision_remark = $this->input->post('revision_remark');

		// $customer_id = $this->input->post('customer_id');
		// $customer_part_id = $this->input->post('customer_part_id');
		// $hsn_code = $this->input->post('hsn_code');
		// $uom = $this->input->post('uom');
		// $safety_stock = $this->input->post('safety_stock');
		// $part_family = $this->input->post('part_family');
		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;


		$data = array(

			"part_number" => $part_number,


			// "customer_id" => $customer_id,



		);
		$check = $this->Crud->read_data_where("parts", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			// if (!empty($_FILES['part_drawing']['name'])) {
			// 	$image_path = "./documents/";
			// 	$config['allowed_types'] = '*';
			// 	$config['upload_path'] = $image_path;
			// 	$config['file_name'] = $_FILES['part_drawing']['name'];

			// 	//Load upload library and initialize configuration
			// 	$this->load->library('upload', $config);
			// 	$this->upload->initialize($config);

			// 	if ($this->upload->do_upload('part_drawing')) {
			// 		$uploadData = $this->upload->data();
			// 		$picture4 = $uploadData['file_name'];
			// 	} else {
			// 		$picture4 = '';
			// 		echo "no 1";
			// 	}
			// } else {
			// 	$picture4 = '';
			// 	echo "no 2";
			// }
			$data = array(
				"part_number" => $part_number,
				"part_description" => $part_desc,
				"qty" => $qty,
				"vendor_code" => $vendor_code,

				// "customer_id" => $customer_id,
				// "revision_no" => $revision_no,
				// "customer_part_id" => $customer_part_id,
				// "revision_date" => $revision_date,
				// "revision_remark" => $revision_remark,
				// "revision_remark" => $picture4,
				// "part_family" => $part_family,
				// "hsn_code" => $hsn_code,
				// "uom" => $uom,
				// "safety_stock" => $safety_stock,

				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,


			);
			$result = $this->Crud->insert_data("parts", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updatecustomerpart()
	{
		$id = $this->input->post('id');

		$part_number = $this->input->post('upart_number');
		$part_desc = $this->input->post('upart_desc');
		$revision_date = $this->input->post('urevision_date');
		$revision_no = $this->input->post('urevision_no');

		$customer_id = $this->input->post('ucustomer_id');
		$customer_part_id = $this->input->post('ucustomer_part_id');
		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;


		$data = array(
			"part_number" => $part_number,

			"customer_id" => $customer_id,



		);
		$check = $this->Crud->read_data_where("customer_part", $data);
		if ($check > 1) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"part_number" => $part_number,
				"part_description" => $part_desc,
				"customer_id" => $customer_id,
				"revision_no" => $revision_no,
				"customer_part_id" => $customer_part_id,
				"revision_date" => $revision_date,




			);
			$result = $this->Crud->update_data("customer_part", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updatechildpartNew()
	{
		$id = $this->input->post('id');

		$safty_buffer_stk = $this->input->post('usaft_stk');
		$hsn_code = $this->input->post('hsn_code');
		$child_part_id = $this->input->post('child_part_id');
		$uuom_id = $this->input->post('uuom_id');
		$part_desc = $this->input->post('part_desc');


		$data = array(
			"uom_id" => $uuom_id,

			"hsn_code" => $hsn_code,
			"safty_buffer_stk" => $safty_buffer_stk,
			"child_part_id" => $child_part_id,
			"part_description" => $part_desc,



		);



		$result = $this->Crud->update_data("child_part", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	public function addCustomer()
	{
		$customerName = $this->input->post('customerName');
		$customerLocation = $this->input->post('customerLocation');
		$customerSaddress = $this->input->post('customerSaddress');
		$paymentTerms = $this->input->post('paymentTerms');
		$customerCode = $this->input->post('customerCode');
		$state = $this->input->post('state');
		$gst_no = $this->input->post('gst_no');
		$state_no = $this->input->post('state_no');
		$vendor_code = $this->input->post('vendor_code');
		$pan_no = $this->input->post('pan_no');


		$data = array(
			"customer_code" => $customerCode,

		);
		$check = $this->Crud->read_data_where("customer", $data);
		if ($check != 0) {
			$data = array(
				"customer_name" => $customerName,

			);
			$check = $this->Crud->read_data_where("customer", $data);
			if ($check != 0) {
				echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		} else {
			$data = array(
				"customer_name" => $customerName,
				"customer_code" => $customerCode,
				"billing_address" => $customerLocation,
				"shifting_address" => $customerSaddress,
				"state" => $state,
				"gst_number" => $gst_no,
				"state_no" => $state_no,
				"vendor_code" => $vendor_code,
				"pan_no" => $pan_no,

				"payment_terms" => $paymentTerms,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("customer", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateCustomer()
	{
		$id = $this->input->post('id');

		$customerName = $this->input->post('ucustomerName');
		$customerCode = $this->input->post('ucustomerCode');
		$shiftingAddress = $this->input->post('ushiftingAddress');
		$billingaddress = $this->input->post('ubillingaddress');
		$paymentTerms = $this->input->post('upaymentTerms');
		$state = $this->input->post('ustate');
		$gst_no = $this->input->post('ugst_no');
		$state_no = $this->input->post('state_no');
		$vendor_code = $this->input->post('vendor_code');
		$pan_no = $this->input->post('pan_no');


		// $data = array(
		// 	"customer_name" => $customerName,
		// 	"customer_code" => $customerCode,

		// );
		// $check = $this->Crud->read_data_where("customer", $data);
		// if ($check != 0) {
		// echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// } else {

		$data = array(
			"customer_name" => $customerName,
			"customer_code" => $customerCode,
			"billing_address" => $billingaddress,
			"shifting_address" => $shiftingAddress,
			"state" => $state,
			"gst_number" => $gst_no,
			"payment_terms" => $paymentTerms,
			"state_no" => $state_no,
			"vendor_code" => $vendor_code,
			"pan_no" => $pan_no,

		);
		$result = $this->Crud->update_data("customer", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
		// }
	}



	public function addSupplier()
	{
		$name = $this->input->post('supplierName');
		// $number = $this->input->post('supplierNumber');
		$email = $this->input->post('supplierEmail');
		$mobile_no = $this->input->post('supplierMnumber');
		$location = $this->input->post('supplierlocation');
		$state = $this->input->post('state');
		$gst_no = $this->input->post('gst_no');
		$paymentTerms = $this->input->post('paymentTerms');

		$supplier = $this->Crud->read_data("supplier");
		$supplier_count = $this->Crud->read_data_num("supplier") + 1;
		// print_r($supplier);
		$number = "THS00000" . $supplier_count;


		$data = array(
			'supplier_name' => $name,
			'supplier_number' => $number,
		);
		$check = $this->Crud->read_data_where("supplier", $data);

		if (!empty($_FILES['nda_document']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['nda_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('nda_document')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				$picture4 = '';
				echo "no 1";
			}
		} else {
			$picture4 = '';
			echo "no 2";
		}
		if (!empty($_FILES['registration_document']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['registration_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('registration_document')) {
				$uploadData = $this->upload->data();
				$picture5 = $uploadData['file_name'];
			} else {
				$picture5 = '';
				echo "no 1";
			}
		} else {
			$picture5 = '';
			echo "no 2";
		}
		if (!empty($_FILES['other_document_1']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['other_document_1']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('other_document_1')) {
				$uploadData = $this->upload->data();
				$picture6 = $uploadData['file_name'];
			} else {
				$picture6 = '';
				echo "no 1";
			}
		} else {
			$picture6 = '';
			echo "no 2";
		}
		if (!empty($_FILES['other_document_2']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['other_document_2']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('other_document_2')) {
				$uploadData = $this->upload->data();
				$picture7 = $uploadData['file_name'];
			} else {
				$picture7 = '';
				echo "no 1";
			}
		} else {
			$picture7 = '';
			echo "no 2";
		}
		if (!empty($_FILES['other_document_3']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['other_document_3']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('other_document_3')) {
				$uploadData = $this->upload->data();
				$picture8 = $uploadData['file_name'];
			} else {
				$picture7 = '';
				echo "no 1";
			}
		} else {
			$picture8 = '';
			echo "no 2";
		}


		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				'supplier_name' => $name,
				'supplier_number' => $number,
				'email' => $email,
				"payment_terms" => $paymentTerms,
				"state" => $state,
				"gst_number" => $gst_no,
				'location' => $location,
				'mobile_no' => $mobile_no,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
				"registration_document" => $picture5,
				"nda_document" => $picture4,
				"other_document_1" => $picture6,
				"other_document_2" => $picture7,
				"other_document_3" => $picture8,
			);

			$result = $this->Crud->insert_data("supplier", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}

	public function updateSupplier()
	{
		$id = $this->input->post('id');

		$name = $this->input->post('updateName');
		$number = $this->input->post('updateNumber');
		$email = $this->input->post('updatesupplierEmail');
		$mobile_no = $this->input->post('updatesupplierMnumber');
		$location = $this->input->post('updatesupplierlocation');
		$paymentTerms = $this->input->post('upaymentTerms');
		$state = $this->input->post('ustate');
		$gst_no = $this->input->post('ugst_no');

		if (!empty($_FILES['nda_document']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['nda_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('nda_document')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
			} else {
				$picture4 = $this->input->post('nda_document_old');
				echo "no 1";
			}
		} else {
			$picture4 = $this->input->post('nda_document_old');
			echo "no 2";
		}
		if (!empty($_FILES['registration_document']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['registration_document']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('registration_document')) {
				$uploadData = $this->upload->data();
				$picture5 = $uploadData['file_name'];
			} else {
				$picture5 = $this->input->post('registration_document_old');
				echo $this->input->post('registration_document_old');
			}
		} else {
			$picture5 = $this->input->post('registration_document_old');
			echo $this->input->post('registration_document_old');
		}

		if (!empty($_FILES['other_document_1']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['other_document_1']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('other_document_1')) {
				$uploadData = $this->upload->data();
				$picture6 = $uploadData['file_name'];
			} else {
				$picture6 = $this->input->post('other_document_1_old');
				echo "no 1";
			}
		} else {
			$picture6 = $this->input->post('other_document_1_old');
			echo "no 2";
		}
		if (!empty($_FILES['other_document_2']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['other_document_2']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('other_document_2')) {
				$uploadData = $this->upload->data();
				$picture7 = $uploadData['file_name'];
			} else {
				$picture7 = $this->input->post('other_document_2_old');
				echo "no 1";
			}
		} else {
			$picture7 = $this->input->post('other_document_2_old');
			echo "no 2";
		}
		if (!empty($_FILES['other_document_3']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['other_document_3']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('other_document_3')) {
				$uploadData = $this->upload->data();
				$picture8 = $uploadData['file_name'];
			} else {
				$picture7 = $this->input->post('other_document_3_old');
				echo "no 1";
			}
		} else {
			$picture8 = $this->input->post('other_document_3_old');
			echo "no 2";
		}


		$data = array(
			'supplier_number' => $number,
			'supplier_name' => $name,
			'supplier_number' => $number,
			'email' => $email,
			'location' => $location,
			'mobile_no' => $mobile_no,
			"state" => $state,
			"gst_number" => $gst_no,
			"payment_terms" => $paymentTerms,


		);
		$check = false;
		if ($check == true) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				'supplier_name' => $name,
				'supplier_number' => $number,
				'email' => $email,
				'location' => $location,
				'mobile_no' => $mobile_no,
				"state" => $state,
				"gst_number" => $gst_no,
				"payment_terms" => $paymentTerms,
				"registration_document" => $picture5,
				"nda_document" => $picture4,
				"other_document_1" => $picture6,
				"other_document_2" => $picture7,
				"other_document_3" => $picture8,
			);
			$result = $this->Crud->update_data("supplier", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateloading_user()
	{
		$id = $this->input->post('id');

		$so_number = $this->input->post('uso_num');
		$contractor = $this->input->post('ucontractor');
		$project_number = $this->input->post('uproject_number');
		$start_date = $this->input->post('ustart_date');
		$wbs_number = $this->input->post('uwbs_number');
		$target_date = $this->input->post('utarget_date');

		$data = array(
			'so_number' => $so_number,
			'contractor' => $contractor,
			"contractor" => $contractor,
			"so_number" => $so_number,
			"project_number" => $project_number,
			"start_date" => $start_date,
			"target_date" => $target_date,
			"wbs_id" => $wbs_number,
		);
		$check = $this->Crud->read_data_where("loading_user", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$result = $this->Crud->update_data("loading_user", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert(' Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function po()
	{
		$part_id = $this->uri->segment('2');
		$data['po_details'] = $this->Crud->get_data_by_id('po_details', $part_id, 'id');
		$cust_id = $data['po_details'][0]->customer_id;
		// print_r($cust_id);
		$data['po_id'] = $this->uri->segment('2');
		$data['po_list'] = $this->Crud->read_data("po_details");
		$data['cust'] = $this->Crud->get_data_by_id('customer', $cust_id, 'id');
		// $data['list'] = $this->Crud->read_data("c_po_so");
		$data['list'] = $this->Crud->get_data_by_id('c_po_so', $part_id, 'po_id');



		// $data['operations']  = $this->Crud->read_data("operations");
		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['partNumber'] = $this->Crud->get_data_by_id("parts");

		// $data['operations'] = $this->Crud->get_data_by_id("operations", $part_id, "part_number");

		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('po_detailed_details', $data);
		$this->load->view('footer');
	}
	public function drawing_history()
	{
		$part_number = $this->uri->segment('2');
		$data['child_part_list'] = $this->Crud->get_data_by_id('child_part', $part_number, 'part_number');



		// $data['operations']  = $this->Crud->read_data("operations");
		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['partNumber'] = $this->Crud->get_data_by_id("parts");

		// $data['operations'] = $this->Crud->get_data_by_id("operations", $part_id, "part_number");

		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('drawing_history', $data);
		$this->load->view('footer');
	}
	public function price_revision()
	{
		$part_number = $this->uri->segment('2');
		$supplier_id = $this->uri->segment('3');

		$array = array(
			"part_number" => $part_number,
			"supplier_id" => $supplier_id,

		);

		$data['child_part_list'] = $this->Crud->get_data_by_id_multiple_condition("child_part_master", $array);

		// $data['child_part_list'] = $this->Crud->get_data_by_id('child_part_master', $part_number, 'part_number');



		// $data['operations']  = $this->Crud->read_data("operations");
		// $data['tool_list'] =  $this->Crud->read_data("tools");
		// $data['partNumber'] = $this->Crud->get_data_by_id("parts");

		// $data['operations'] = $this->Crud->get_data_by_id("operations", $part_id, "part_number");

		// print_r($data['tool_list']);
		$this->load->view('header');
		$this->load->view('price_revision', $data);
		$this->load->view('footer');
	}



	public function loading()
	{
		$part_id = $this->uri->segment('2');
		$data['contractor'] = $this->Crud->read_data("contractor");
		$data['po_details'] = $this->Crud->get_data_by_id('po_details', $part_id, 'id');
		$g = $data['po_details'][0]->customer_id;
		$data['cust'] = $this->Crud->get_data_by_id('customer', $g, 'id');
		$data['wbs_num'] = $this->Crud->get_data_by_id('other_data', 'wbs', 'type');
		$data['details'] = $this->Crud->get_data_by_id('loading_user', $part_id, 'po_number');

		$data['loading_details'] = $this->Crud->get_data_by_id('c_po_so', $part_id, 'po_id');
		// $cust_id = $data['po_details'][0]->customer_id;
		$data['po_id'] = $this->uri->segment('2');
		$data['po_list'] = $this->Crud->read_data("po_details");
		// $data['cust'] = $this->Crud->get_data_by_id('customer', $cust_id, 'id');
		$data['list'] = $this->Crud->get_data_by_id('c_po_so', $part_id, 'po_id');

		$this->load->view('header');
		$this->load->view('loading_detail', $data);
		$this->load->view('footer');
	}
	public function addSO()
	{
		$PO = $this->input->post('PO');
		$id = $this->input->post('pid');
		$custname = $this->input->post('custname');
		$so_number = $this->input->post('so_number');
		$so_amt = $this->input->post('so_amt');
		$so_desc = $this->input->post('so_desc');
		$so_line = $this->input->post('so_line');
		$advance_amt = $this->input->post('advance_amt');
		$advance_amt = (int)$advance_amt;
		$bank_name = null;
		$cheque_date = null;
		$payment_mode = null;
		$rtgs_cheque_number = null;



		if ($advance_amt > 0) {
			$bank_name = $this->input->post('bank_name');
			$cheque_date = $this->input->post('cheque_date');
			$payment_mode = $this->input->post('payment_mode');
			$rtgs_cheque_number = $this->input->post('rtgs_cheque_number');
		} else {
			$advance_amt = 0;
		}



		$data = array(
			"po_id" => $id,
			"so_number" => $so_number,
			"so_amt" => $so_amt,
			"so_desc" => $so_desc,
			"advance_amt" => $advance_amt,
			"so_line" => $so_line,

			"mode_of_payment" => $payment_mode,
			"bank_name" => $bank_name,
			"cheque_rtgs_number" => $rtgs_cheque_number,
			"date_of_cheque_rtgs" => $cheque_date,

		);
		$check = $this->Crud->read_data_where("c_po_so", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"po_id" => $id,
				"so_number" => $so_number,
				"so_amt" => $so_amt,
				"so_desc" => $so_desc,
				"so_line" => $so_line,
				"advance_amt" => $advance_amt,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
				"mode_of_payment" => $payment_mode,
				"bank_name" => $bank_name,
				"cheque_rtgs_number" => $rtgs_cheque_number,
				"date_of_cheque_rtgs" => $cheque_date,
			);
			$result = $this->Crud->insert_data("c_po_so", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateSO()
	{
		$PO = $this->input->post('PO');
		$id = $this->input->post('id');
		$so_number = $this->input->post('uso_number');
		$so_amt = $this->input->post('uso_amt');
		$so_desc = $this->input->post('uso_desc');
		$so_line = $this->input->post('uso_line');
		$advance_amt = $this->input->post('uadvance_amt');
		$advance_amt = (int)$advance_amt;
		$bank_name = null;
		$cheque_date = null;
		$payment_mode = null;
		$rtgs_cheque_number = null;



		if ($advance_amt > 0) {
			$bank_name = $this->input->post('ubank_name');
			$cheque_date = $this->input->post('ucheque_date');
			$payment_mode = $this->input->post('upayment_mode');
			$rtgs_cheque_number = $this->input->post('urtgs_cheque_number');
		} else {
			$advance_amt = 0;
		}



		$data = array(
			"so_number" => $so_number,
			"so_amt" => $so_amt,
			"so_desc" => $so_desc,
			"advance_amt" => $advance_amt,
			"so_line" => $so_line,

			"mode_of_payment" => $payment_mode,
			"bank_name" => $bank_name,
			"cheque_rtgs_number" => $rtgs_cheque_number,
			"date_of_cheque_rtgs" => $cheque_date,

		);
		$check = $this->Crud->read_data_where("c_po_so", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"so_number" => $so_number,
				"so_amt" => $so_amt,
				"so_desc" => $so_desc,
				"so_line" => $so_line,
				"advance_amt" => $advance_amt,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
				"mode_of_payment" => $payment_mode,
				"bank_name" => $bank_name,
				"cheque_rtgs_number" => $rtgs_cheque_number,
				"date_of_cheque_rtgs" => $cheque_date,
			);
			$result = $this->Crud->update_data("c_po_so", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Update');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateBankDetails()
	{
		$id = $this->input->post('idd');

		$advance_amt = $this->input->post('uadvance_amt');
		$advance_amt = (int)$advance_amt;
		$bank_name = null;
		$cheque_date = null;
		$payment_mode = null;
		$rtgs_cheque_number = null;



		if ($advance_amt > 0) {
			$bank_name = $this->input->post('ubank_name');
			$cheque_date = $this->input->post('ucheque_date');
			$payment_mode = $this->input->post('upayment_mode');
			$rtgs_cheque_number = $this->input->post('urtgs_cheque_number');
		} else {
			$advance_amt = 0;
		}



		$data = array(

			"advance_amt" => $advance_amt,
			"mode_of_payment" => $payment_mode,
			"bank_name" => $bank_name,
			"cheque_rtgs_number" => $rtgs_cheque_number,
			"date_of_cheque_rtgs" => $cheque_date,

		);
		$check = $this->Crud->read_data_where("c_po_so", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(

				"advance_amt" => $advance_amt,

				"mode_of_payment" => $payment_mode,
				"bank_name" => $bank_name,
				"cheque_rtgs_number" => $rtgs_cheque_number,
				"date_of_cheque_rtgs" => $cheque_date,
			);
			$result = $this->Crud->update_data("c_po_so", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Update');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updateBankDetails2()
	{
		$id = $this->input->post('idd');
		$id_balance = $this->input->post('balance_idd');


		$bank_name = $this->input->post('ubank_name');
		$balance_amount = $this->input->post('balance_amount');
		$cheque_date = $this->input->post('ucheque_date');
		$payment_mode = $this->input->post('upayment_mode');
		$balanceee_amountt = $this->input->post('balanceee_amountt');
		$rtgs_cheque_number = $this->input->post('urtgs_cheque_number');


		$chengee = $balanceee_amountt - $balance_amount;
		$tata = array(
			'balance_amount' => $chengee,
		);
		$data = array(

			//		"advance_amt" => $advance_amt,

			"mode_payment_final" => $payment_mode,
			"amount_paid" => $balance_amount,
			"bank_name_final_payment" => $bank_name,
			"cheque_rtgs_number_final_pay" => $rtgs_cheque_number,
			"date_of_cheque_rtgs_final_pay" => $cheque_date,
		);
		$result = $this->Crud->update_data("c_po_so", $data, $id);
		if ($result) {
			$result11 = $this->Crud->update_data("bill_tracking", $tata, $id_balance);

			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Unable to Update');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
	}

	public function addLoadingUser()
	{
		$contractor = $this->input->post('contractor');
		$po_id = $this->input->post('PO');
		$so_number = $this->input->post('so_number');
		$project_number = $this->input->post('project_number');
		$start_date = $this->input->post('start_date');
		$wbs_number = $this->input->post('wbs_number');
		$target_date = $this->input->post('target_date');



		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;

		$data = array(
			"contractor" => $contractor,
			"so_number" => $so_number,
			"po_number" => $po_id,
			"project_number" => $project_number,
			"start_date" => $start_date,
			"target_date" => $target_date,
			"wbs_id" => $wbs_number,

		);
		$check = $this->Crud->read_data_where("loading_user", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"contractor" => $contractor,
				"so_number" => $so_number,
				"po_number" => $po_id,
				"project_number" => $project_number,
				"start_date" => $start_date,
				"target_date" => $target_date,
				"wbs_id" => $wbs_number,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("loading_user", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function addbilling_track()
	{
		$po_so_num = $this->input->post('po_so_num');
		$advance_amt = $this->input->post('advance_amt');
		$invoice_number = $this->input->post('invoice_number');
		$invoice_amount = $this->input->post('invoice_amt');
		$invoice_date = $this->input->post('invoice_date');
		$tds_amount = $this->input->post('tds_amount');
		$less_tds_amount = $this->input->post('less_tds_amount');
		$stv_number = $this->input->post('stv_number');
		$stv_amount = $this->input->post('stv_amount');
		$datee = $this->input->post('datee');
		$statement_of_booking = $this->input->post('statement_of_booking');
		$payment_due_date_mk = $this->input->post('payment_due_date_mk');
		$payment_due_date_customer = $this->input->post('payment_due_date_customer');

		$balance_amount = $invoice_amount - $advance_amt;


		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;

		$data = array(

			"c_po_so_id" => $po_so_num,
			"invoice_number" => $invoice_number,
			"invoice_date" => $invoice_date,
			"invoice_amount" => $invoice_amount,
			"tds_amount" => $tds_amount,
			"less_tds_amount" => $less_tds_amount,
			"stv_number" => $stv_number,
			"balance_amount" => $balance_amount,
			"date" => $datee,
			"statement_booking_amount" => $statement_of_booking,
			"payment_due_date_mk" => $payment_due_date_mk,
			"stv_amount" => $stv_amount,
			"payment_due_date_customer" => $payment_due_date_customer,

		);
		$check = $this->Crud->read_data_where("bill_tracking", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(

				"c_po_so_id" => $po_so_num,
				"invoice_number" => $invoice_number,
				"invoice_date" => $invoice_date,
				"invoice_amount" => $invoice_amount,
				"tds_amount" => $tds_amount,
				"less_tds_amount" => $less_tds_amount,
				"stv_number" => $stv_number,
				"balance_amount" => $balance_amount,
				"date" => $datee,
				"statement_booking_amount" => $statement_of_booking,
				"payment_due_date_mk" => $payment_due_date_mk,
				"stv_amount" => $stv_amount,
				"payment_due_date_customer" => $payment_due_date_customer,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("bill_tracking", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updatebilling_track()
	{
		$id = $this->input->post('update_id');
		$po_so_num = $this->input->post('upo_so_num');
		$invoice_number = $this->input->post('uinvoice_number');
		$invoice_amount = $this->input->post('uinvoice_amt');
		$invoice_date = $this->input->post('uinvoice_date');
		$tds_amount = $this->input->post('utds_amount');
		$less_tds_amount = $this->input->post('uless_tds_amount');
		$stv_number = $this->input->post('ustv_number');
		$stv_amount = $this->input->post('ustv_amount');
		$datee = $this->input->post('udatee');
		$statement_of_booking = $this->input->post('ustatement_of_booking');
		$payment_due_date_mk = $this->input->post('upayment_due_date_mk');
		$payment_due_date_customer = $this->input->post('upayment_due_date_customer');




		// $customer_id = $this->Crud->get_data_by_id('customer', $customerName, 'id');

		// $customer_id = $customer_id[0]->id;

		$data = array(

			"c_po_so_id" => $po_so_num,
			"invoice_number" => $invoice_number,
			"invoice_date" => $invoice_date,
			"invoice_amount" => $invoice_amount,
			"tds_amount" => $tds_amount,
			"less_tds_amount" => $less_tds_amount,
			"stv_number" => $stv_number,
			"date" => $datee,
			"statement_booking_amount" => $statement_of_booking,
			"payment_due_date_mk" => $payment_due_date_mk,
			"stv_amount" => $stv_amount,
			"payment_due_date_customer" => $payment_due_date_customer,

		);
		$check = $this->Crud->read_data_where("bill_tracking", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(

				"c_po_so_id" => $po_so_num,
				"invoice_number" => $invoice_number,
				"invoice_date" => $invoice_date,
				"invoice_amount" => $invoice_amount,
				"tds_amount" => $tds_amount,
				"less_tds_amount" => $less_tds_amount,
				"stv_number" => $stv_number,
				"date" => $datee,
				"statement_booking_amount" => $statement_of_booking,
				"payment_due_date_mk" => $payment_due_date_mk,
				"stv_amount" => $stv_amount,
				"payment_due_date_customer" => $payment_due_date_customer,

			);
			$result = $this->Crud->update_data("bill_tracking", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Not Updated');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function get_id()
	{
		// echo "hi";
		// echo "<script>alert('Added Sucessfully');</script>";

		$c_po_so_id = $this->input->post('iddd');
		//  echo "<script>alert($c_po_so_id);</script>";

		$so_po_id = $this->Crud->get_data_by_id("child_part", $c_po_so_id, "id");
		// $po_id = $this->Crud->get_data_by_id("po_details", $so_po_id[0]->po_id, "id");
		// $customer = $this->Crud->get_data_by_id("customer", $po_id[0]->customer_id, "id");

		$result_name = array(
			"part_name" => $so_po_id[0]->part_description,
			"revision_date" => $so_po_id[0]->revision_date,
			"revision_no" => $so_po_id[0]->revision_no,
			"price" => $so_po_id[0]->part_rate,
		);
		$json = json_encode($result_name);
		echo $json;
	}
	public function get_id_supplier()
	{
		// echo "hi";
		// echo "<script>alert('Added Sucessfully');</script>";

		$supplier_ajax_id = $this->input->post('idd1');
		//  echo "<script>alert($supplier_ajax_id);</script>";

		$supplier_ajax_id1 = $this->Crud->get_data_by_id("supplier", $supplier_ajax_id, "id");
		// $po_id = $this->Crud->get_data_by_id("po_details", $so_po_id[0]->po_id, "id");
		// $customer = $this->Crud->get_data_by_id("customer", $po_id[0]->customer_id, "id");

		$result_name1 = array(
			"payment_terms" => $supplier_ajax_id1[0]->payment_terms,
			"gstn" => $supplier_ajax_id1[0]->gst_number,
			"location" => $supplier_ajax_id1[0]->location,
			// "revision_no" => $supplier_ajax_id[0]->revision_no,
			// "price" => $supplier_ajax_id[0]->part_rate,
		);
		$json = json_encode($result_name1);
		echo $json;
	}



	public function bom()
	{

		$data['id'] = $this->uri->segment('2');
		$customer_id = $this->uri->segment('2');
		$data['customer_id'] = $this->uri->segment('2');

		// $data['customer_part_list'] = $this->Crud->read_data("customer_part");
		$data['customers_part_type'] = $this->Crud->read_data("customer_part_type");
		$data['customers'] = $this->Crud->read_data("customer");
		$data['customer_part'] = $this->Crud->read_data("customer_part");
		$data['operations'] = $this->Crud->read_data("operations");
		// $data['customer_part_list'] = "";

		$role_management_data = $this->db->query('SELECT DISTINCT customer_master_id,operation_id FROM `customer_part_operation`  ORDER BY `id` DESC');
		$data['customer_part_rate'] = $role_management_data->result();

		$data['customer'] = $this->Crud->get_data_by_id("customer_part", $data['id'], "id");

		$data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['bom_list'] = $this->Crud->read_data("bom");
		$data['bom_list'] = $this->Crud->get_data_by_id("bom", $data['id'], "customer_part_id");





		$this->load->view('header');
		$this->load->view('bom', $data);
		$this->load->view('footer');
	}
	public function bom_by_id()
	{

		$data['customer_part_id'] = $this->uri->segment('2');


		$data['customer'] = $this->Crud->get_data_by_id("customer_part", $data['customer_part_id'], "id");

		$data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['bom_list'] = $this->Crud->read_data("bom");
		$data['bom_list'] = $this->Crud->get_data_by_id("bom", $data['customer_part_id'], "customer_part_id");





		$this->load->view('header');
		$this->load->view('bom_by_id', $data);
		$this->load->view('footer');
	}
	public function new_po()
	{

		$data['id'] = $this->uri->segment('2');
		$data['customer'] = $this->Crud->get_data_by_id("customer_part", $data['id'], "id");

		$data['supplier'] = $this->Crud->read_data("supplier");
		$data['customer_part_list'] = $this->Crud->read_data("customer_part");
		// $data['bom_list'] = $this->Crud->read_data("bom");
		$data['bom_list'] = $this->Crud->get_data_by_id("bom", $data['id'], "customer_part_id");





		$this->load->view('header');
		$this->load->view('new_po', $data);
		$this->load->view('footer');
	}
	public function addbom()
	{

		$customer_part_id = $this->input->post('customer_part_id');
		$child_part_id = $this->input->post('child_part_id');
		$quantity = $this->input->post('quantity');
		$data = array(

			"customer_part_id" => $customer_part_id,
			"child_part_id" => $child_part_id,


		);
		$check = $this->Crud->read_data_where("bom", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(

				"customer_part_id" => $customer_part_id,
				"child_part_id" => $child_part_id,
				"quantity" => $quantity,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,

			);
			$result = $this->Crud->insert_data("bom", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function updatebom()
	{
		$id = $this->input->post('id');
		$customer_id = $this->input->post('customer_id');
		$customer_part_id = $this->input->post('customer_part_id');
		$child_part_id = $this->input->post('child_part_id');
		$quantity = $this->input->post('quantity');
		$data = array(

			"customer_part_id" => $customer_part_id,
			"child_part_id" => $child_part_id,

		);
		$check = $this->Crud->read_data_where("bom", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(

				"customer_part_id" => $customer_id,
				"child_part_id" => $child_part_id,
				"quantity" => $quantity,
				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,

			);
			$result = $this->Crud->update_data("bom", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}


	public function add_part()
	{
		// echo 'yes';
		$id = $this->input->post('uid');
		$table = $this->input->post('table_name');
		$col_name = $this->input->post('column_name');

		if (!empty($_FILES['cad_file']['name'])) {
			$image_path = "./documents/";
			$config['allowed_types'] = '*';
			$config['upload_path'] = $image_path;
			$config['file_name'] = $_FILES['cad_file']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('cad_file')) {
				$uploadData = $this->upload->data();
				$picture4 = $uploadData['file_name'];
				$data = array(
					$col_name => $picture4,
				);
				$result = $this->Crud->update_data($table, $data, $id);

				// echo "yes";	
				if ($result) {
					echo "<script>alert(' uploaded Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
				}
			} else {
				$picture4 = '';
				echo "no 1";
			}
		} else {
			$picture4 = '';
			echo "no 2";
		}
	}

	public function purchase_order()
	{
		$data['child_part_list'] = $this->Crud->read_data("child_part");
		$data['purchase_order_list'] = $this->Crud->read_data("purchase_order");
		$data['uom'] = $this->Crud->read_data("uom");
		$data['client_list'] = $this->Crud->read_data("client");
		$data['gst_list'] = $this->Crud->read_data("gst_structure");


		$data['supplier_list'] = $this->Crud->read_data("supplier");
		$data['customer_list'] = $this->Crud->read_data("customer");
		$data['part_type_list'] = $this->Crud->read_data("part_type");



		$this->load->view('header');
		$this->load->view('purchase_order', $data);
		$this->load->view('footer');
	}



	public function addPurchaseOrder()
	{
		// $po_number = $this->input->post('po_number');
		$part_number = $this->input->post('part_number');
		$delivery_date = $this->input->post('delivery_date');
		$supplier_name = $this->input->post('supplier_name');
		$remark = $this->input->post('remark');
		$po_v_date = $this->input->post('po_v_date');
		$part_type = $this->input->post('part_type');
		$quantity = $this->input->post('quantity');
		$uom_id = $this->input->post('uom_id');
		$shipping = $this->input->post('shipping');
		$cgst = $this->input->post('cgst');
		$sgst = $this->input->post('sgst');
		$igst = $this->input->post('igst');
		$this->db->from("purchase_order");
		$this->db->order_by("id", "desc");

		$query = $this->db->get()->result();

		// print_r($query);
		$date = $this->current_date;
		$q = explode("-", $date);
		$year = $q[0];
		$year = $year . $q[1] . $q[2];
		if ($query == NULL) {
			$po_number = $year . "-" . '1';
		} else {

			$t = $query[0]->id;
			$t = $t + 1;
			// $des =  $query->limit(1)->result();
			// print_r($des);
			$po_number = $year . "-" . $t;
		}

		$data = array(

			"part_id" => $part_number,
			"supplier_id" => $supplier_name,

		);
		$check = $this->Crud->read_data_where("purchase_order", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"po_number" => $po_number,
				"part_id" => $part_number,
				"supplier_id" => $supplier_name,
				"uom_id" => $uom_id,
				"quantity" => $quantity,
				"cgst_id" => $cgst,
				"sgst_id" => $sgst,
				"igst_id" => $igst,
				"delivery_date" => $delivery_date,
				"part_type_id" => $part_type,
				"po_validity_date" => $po_v_date,
				"remark" => $remark,
				"shipping_method" => $shipping,

				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("purchase_order", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}



	public function updatePurchaseOrder()
	{
		$id = $this->input->post('id');
		$part_number = $this->input->post('upart_number');
		$delivery_date = $this->input->post('udelivery_date');
		$supplier_name = $this->input->post('usupplier_name');
		$remark = $this->input->post('uremark');
		$po_v_date = $this->input->post('upo_v_date');
		$part_type = $this->input->post('upart_type');
		$quantity = $this->input->post('uquantity');
		$uom_id = $this->input->post('uuom_id');
		$shipping = $this->input->post('ushipping');
		// $this->db->from("purchase_order");
		// $this->db->order_by("id", "desc");
		// $query = $this->db->get()->result();
		// $t = $query[0]->id;
		// $t = $t + 1;
		// // print_r($query);
		// $date = $this->current_date;
		// $q = explode("-", $date);
		// $year = $q[0];
		// $year = $year . $q[1] . $q[2];
		// if ($query == NULL) {
		// 	$po_number = $year . "-" . '1';
		// } else {
		// 	// $des =  $query->limit(1)->result();
		// 	// print_r($des);
		// 	$po_number = $year . "-" . $t;
		// }

		// $data = array(
		// 	"po_number" => $po_number,

		// );
		// $check = $this->Crud->read_data_where("purchase_order", $data);
		// if ($check != 0) {
		// 	echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		// } else {
		$data = array(
			// "po_number" => $po_number,
			"part_id" => $part_number,
			"supplier_id" => $supplier_name,
			"uom_id" => $uom_id,
			"quantity" => $quantity,
			"delivery_date" => $delivery_date,
			"part_type_id" => $part_type,
			"po_validity_date" => $po_v_date,
			"remark" => $remark,
			"shipping_method" => $shipping,

			"created_id" => $this->user_id,
			"date" => $this->current_date,
			"time" => $this->current_time,
		);
		$result = $this->Crud->update_data("purchase_order", $data, $id);
		if ($result) {
			echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		}
		// }
	}





	public function client()
	{
		$data['client_list'] = $this->Crud->read_data("client");


		$this->load->view('header');
		$this->load->view('client', $data);
		$this->load->view('footer');
	}


	public function addClient()
	{
		$clientName = $this->input->post('clientName');
		$contactPerson = $this->input->post('contactPerson');
		$clientSaddress = $this->input->post('clientSaddress');
		$clientBaddress = $this->input->post('clientBaddress');
		$gst_no = $this->input->post('gst_no');
		$phone_no = $this->input->post('phone_no');


		$data = array(
			"client_name" => $clientName,
			"gst_number" => $gst_no,

		);
		$check = $this->Crud->read_data_where("client", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				" client_name " => $clientName,
				"contact_person" => $contactPerson,
				"billing_address" => $clientBaddress,
				"shifting_address" => $clientSaddress,
				"gst_number" => $gst_no,
				"phone_no" => $phone_no,

				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("client", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
	public function add_new_po()
	{
		$clientName = $this->input->post('clientName');
		$contactPerson = $this->input->post('contactPerson');
		$clientSaddress = $this->input->post('clientSaddress');
		$clientBaddress = $this->input->post('clientBaddress');
		$gst_no = $this->input->post('gst_no');
		$phone_no = $this->input->post('phone_no');


		$data = array(
			"client_name" => $clientName,
			"gst_number" => $gst_no,

		);
		$check = $this->Crud->read_data_where("client", $data);
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				" client_name " => $clientName,
				"contact_person" => $contactPerson,
				"billing_address" => $clientBaddress,
				"shifting_address" => $clientSaddress,
				"gst_number" => $gst_no,
				"phone_no" => $phone_no,

				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->insert_data("client", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}


	public function updateClient()
	{
		$clientName = $this->input->post('uclientName');
		$contactPerson = $this->input->post('ucontactPerson');
		$clientSaddress = $this->input->post('uclientSaddress');
		$clientBaddress = $this->input->post('uclientBaddress');
		$gst_no = $this->input->post('ugst_no');
		$phone_no = $this->input->post('uphone_no');

		$id = $this->input->post('id');

		// $data = array(
		// 	"client_name" => $clientName,
		// 	"gst_number" => $gst_no,

		// );
		$check = 0;
		if ($check != 0) {
			echo "<script>alert('Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				" client_name " => $clientName,
				"contact_person" => $contactPerson,
				"billing_address" => $clientBaddress,
				"shifting_address" => $clientSaddress,
				"gst_number" => $gst_no,
				"phone_no" => $phone_no,

				"created_id" => $this->user_id,
				"date" => $this->current_date,
				"time" => $this->current_time,
			);
			$result = $this->Crud->update_data("client", $data, $id);
			if ($result) {
				echo "<script>alert('Updated Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Not Added');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}




	public function add_gst()
	{
		$code = $this->input->post('code');
		$cgst = $this->input->post('cgst');
		$sgst = $this->input->post('sgst');
		$igst = $this->input->post('igst');
		$data = array(
			"code" => $code,
		);
		$check = $this->Crud->read_data_where("gst_structure", $data);
		if ($check != 0) {
			echo "<script>alert('TAX Code Already Exists');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
		} else {
			$data = array(
				"code" => $code,
				"cgst" => $cgst,
				"sgst" => $sgst,
				"igst" => $igst,
				"created_by" => $this->user_id,
				"created_date" => $this->current_date,
			);

			$result = $this->Crud->insert_data("gst_structure", $data);
			if ($result) {
				echo "<script>alert('Added Sucessfully');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			} else {
				echo "<script>alert('Unable to Add');document.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
			}
		}
	}
}
