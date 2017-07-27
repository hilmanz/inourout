<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 10:45:24
         compiled from "../templates/application/web/widgets/popup-redeem-form.html" */ ?>
<?php /*%%SmartyHeaderCode:25095579352afecea402574-66583009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62ff8d0d0f0ff2d8dedcbd49ee99dd9c320732d6' => 
    array (
      0 => '../templates/application/web/widgets/popup-redeem-form.html',
      1 => 1389163976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25095579352afecea402574-66583009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52afecea420bf6_46504170',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52afecea420bf6_46504170')) {function content_52afecea420bf6_46504170($_smarty_tpl) {?><div class="popup" id="popup-redeem-form">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/prize-redemption.png" /></h2>
            <h3>You are about to redeem: <span class="prizeName">London Backpack</span></h3>
            <h3>the following amount will be taken out in exchange of the prize:</h3>
        </div>
    	<div class="popup-entry">
                <div class="badgesForRedeem">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr class="badgeoffered" >
				  
                  
                    
                  </tr>
                </table>
                </div><!-- END .badgesForRedeem -->
                <h3><span class="bigFont">SHIPPING</span> please add shipping address information.</h3>
                <form id="shippingForm" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/redeem" >
                	<div class="col2">
                    	<input type="text" value=""  name="fullname" placeholder="FULL NAME" /  />
                        <textarea>ADDRESS</textarea>
                    </div>
                	<div class="col2">
                    	<input type="text"  name="city"  value="" placeholder="CITY" />
                    	<input type="text"  name="postalcode" value=""  placeholder="POSTAL CODE" />
                    	<input type="text" name="phonenumber"  value=""  placeholder="PHONE NUMBER" />
                    </div>
					
					<input type="hidden" name="merchandiseid" class="midtoform" value="0" /> 
					<input type="hidden" name="badgeid"  class="badgestoform" value="0" /> 
					<input type="hidden" name="badgeamount"  class="amounttoform" value="0" /> 
						
					<a href="#popup-redeem-success" class="orangebtn showPopup messageshipping" style="display:none" ></a> 
                     <input type="submit" value="SUBMIT &raquo;" class="orangebtn" /> 
                </form>
        </div>
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->

<script>
	var updateoptions = {
	dataType:  'json', 	
	beforeSubmit: function(data) { 
			
			 console.log('wait...........');
			 
	},
	success : function(data) {		
			
			if(data.result==true){				
					console.log(' okeh lah ');
					$(".redeemmessages").html(locale.redeem.success);
					 
			}else{
					$(".redeemmessages").html(locale.redeem.failed);
					 
			}
			$(".messageshipping").trigger('click');
			 
	}
	};					

	$("#shippingForm").ajaxForm(updateoptions);
</script>
<?php }} ?>
