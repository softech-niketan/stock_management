<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome/login';
$route['login'] = 'welcome/login';
$route['logout'] = 'welcome/logout';


$route['index'] = 'welcome/index';
$route['part_master'] = 'welcome/part_master';
$route['part_stock'] = 'welcome/part_stock';
$route['gate_out_report'] = 'welcome/gate_out_report';
$route['create_packing'] = 'welcome/create_packing';
$route['create_packing_bulk'] = 'welcome/create_packing_bulk';
$route['create_box'] = 'welcome/create_box';
$route['create_invoice'] = 'welcome/create_invoice';
$route['verify_invoice'] = 'welcome/verify_invoice';
$route['create_packing_data'] = 'welcome/create_packing_data';
$route['create_packing_data_bulk'] = 'welcome/create_packing_data_bulk';
$route['view_packing'] = 'welcome/view_packing';
$route['view_batch_code'] = 'welcome/view_batch_code';
$route['upload_batch_document'] = 'welcome/upload_batch_document';
$route['view_packing_by_id/(:any)'] = 'welcome/view_packing_by_id';
$route['add_packing_to_box/(:any)'] = 'welcome/add_packing_to_box';
$route['add_box_to_invoice/(:any)'] = 'welcome/add_box_to_invoice';
$route['add_box_to_invoice_verify/(:any)'] = 'welcome/add_box_to_invoice_verify';
$route['add_box_packing_data'] = 'welcome/add_box_packing_data';
$route['add_invoice_box_data'] = 'welcome/add_invoice_box_data';
$route['add_invoice_box_data_match'] = 'welcome/add_invoice_box_data_match';
$route['add_invoice_box_data_invoice_box_match'] = 'welcome/add_invoice_box_data_invoice_box_match';

$route['delete'] = 'welcome/delete';
$route['delete_po'] = 'welcome/delete_po';
$route['signin'] = 'welcome/signin';
$route['return_invoice'] = 'welcome/return_invoice';
$route['delete_invoice'] = 'welcome/delete_invoice';
// $route['delete'] = 'welcome/delete';


$route['customer'] = 'welcome/customer';
$route['customer_master'] = 'welcome/customer_master';
$route['inwarding'] = 'welcome/inwarding';
$route['inwarding_by_po'] = 'welcome/inwarding_by_po';
$route['inwarding_po_check'] = 'welcome/inwarding_po_check';
$route['uom'] = 'welcome/uom';
$route['part_type'] = 'welcome/part_type';
$route['adduom'] = 'welcome/adduom';
$route['add_box'] = 'welcome/add_box';
$route['add_invoice_data'] = 'welcome/add_invoice_data';
$route['add_invoice_data_match'] = 'welcome/add_invoice_data_match';
$route['match_invoice_data'] = 'welcome/match_invoice_data';

$route['addpartType'] = 'welcome/addpartType';
$route['updatepartType'] = 'welcome/updatepartType';
$route['change_box_status'] = 'welcome/change_box_status';
$route['change_invoice_status'] = 'welcome/change_invoice_status';
$route['updateuom'] = 'welcome/updateuom';

//s


//new controller

$route['generate_new_po'] = 'Newcontroller/generate_new_po';
$route['view_new_po_by_id/(:any)'] = 'Newcontroller/view_new_po_by_id';
$route['inwarding_invoice/(:any)'] = 'Welcome/inwarding_invoice';
$route['view_planing_data/(:any)'] = 'Welcome/view_planing_data';
$route['inwarding_details/(:any)/(:any)/(:any)'] = 'Welcome/inwarding_details';
$route['inwarding_details_validation/(:any)/(:any)/(:any)'] = 'Welcome/inwarding_details_validation';
$route['inwarding_details_accept_reject/(:any)/(:any)/(:any)'] = 'Welcome/inwarding_details_accept_reject';
$route['add_po_parts'] = 'Newcontroller/add_po_parts';
$route['add_grn_qty'] = 'Newcontroller/add_grn_qty';
$route['update_grn_qty'] = 'Newcontroller/update_grn_qty';
$route['update_grn_qty_accept_reject'] = 'Newcontroller/update_grn_qty_accept_reject';
$route['update_status_grn_inwarding'] = 'Newcontroller/update_status_grn_inwarding';
$route['accept_inwarding_data'] = 'Newcontroller/accept_inwarding_data';
$route['validate_invoice_amount'] = 'Newcontroller/validate_invoice_amount';
$route['add_invoice_number'] = 'Newcontroller/add_invoice_number';
$route['update_po_parts'] = 'Newcontroller/update_po_parts';
$route['accept_po'] = 'Newcontroller/accept_po';
$route['new_po_list_supplier'] = 'Newcontroller/new_po_list_supplier';
$route['view_po_by_supplier_id/(:any)'] = 'Newcontroller/view_po_by_supplier_id';
$route['pending_po'] = 'Newcontroller/pending_po';
$route['update_drawing'] = 'Newcontroller/update_drawing';
$route['add_planning_data'] = 'Newcontroller/add_planning_data';
$route['part_document/(:any)/(:any)/(:any)'] = 'Welcome/part_document_by_name';



$route['bom'] = 'welcome/bom';
$route['new_po'] = 'welcome/new_po';
$route['add_new_po'] = 'welcome/add_new_po';
$route['addbom'] = 'welcome/addbom';
$route['updatebom'] = 'welcome/updatebom';


$route['add_part'] = 'welcome/add_part';

//routing

$route['routing'] = 'welcome/routing';

$route['purchase_order'] = 'welcome/purchase_order';
$route['planning_year_page'] = 'welcome/planning_year_page';
$route['planing_data/(:any)/(:any)/(:any)'] = 'welcome/planing_data';
$route['planing_data_month/(:any)'] = 'welcome/planing_data_month';
$route['addPurchaseOrder'] = 'welcome/addPurchaseOrder';
$route['updatePurchaseOrder'] = 'welcome/updatePurchaseOrder';
// $route['add_part'] = 'welcome/add_part';

// $route['generatepdf/(:any)'] = 'PdfController/planning';

$route['download_my_pdf/(:any)'] = 'PdfController/generate_invoice';

$route['gst'] = 'welcome/gst';
$route['add_gst'] = 'welcome/add_gst';



$route['pdfg'] = 'welcome/pdfg';



$route['child_part'] = 'welcome/child_part';
$route['child_part_supplier'] = 'welcome/child_part_supplier';
$route['child_part_documents'] = 'welcome/child_part_documents';
$route['part_stocks'] = 'welcome/part_stocks';
$route['addchildpart'] = 'welcome/addchildpart';
$route['addchildpart_supplier'] = 'welcome/addchildpart_supplier';
$route['updatechildpart'] = 'welcome/updatechildpart';
$route['updatechildpartNew'] = 'welcome/updatechildpartNew';
$route['updatechildpart_supplier'] = 'welcome/updatechildpart_supplier';


$route['update_part_drawings'] = 'Welcome/update_part_drawings';


$route['view_history_part/(:any)'] = 'Welcome/view_history_part';


//part creation
$route['add_part_creation'] = 'Welcome/add_part_creation';
$route['add_part_creation2'] = 'Welcome/add_part_creation2';


$route['customer_part'] = 'welcome/customer_part';
$route['customer_part/(:any)'] = 'welcome/customer_part_by_id';
$route['customer_part_documents/(:any)'] = 'welcome/customer_part_documents_by_id';
$route['customer_part_price/(:any)'] = 'welcome/customer_part_price_by_id';
$route['customer_part_operation/(:any)'] = 'welcome/customer_part_operation_by_id';
$route['customer_part_drawing/(:any)'] = 'welcome/customer_part_drawing';



$route['addcustomerpart'] = 'welcome/addcustomerpart';
$route['updatecustomerpart'] = 'welcome/updatecustomerpart';
$route['updatecustomerpartprice'] = 'welcome/updatecustomerpartprice';
$route['updatecustomerpartdrwing'] = 'welcome/updatecustomerpartdrwing';
$route['update_part_document_individual'] = 'welcome/update_part_document_individual';
$route['view_part_rate_history/(:any)'] = 'welcome/view_part_rate_history';
$route['view_part_drawing_history/(:any)'] = 'welcome/view_part_drawing_history';
$route['view_part_operation_history/(:any)/(:any)'] = 'welcome/view_part_operation_history';

$route['customer_price'] = 'welcome/customer_price';
$route['add_customer_price'] = 'welcome/add_customer_price';
$route['add_customer_operation'] = 'welcome/add_customer_operation';
$route['add_customer_drawing'] = 'welcome/add_customer_drawing';
$route['add_customer_document'] = 'welcome/add_customer_document';
$route['add_operation_details/(:any)'] = 'welcome/add_operation_details';
$route['add_customer_operation_data'] = 'welcome/add_customer_operation_data';
$route['add_job_card'] = 'welcome/add_job_card';
$route['view_job_card_details/(:any)'] = 'welcome/view_job_card_details';
$route['view_job_card_details_released/(:any)'] = 'welcome/view_job_card_details_released';
$route['generate_job_card/(:any)'] = 'PdfController/generate_job_card';
$route['job_card'] = 'welcome/job_card';
$route['job_card_released'] = 'welcome/job_card_released';
$route['update_prod_qty'] = 'welcome/update_prod_qty';






$route['bom/(:any)'] = 'welcome/bom';
$route['bom_by_id/(:any)'] = 'welcome/bom_by_id';
$route['drawing_history/(:any)'] = 'welcome/drawing_history';
$route['price_revision/(:any)/(:any)'] = 'welcome/price_revision';



$route['customer_part_type'] = 'welcome/customer_part_type';
$route['addCustomerType'] = 'welcome/addCustomerType';
$route['updateCustomerType'] = 'welcome/updateCustomerType';

$route['addCustomer'] = 'welcome/addCustomer';
$route['updateCustomer'] = 'welcome/updateCustomer';

$route['grn_validation'] = 'welcome/grn_validation';
$route['accept_reject_validation'] = 'welcome/accept_reject_validation';





$route['client'] = 'welcome/client';
$route['addClient'] = 'welcome/addClient';
$route['updateClient'] = 'welcome/updateClient';




$route['contractor'] = 'welcome/contractor';
$route['updateContractor'] = 'welcome/updateContractor';
$route['addContractor'] = 'welcome/addContractor';

$route['consumable'] = 'welcome/consumable';
$route['addConsumable'] = 'welcome/addConsumable';
$route['updateConsumable'] = 'welcome/updateConsumable';

$route['hus_number'] = 'welcome/hus_number';
$route['oc_number'] = 'welcome/oc_number';
$route['wbs_number'] = 'welcome/wbs_number';
$route['addOtherData'] = 'welcome/addOtherData';
$route['updateOtherData'] = 'welcome/updateOtherData';


$route['supplier'] = 'welcome/supplier';
$route['updateSupplier'] = 'welcome/updateSupplier';
$route['addSupplier'] = 'welcome/addSupplier';


$route['po_details'] = 'welcome/po_details';
$route['po/(:any)'] = 'welcome/po';
$route['addPO'] = 'welcome/addPO';
$route['updatePO'] = 'welcome/updatePO';

$route['po_detailed_details'] = 'welcome/po_detailed_details';
$route['addSO'] = 'welcome/addSO';
$route['updateSO'] = 'welcome/updateSO';
$route['updateBankDetails'] = 'welcome/updateBankDetails';

$route['store'] = 'welcome/store';
$route['addStore'] = 'welcome/addStore';
$route['updateStore'] = 'welcome/updateStore';


$route['issue'] = 'welcome/issue';
$route['addissue'] = 'welcome/addissue';
$route['updateissue'] = 'welcome/updateissue';


$route['store_stock'] = 'welcome/store_stock';
$route['addissue'] = 'welcome/addissue';
$route['updateissue'] = 'welcome/updateissue';

$route['get_id'] = 'welcome/get_id';
$route['get_id_supplier'] = 'welcome/get_id_supplier';



$route['dispatch_tracking'] = 'welcome/dispatch_tracking';
$route['adddispatch_tracking'] = 'welcome/adddispatch_tracking';
$route['updatedispatch_tracking'] = 'welcome/updatedispatch_tracking';

$route['billing_track'] = 'welcome/billing_track';
$route['billing'] = 'welcome/billing';
$route['addbilling_track'] = 'welcome/addbilling_track';
$route['updatebilling_track'] = 'welcome/updatebilling_track';
$route['updateBankDetails2'] = 'welcome/updateBankDetails2';

$route['addTransport'] = 'welcome/addTransport';
$route['updateTransport'] = 'welcome/updateTransport';

$route['updateCompletedDate'] = 'welcome/updateCompletedDate';




$route['loading_user'] = 'welcome/loading_user';
$route['erp_users'] = 'welcome/erp_users';
$route['add_users_data'] = 'welcome/add_users_data';
$route['addLoadingUser'] = 'welcome/addLoadingUser';
$route['updateloading_user'] = 'welcome/updateloading_user';
$route['loading/(:any)'] = 'welcome/loading';
$route['loading_detail'] = 'welcome/loading_detail';






$route['insert'] = 'welcome/insert';

$route['tool_with_insert'] = 'welcome/tool_with_insert';

$route['singlerequesrreasons'] = 'welcome/singlerequesrreasons';
$route['addSingleRequest'] = 'welcome/addSingleRequest';
$route['updateSingleRequest'] = 'welcome/updateSingleRequest';

$route['source_list'] = 'welcome/source_list';


$route['supplier_list'] = 'welcome/supplier_list';


$route['updateSource_Supplier'] = 'welcome/updateSource_Supplier';
$route['addSource_Supplier'] = 'welcome/addSource_Supplier';

$route['shifts'] = 'welcome/shifts';
$route['addShift'] = 'welcome/addShift';
$route['updateShift'] = 'welcome/updateShift';


//operations
$route['operations'] = 'Welcome/operations';
$route['operations_data'] = 'Welcome/operations_data';
$route['add_operations'] = 'Welcome/add_operations';
$route['add_operations_data'] = 'Welcome/add_operations_data';
$route['update_operations'] = 'Welcome/update_operations';
$route['update_job_card'] = 'Welcome/update_job_card';
$route['update_job_card_status'] = 'Welcome/update_job_card_status';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//part operations
$route['part_operations/(:any)/(:any)'] = 'Welcome/part_operations';
$route['add_part_operations'] = 'Welcome/add_part_operations';
$route['view_history_operation_parts/(:any)/(:any)'] = 'Welcome/view_history_operation_parts';

//part operations
$route['part_operations_assembly'] = 'Welcome/part_operations_assembly';
$route['add_child_part'] = 'Welcome/add_child_part';
$route['add_part_operations_assembly'] = 'Welcome/add_part_operations_assembly';
$route['view_history_operation_parts_assembly/(:any)/(:any)'] = 'Welcome/view_history_operation_parts_assembly';
