<?php

add_action( 'admin_post_nopriv_join_form', 'join_form_send' );
add_action( 'admin_post_join_form', 'join_form_send' );

function join_form_send() 
{
$firstName = cleanFields($_POST['first_name']);
$lastName  = cleanFields($_POST['last_name']);
$telephone = cleanFields($_POST['telephone']);
$cellphone  = cleanFields($_POST['cellpone']);
$email     = cleanFields($_POST['email'],'email');
$nameCompany = cleanFields($_POST['name_company']);
$location = cleanFields($_POST['location'], 'int');
$address  = cleanFields($_POST['address']);
$telephoneCompany = cleanFields($_POST['telephone_company']);
$status = 1;

global $wpdb;

$result = $wpdb->insert(
				'cafe_members',
				array(
					'first_name'  =>   $firstName,
					'last_name'  =>    $lastName,
					'telephone'  =>  $telephone,
					'cellphone'  =>  $cellphone,
					'email'  =>  $email,
					'name_company'  =>  $nameCompany,
					'location'  =>  $location,
					'address'  =>  $address,
					'telephone_company' => $telephoneCompany,
					'status'  =>  $status
				)
		);
//		$wpdb->show_errors();
//		$wpdb->print_error();

var_dump($result);

}

function cleanFields($field, $type = 'text')
{
	if($field) {
		switch ($type) {
			case 'text':
				$field = htmlspecialchars($field);
				break;
			case 'int':
				$field = (int) $field;
				break;
			case 'email':
				$field = filter_var($field, FILTER_SANITIZE_EMAIL);
				break;
			default:
				$field = (string) $field;
				break;
		}

		return $field;		
	} 

 return null;
}


function getAdvanceLabel( $keyField )
{
	 $label = null;

	 $field = get_field_object( $keyField );
     $value = $field['value'];

     $label = $field['choices'][$value];

     return $label;
}