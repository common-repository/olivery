<?php
/**
 * Plugin Name: Olivery
 * Description: Integrate WooCommerce with Olivery.
 * Plugin URI:  https://website.olivery.app/?page_id=975
 * Version:     6.24
 * Author:      Olivery
 * Author URI:  http://website.olivery.app

 */
 if ( is_admin() ){



function olivery_plugin_sanitize_text_field_allowHTML_f( $input ) {
	
     return $input ;/*$validated_input*/;

 }
 
add_action( 'admin_init', 'olivery_plugin_register_my_setting_f' );
function olivery_plugin_register_my_setting_f() {
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => 'olivery_bs',
            );
	register_setting( 'header_group', 'olivery_login', $args1 ); 
	
	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => '12345678',
            );
	register_setting( 'header_group', 'olivery_password', $args1 ); 
	
	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => 'demo',
            );
	register_setting( 'header_group', 'olivery_db', $args1 ); 
	

	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => '0111223222',
            );
	register_setting( 'header_group', 'olivery_company_sequence', $args1 ); 
	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => 'Quds',
            );
	register_setting( 'header_group', 'olivery_follower_address', $args1 ); 
	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => 'Ramallah',
            );
	register_setting( 'header_group', 'olivery_follower_area', $args1 ); 
	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' =>get_bloginfo( 'name' ),
            );
	register_setting( 'header_group', 'olivery_follower_store_name', $args1 ); 
	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => '0569894922',
            );
	register_setting( 'header_group', 'olivery_follower_mobile_number', $args1 ); 
	
	$args1 = array(
            'type' => 'string', 
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
            'default' => '0569894922',
            );
	register_setting( 'header_group', 'olivery_follower_second_mobile_number', $args1 );
	
	


	register_setting(
        'header_group',
        'olivery_delivery_coms',
        array(
            'type' => 'array',
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
			 'default'=>array('demo','demo1','demo2'),
        )
    );
    
    
    register_setting(
        'header_group',
        'olivery_new_orders_statuses',
        array(
            'type' => 'array',
            'sanitize_callback' => 'olivery_plugin_sanitize_text_field_allowHTML_f',
			 'default'=>array( ),
        )
    );
			
}




 add_action('admin_menu', 'olivery_plugin_setup_menu_f');
 
function olivery_plugin_setup_menu_f(){
    add_menu_page( 'Olivery', 'Olivery', 'manage_options', 'olivery', 'olivery_plugin_welcome_f' );	
    add_submenu_page( 'olivery', 'Olivery Settings', 'Olivery Settings',    'manage_options', 'olivery-settings','olivery_plugin_init_f');	
   
}
 
function olivery_plugin_welcome_f(){
if ( !current_user_can( 'manage_options' ) )  {
    
    wp_die( esc_html( 'You do not have sufficient permissions to access this page.' ) );
}

?>
<h1>Welcome to Olivery</h1>
<p>Olivery is a platform that connect thousand of stores and delivery companies togather</p>
<nr><br><h2>What is this plugin</h2>
<p>This plugin allow you to integrate Olivery with your store that use WooCommerce </p>
 <p>Once you install and activate Olivery Plugin you will be able to send orders directly to Olivery </p>
 
 <nr><br><h2>How can i use this plugin ?</h2>
<p>After you install and activate the plugin you will see a new menu link named 'Olivery', this is where you can fill your settings that you can get from Olivery Support. beside that in your order edit admin page you will be able to see a button named 'send to olivery' , click on it and a copy of your order basic informatin will be sent to Olivery in order to proccess your order , you will also be able to see a new choices in orders bulk actions to do the same thing</p>

<?php
}
 

function olivery_plugin_init_f(){
	
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( esc_html( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	?>
	
	 <h1>Olivery integration Settings </h1>

	<form method="post" action="options.php"> 
	

	<?php
	settings_fields( 'header_group' );
	
	do_settings_sections( 'header_group' );
	

?>
	
	
  
<table class='options-table'>
<tr><th>olivery_login</th><td><input name='olivery_login' value='<?php echo  esc_attr(get_option('olivery_login')); ?>'></td></tr>
<tr><th>olivery_password</th><td><input name='olivery_password' value='<?php echo esc_attr(get_option('olivery_password'));?>'></td></tr>
<tr><th>olivery_db</th><td><input name='olivery_db' value='<?php echo esc_attr(get_option('olivery_db')); ?>'></td></tr>


<tr><th>company_sequence</th><td><input name='olivery_company_sequence' value='<?php echo esc_attr(get_option('olivery_company_sequence')); ?>'></td></tr>

<tr><th>follower_address</th><td><input name='olivery_follower_address' value='<?php echo esc_attr(get_option('olivery_follower_address')); ?>'></td></tr>

<tr><th>follower_area</th><td><input name='olivery_follower_area' value='<?php echo esc_attr(get_option('olivery_follower_area')); ?>'></td></tr>

<tr><th>follower_store_name</th><td><input name='olivery_follower_store_name' value='<?php echo esc_attr(get_option('olivery_follower_store_name')); ?>'></td></tr>

<tr><th>follower_mobile_number</th><td><input name='olivery_follower_mobile_number' value='<?php echo esc_attr(get_option('olivery_follower_mobile_number')); ?>'></td></tr>

<tr><th>follower_second_mobile_number</th><td><input name='olivery_follower_second_mobile_number' value='<?php echo esc_attr(get_option('olivery_follower_second_mobile_number')); ?>'></td></tr>

<tr><th colspan=2 class='tit'><hr></th></tr>
<tr><th colspan=2 class='tit'>Delivery Companies</th></tr>

<tr><th>Company Subdomain</th><th>Uncheck then click 'Save Changes' to Remove</th></tr>
<?php
$arr_olivery_delivery_coms=get_option('olivery_delivery_coms');
for($ix=0;$ix<count($arr_olivery_delivery_coms);$ix++){
    ?>
<tr><th>
    
 <?php echo esc_html($arr_olivery_delivery_coms[$ix]); ?>:</th><td><input checked type='checkbox' name='olivery_delivery_coms[]' value='<?php echo esc_attr($arr_olivery_delivery_coms[$ix]); ?>'></td></tr>
 <?php 
}
?>
<tr><th colspan=2 class='tit'><a style='cursor:pointer;' onclick='olivery_plugin_addNewDelvCom_f()'>New Delivery Company +</a></th></tr>
</table>


<br><table class='options-table-statuses'>

<tr><th colspan=2 class='tit'><hr></th></tr>

<tr><th colspan=2 class='tit'>Olivary Orders Statuses</th></tr>

<?php 
$new_order_statuses_arr=get_option('olivery_new_orders_statuses');
for($ix=0;$ix<count($new_order_statuses_arr);$ix++){
    
    ?>
<tr><td colspan=2><input  type='text' name='olivery_new_orders_statuses[]' value='<?php echo esc_attr($new_order_statuses_arr[$ix]); ?>' readonly></td></tr>
<?php 
}
?>
<tr><th colspan=2 class='tit'><a style='cursor:pointer;' onclick='olivery_plugin_addNewOrderStatus_f();' class='tit'>+ New Order Status</a></th></tr>

</table>

<?php
submit_button(); 
?>
</form>
<style>
.submit:hover {
    background-color: transparent !important;
}
table.options-table th,table.options-table-statuses th{
	text-align:left;
}
table.options-table th.tit,table.options-table-statuses th.tit{
font-size:16px;

}
table.options-table,table.options-table-statuses{
min-width:480px;
}
</style>
<script>
function olivery_plugin_addNewDelvCom_f(){
console.log('olivery_plugin_addNewDelvCom_f');
element = document.querySelector('table.options-table');
var elN_ = document.createElement('tr');
elN_.innerHTML ="<th>company sub domain:</th><td><input   name='olivery_delivery_coms[]' value=''></td>";
element.append(elN_);
}

function olivery_plugin_addNewOrderStatus_f(){
console.log('olivery_plugin_addNewOrderStatus_f');
element = document.querySelector('table.options-table-statuses');
var elN_ = document.createElement('tr');
elN_.innerHTML = "<th>Order Status:</th><td><input   name='olivery_new_orders_statuses[]' value=''></td>";
element.append(elN_);
}
</script>


<?php
}



function olivery_plugin_send_to_olivery_f($dom_domain,$the_order){
    
    $customer_area="-";
    $customer_address="-";
    $customer_name="-";
    if($the_order->has_billing_address())
    {
        $customer_area=$the_order->get_billing_city();
        $customer_address="city:".$the_order->get_billing_city().", ";
        $customer_address.="address1:".$the_order->get_billing_address_1().", ";
        $customer_address.="address2:".$the_order->get_billing_address_2();
        $customer_name=$the_order->get_formatted_billing_full_name();
 
    }
     if($the_order->has_shipping_address())
    {
    $customer_area=$the_order->get_shipping_city();
    $customer_address="city:".$the_order->get_shipping_city().", ";
    $customer_address.="address1:".$the_order->get_shipping_address_1().", ";
    $customer_address.="address2:".$the_order->get_shipping_address_2();
      $customer_name=$the_order->get_formatted_shipping_full_name();
 
    }
 
$url="https://".$dom_domain.".olivery.app/create_order";

$argsArr_1=array('timeout'     => 10,
    'headers'     => array('Content-Type' => 'application/json',
 'Expect' => ''),
    'body'        => '{
 "jsonrpc": "2.0", 
"params": { 
     "login":"'.esc_attr(get_option('olivery_login')).'",
      "password": "'.esc_attr(get_option('olivery_password')).'",
      "db":"'.esc_attr(get_option('olivery_db')).'",
      "customer_address": "'.$customer_address.'",
      "customer_mobile": "'.$the_order->get_billing_phone().'",
      "customer_name": "'.$customer_name.'",
      "customer_area": "'.$customer_area.'",
       "company_sequence":"'.esc_attr(get_option('olivery_company_sequence')).'",
      "cost":'.$the_order->get_total().',
      "follower_address":"'.esc_attr(get_option('olivery_follower_address')).'",
       "follower_area":"'.esc_attr(get_option('olivery_follower_area')).'",
       "follower_store_name":"'.esc_attr(get_option('olivery_follower_store_name')).'",
       "follower_ref_id":"'.$the_order->get_id().'",
        "follower_mobile_number":"'.esc_attr(get_option('olivery_follower_mobile_number')).'",
        "reference_id":"'.$the_order->get_id().'",
          "is_wordpress_order":"true",
       "follower_second_mobile_number":"'.esc_attr(get_option('olivery_follower_second_mobile_number')).'"
        		}
}',
    'method'      => 'POST',
    'data_format' => 'body',
);
//print_r($argsArr_1);
//die();
		$response = wp_remote_post($url, $argsArr_1);


return $response;


}//olivery_plugin_send_to_olivery_f



function olivery_plugin_woocommerce_admin_order_data_after_order_details_f( $the_order ) { 
   
?>
 
   <div style='float: left;margin-top: 40px;'>
	
	<?php
	/** btn  **/ 

	
	$current_uri = home_url( add_query_arg(  array(
    'sendToOlivary' => $the_order->get_id()
) ) );
	$current_uri = remove_query_arg('subdomain',$current_uri);
	$arr_olivery_delivery_coms=get_option('olivery_delivery_coms');


 ?>
  <a  class="button-primary"  onclick="document.getElementById('modal-urls').style.display='table-cell'">
 Send this order to Olivary</a>
  
  <div id="modal-urls" style="display:none;height: 100vh;position: fixed;width: 100vw;z-index: 99999;text-align: center;vertical-align: middle;left: 0;top: 0;background-color: #282828ee;padding-top: 100px;">
  <div class="modal-content">
  <h3 style="padding:12px;">Choose the delivery company  </h3>
  <select style="width:100%" onchange="document.getElementById('submit_to_olivery').href+='&subdomain='+this.value" id="com-urls">
  
  <option disabled selected value> -- select company  -- </option>
  <?php
  
for($ix=0;$ix<count($arr_olivery_delivery_coms);$ix++){
    ?>
<option  value="<?php echo esc_html( $arr_olivery_delivery_coms[$ix]); ?>"><?php  echo esc_html($arr_olivery_delivery_coms[$ix]); ?></option>

<?php
}
  
  ?>
  </select>
  <br> <br>
  <a  class="button-primary modalBtn" id="submit_to_olivery" href="
  <?php echo esc_url($current_uri); ?>"
  onclick="this.style.pointerEvents ='none';this.style.backgroundColor='#333';this.innerHTML='Sending...';">
 Send </a>

  <a  class="button modalBtn" onclick="document.getElementById('modal-urls').style.display='none';">
 Cancel </a>

 </div></div>
 <style>
 .modalBtn{
 width:49%;
 }
 .modal-content{
	 width:350px;
	 height:230px;
	 
	 
	 background: #fff;
    border: 1px solid #c3c4c7;
 
    box-shadow: 0 1px 1px rgb(0 0 0 / 4%);
    margin: auto;
    padding: 23px;
	 }
 
 </style>
 
 <?php


	/** end  btn  **/ 
	
		/*** request **/
	if(isset($_REQUEST['sendToOlivary']))
	{
			
			
			$canSend=true;/* this is only to be easy on the api for testing */
		if($canSend){
		 try{
		$response=olivery_plugin_send_to_olivery_f($_REQUEST['subdomain'],$the_order);
		 }catch(Exception $e) {
		     
		 }
	
		$olivery_success=0;
		$olivery_fail=0;
		$olivery_error=0;
			$fail_msg="cannot be displayed, check browser console";
		if ( is_wp_error( $response ) ) {
    
	$olivery_error++;
	} else {
   
	$res_Success=json_decode($response['body']);
			$res_Success=$res_Success->result;
			$res_Success=$res_Success->Success;
		if($res_Success===true)$olivery_success++;
		else{
			$olivery_fail++;
		
			try{
			$fail_msg=json_decode($response['body'])->error->data->message;
			}catch(Exception  $exep_fail_msg){}
		}
}


/**/
		
		if($res_Success>0){
		    ?>
		    
		    <div  class="notice notice-success is-dismissable"><p>Order has been  successfully sent to Olivery : <?php echo esc_attr($_REQUEST['subdomain']); ?> </p></div>
		    
		   <?php 
		}
		
		
		if($olivery_fail>0){
		    ?>
		<div  class="notice  notice-error is-dismissable"><p>Order  failed to be sent to Olivery : <?php echo esc_attr($_REQUEST['subdomain']); ?> ,<br> error message:<?php echo esc_html($fail_msg); ?> </p></div>
		
		<?php 
		}
		
		
		if($olivery_error>0){
		    
		   if ( is_wp_error( $response ) ) {
		       $error_message = $response->get_error_message();
		    
		   }
		   
		   ?>
		   <div  class="notice  notice-error is-dismissable"><p>Error when trying to  sent to <?php echo esc_attr($_REQUEST['subdomain']); ?>.olivery.app:<?php echo esc_html($error_message); ?></p></div>
		   
		   <?php
		}
		
/**/
		} /*if can send*/
		
	}
	
		/*** end request **/
	?>
</div>
<?php

	
}; /* olivery_plugin_woocommerce_admin_order_data_after_order_details_f */

         
// add the action 
add_action( 'woocommerce_admin_order_data_after_order_details', 'olivery_plugin_woocommerce_admin_order_data_after_order_details_f', 999, 1 ); 


add_filter( 'plugin_action_links_olivery/olivery.php', 'olivery_plugin_olivery_settings_link_f' );
function olivery_plugin_olivery_settings_link_f( $links ) {
	// Build and escape the URL.
	$url = esc_url( add_query_arg(
		'page',
		'olivery',
		get_admin_url() . 'admin.php'
	) );
	// Create the link.
	$settings_link = "<a href='$url'>Settings</a>";
	// Adds the link to the end of the array.
	array_push(
		$links,
		$settings_link
	);
	return $links;
}//end nc_settings_link()


}//if(is admin)
	
/* add fucntionality of bulk action */ 

/* add the action to menu **/



	
add_filter('bulk_actions-edit-shop_order', function($bulk_actions) {
	$arr_olivery_delivery_coms=get_option('olivery_delivery_coms');

	$oliveryActions=array();
for($ix=0;$ix<count($arr_olivery_delivery_coms);$ix++){
$oliveryActions['send-to-olivery-'.$arr_olivery_delivery_coms[$ix]]=$arr_olivery_delivery_coms[$ix].'.olivery.app';

}/* for loop	*/
	$bulk_actions['Send a copy to']=$oliveryActions;
	return $bulk_actions;
});//add_filter 'bulk_actions-edit-shop_order'



/* handle the action */
add_filter('handle_bulk_actions-edit-shop_order', function($redirect_url, $action, $post_ids) {
    
    
    
$redirect_url = remove_query_arg('olivery_error');
		$redirect_url = remove_query_arg('olivery_fail',$redirect_url);
		$redirect_url = remove_query_arg('olivery_success',$redirect_url);
	$redirect_url = remove_query_arg('sent-to-olivery-fail-message',$redirect_url);
	
	$arr_olivery_delivery_coms=get_option('olivery_delivery_coms');
	for($ix=0;$ix<count($arr_olivery_delivery_coms);$ix++){
	if ($action == 'send-to-olivery-'.$arr_olivery_delivery_coms[$ix]) {
	
		$faildMsgs="";
		$olivery_error=0;
		$olivery_fail=0;
		$olivery_success=0;		
		foreach ($post_ids as $post_id) {
			$order = wc_get_order( $post_id );
        $order_data = $order->get_data();
        try{
          
		$response=olivery_plugin_send_to_olivery_f($arr_olivery_delivery_coms[$ix],$order);
		
	
        }catch(Exception $e) {
		    	
		     
		 }
		 /*** here **/
		
		if ( is_wp_error( $response ) ) {
		  
			try{

		$error_message = $response->get_error_message();
	
		$faildMsgs.=$error_message."__br__";
	
		$olivery_error++;
			}catch(Exception  $exep_fail_msg2){
			}
			
		} else {
			$res_Success=json_decode($response['body']);
			$res_Success=$res_Success->result;
			$res_Success=$res_Success->Success;
		if($res_Success===true)$olivery_success++;
		else{
		    $olivery_fail++;		try{	
		    $fail_msg="485:wp canot find error message";
		  //  print_r(json_decode($response['body']));
		  // die();
		 if(json_decode($response['body'])->result->Message)$fail_msg=json_decode($response['body'])->result->Message;
		else if(json_decode($response['body'])->error->data->message)$fail_msg=json_decode($response['body'])->error->data->message;			}catch(Exception  $exep_fail_msg){}		$faildMsgs.="order number [".$post_id."] failed! message:".$fail_msg."__br__";		}
		
	
		}
		 /***  end here **/
		
		}

		$redirect_url = add_query_arg('olivery_error', $olivery_error, $redirect_url);
		$redirect_url = add_query_arg('olivery_fail', $olivery_fail, $redirect_url);
		$redirect_url = add_query_arg('olivery_success', $olivery_success, $redirect_url);
		for($jx=0;$jx<count($arr_olivery_delivery_coms);$jx++){
		if($arr_olivery_delivery_coms[$jx]!=$arr_olivery_delivery_coms[$ix])
		$redirect_url = remove_query_arg( 'sent-to-olivery-'.$arr_olivery_delivery_coms[$ix],$redirect_url );
		
			
		}
		
		$redirect_url = add_query_arg('sent-to-olivery-'.$arr_olivery_delivery_coms[$ix], count($post_ids), $redirect_url);				$redirect_url = add_query_arg('sent-to-olivery-fail-message', $faildMsgs, $redirect_url);
		
			
	}
	

	}/* for loop */
	
	return $redirect_url;


}, 10, 3);/* add_filter 'handle_bulk_actions-edit-shop_order' */


/* show notice after the action */
add_action('admin_notices', function() {

	$failorErrorMessagesArr=array();
	if(isset($_REQUEST['sent-to-olivery-fail-message']))
	{
	    
	    $failorErrorMessagesArr=explode('__br__',$_REQUEST['sent-to-olivery-fail-message']);
	}
	$arr_olivery_delivery_coms=get_option('olivery_delivery_coms');
	for($ix=0;$ix<count($arr_olivery_delivery_coms);$ix++){
	if (!empty($_REQUEST['sent-to-olivery-'.$arr_olivery_delivery_coms[$ix]])) {
	
		$num_changed = (int) $_REQUEST['sent-to-olivery-'.$arr_olivery_delivery_coms[$ix]];
		?>
		<div id="message" class="notice notice-info is-dismissable"><p> <?php echo esc_attr($num_changed) ; ?> Orders submitted to Olivery App <br>Delivery Company prefex: <?php echo esc_attr($arr_olivery_delivery_coms[$ix]) ; ?></p></div>
		<?php
		
		$olivery_successCount = (int) $_REQUEST['olivery_success'];
		if($olivery_successCount>0)
		{
		    ?>
		<div  class="notice notice-success is-dismissable"><p>Olivery: <?php echo esc_attr($olivery_successCount) ; ?> Orders  successful </p></div>
		<?php
		}
		
		$olivery_failCount = (int) $_REQUEST['olivery_fail'];
		if($olivery_failCount>0)
		{
		    ?>
		   <div  class="notice  notice-error is-dismissable"><p>Olivery: <?php echo esc_attr($olivery_failCount) ; ?> Orders  failed
		   <?php
		   for($ixssx=0;$ixssx<count($failorErrorMessagesArr);$ixssx++){
		       
		       ?>
		       <br>
		       <?php
echo esc_html($failorErrorMessagesArr[$ixssx]) ;
}
?>

</p></div>
		    <?php
		}
		
		$olivery_errorCount = (int) $_REQUEST['olivery_error'];
		if($olivery_errorCount>0)
		{
		    ?>
		    <div  class="notice  notice-error is-dismissable"><p>Olivery:<?php echo esc_attr($olivery_errorCount) ; ?> Orders have errors  <br> <?php 
		    
		     for($ixss=0;$ixss<count($failorErrorMessagesArr);$ixss++){
		       
		       ?>
		       <br>
		       <?php
            echo esc_html($failorErrorMessagesArr[$ixss]) ;
            }

		    
		    ?>
		    </p></div>
		<?php
		}
	
		
		
		
	}
	}/* for loop*/
}); /* add_action 'admin_notices' */



/* add custome order status */
function olivery_register_order_status_f() {
    
    
    $new_order_statuses_arr2=get_option('olivery_new_orders_statuses');
if($new_order_statuses_arr2)
for($ix3=0;$ix3<count($new_order_statuses_arr2);$ix3++){
   

register_post_status( "wc-".sanitize_title($new_order_statuses_arr2[$ix3]), array(
        'label'                     => $new_order_statuses_arr2[$ix3],
        'public'                    => true,
        'show_in_admin_status_list' => true,
        'show_in_admin_all_list'    => true,
        'exclude_from_search'       => false,
        'label_count'               => _n_noop($new_order_statuses_arr2[$ix3].' <span class="count">(%s)</span>', $new_order_statuses_arr2[$ix3].' <span class="count">(%s)</span>' )
    ) );
 
}


    
}
add_action( 'init', 'olivery_register_order_status_f' );
function olivery_add_custom_status_to_order_statuses_f( $order_statuses ) {
    $new_order_statuses_arr3=get_option('olivery_new_orders_statuses');
if($new_order_statuses_arr3)    
for($ix4=0;$ix4<count($new_order_statuses_arr3);$ix4++){
     //  if($ix4==3)die("ok here :".$ix4);
     $order_statuses["wc-".sanitize_title($new_order_statuses_arr3[$ix4])] = $new_order_statuses_arr3[$ix4];
    
}
   
   
    return $order_statuses;
}
add_filter( 'wc_order_statuses', 'olivery_add_custom_status_to_order_statuses_f' );


/* end add custome order status */
/* end add fucntionality of bulk action */ 

/*updated on 14-10-2021*/
/*updated on 17-10-2021*/
/*updated on 18-10-2021*/
/*updated on 19-10-2021*/
/*updated on 21-10-2021*/
/*updated on 23-10-2021*/
/*updated on 24-10-2021*/
/*updated on 01-12-2021*/
/*updated on 10-12-2021*/
/*updated on 11-12-2021*/
/*updated on 31-1-2022*/
/*updated on 5-2-2022*/
 ?>
 

