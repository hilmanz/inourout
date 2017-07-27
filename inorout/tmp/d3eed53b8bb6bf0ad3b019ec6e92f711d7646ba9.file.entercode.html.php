<?php /* Smarty version Smarty-3.1.15, created on 2013-12-13 10:39:18
         compiled from "../templates/application/web//apps/entercode.html" */ ?>
<?php /*%%SmartyHeaderCode:133056586152a96c3a79a076-39539823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3eed53b8bb6bf0ad3b019ec6e92f711d7646ba9' => 
    array (
      0 => '../templates/application/web//apps/entercode.html',
      1 => 1386843469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133056586152a96c3a79a076-39539823',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a96c3a8015b5_39806542',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a96c3a8015b5_39806542')) {function content_52a96c3a8015b5_39806542($_smarty_tpl) {?><div id="entercodePage" class="container">
	<div class="entry-container center">
    	<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/entercode.png" />
    	<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
/badges/inputcode" id="inputcodeform" >
        	<input type="text" name="code" class="thecodes"  />
			<span class="messageinputcode" ></span>
            <input type="submit" class="btnSubmit" value="&nbsp;" class="inputsubmitcode" />
			
        </form>
        <h3><a href="#" class="learnmore">learn how to get more badges &raquo;</a></h3>
    </div>
</div><!-- END .container -->


<script>
	
	var updateoptions = {
	dataType:  'json', 	
	beforeSubmit: function(data) { 
			 
			/* $(".global-popup-inorout").trigger("click");	*/
			$(".messageinputcode").html("please wait");
			$(".thecodes").val("");
			 
	},
	success : function(data) {		
			
			if(data){
						
						var html ="";
						html = "<p class='postSucces'>"+data.message+"</p>";
						/* $(".global-popup-inorout").trigger("click"); */		
						$(".messageinputcode").html(html);				  
					 
			}
				 
	}
	};					

	$("#inputcodeform").ajaxForm(updateoptions);

</script>
<?php }} ?>
