<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome/login';
$route['login'] = 'welcome/login';
$route['logout'] = 'welcome/logout';


$route['index'] = 'welcome/index';

$route['delete'] = 'welcome/delete';
$route['delete_po'] = 'welcome/delete_po';
$route['signin'] = 'welcome/signin';


$route['customer'] = 'welcome/customer';
$route['inwarding'] = 'welcome/inwarding';
$route['inwarding_by_po'] = 'welcome/inwarding_by_po';
$route['inwarding_po_check'] = 'welcome/inwarding_po_check';
$route['uom'] = 'welcome/uom';
$route['part_type'] = 'welcome/part_type';
$route['adduom'] = 'welcome/adduom';

$route['addpartType'] = 'welcome/addpartType';
$route['updatepartType'] = 'welcome/updatepartType';
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
$route['update_po_parts'] = 'Newcontroller/updsate_po_parts';
$route['accept_po'] = 'Newcontroller/accept_po';
$route['new_po_list_supplier'] = 'Newcontroller/new_po_list_supplier';
$route['view_po_by_supplier_id/(:any)'] = 'Newcontroller/view_po_by_supplier_id';
$route['add_planning_data'] = 'Newcontroller/add_planning_data';



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

$route['generatepdf/(:any)'] = 'PdfController/generate_invoice';

$route['gst'] = 'welcome/gst';
$route['add_gst'] = 'welcome/add_gst';



$route['pdfg'] = 'welcome/pdfg';



$route['child_part'] = 'welcome/child_part';
$route['part_stocks'] = 'welcome/part_stocks';
$route['addchildpart'] = 'welcome/addchildpart';
$route['updatechildpart'] = 'welcome/updatechildpart';

$route['customer_part'] = 'welcome/customer_part';
$route['addcustomerpart'] = 'welcome/addcustomerpart';
$route['updatecustomerpart'] = 'welcome/updatecustomerpart';
$route['bom/(:any)'] = 'welcome/bom';



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






$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
