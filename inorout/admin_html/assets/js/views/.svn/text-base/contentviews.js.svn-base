   

function listofuserviews(data){
	var html ="";

	$.each(data,function(k,v){
	 
		html+='<tr>';
			html+='<th>'+v.name+' '+v.last_name+'</th>';
			html+='<th>'+v.email+'</th>';
			html+='<th>'+v.pagename+'</th>';
			 html+='<th><a class="Btn icon-update" href="'+basedomain+'administrator/edit/'+v.id+'" ></a></th>';
			html+='<th><a class="Btn icon-delete" href="'+basedomain+'administrator/unusers/'+v.id+'" ></a></th>';
		html+='</tr>';
	});
	return html;
}	
 

function monthconverter(i){
	var i  = parseInt(i,10);
	var month=new Array();
	month[1]="January";
	month[2]="February";
	month[3]="March";
	month[4]="April";
	month[5]="May";
	month[6]="June";
	month[7]="July";
	month[8]="August";
	month[9]="September";
	month[10]="October";
	month[11]="November";
	month[12]="December";
return month[i];

}

function post_json(data){
	var response = jQuery.ajax({
                    type: "POST",
                    url: data.url,
                    data: data.params,
                    dataType: data.type
	            });
	return response;
}
 
 /* paging list user */ 
function paging_ajax_userlist(fungsi,start){
	
	$.post(basedomain+"listuser/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
		var no = 1;
		var base='';
		var select1='';
		var select2='';
		var str="";
		$.each(response.data.result,function(k,v){ 
			str+='<tr>';
				str+='<td width="10">'+no+'&nbsp;<input type="hidden" name="id" value="'+v.id+'"/></td>';
				str+='<td>'+v.name+' '+v.last_name+'</td>';
				str+='<td>'+v.email+'</td>';
				str+='<td>'+v.cityname+'</td>';
				str+='<td>'+v.register_date+'</td>'; 
					
				if(v.image_profile=='')base=basedomainpath+'public_assets/profile/default.jpg';
				else base=basedomainpath+'public_assets/profile/'+v.image_profile;
				
				str+='<td><a href="javascript:void(0)" class="arkPopupImages" call="'+base+'">';
					
				if(v.image_profile==''){
					str+='<img height="70px" width="70px" src="'+basedomainpath+'public_assets/profile/default.jpg" />';
				}else{
					str+='<img height="70px" width="70px" src="'+basedomainpath+'public_assets/profile/'+v.image_profile+'"/>';
				}
				str+='</a></td> ';
				str+='<td align="center">';
				str+='	<select id="status"  prop="'+v.id+'" >';
				str+='		<option value="" class="green" > - </option>';
				if (v.photo_moderation==0){
					select1 = "selected";
				}
				if (v.photo_moderation==1){
					select2 = "selected";
				}
				
				str+='		<option value="0" class="blue" '+select1+'>Pending</option>';
				str+='		<option value="1" class="red" '+select2+'>Verified</option>';
				str+='	</select>';
				str+='</td>';
			str+='</tr>';
			no++;
		});
		$('.paginguserlist').html(str);
		
	}else{
	   $('.paginguserlist').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
	 
	}
		}
	},"JSON");
}

/* paging notification */
function paging_ajax_notification(fungsi,start){
	
	$.post(basedomain+"notification/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
		var no = 1;
		var str="";
		$.each(response.data.result,function(k,v){ 
			str+='<tr>';
				str+='<td width="10">'+no+'&nbsp;</td>';
				str+='<td>'+v.name+' '+v.last_name+'</td>';
					if (v.from==0){
						str+='<td>Admin</td>';
					}
				str+='<td>'+v.created_date+'</td>';
				str+='<td>'+v.posted_date+'</td>';
				str+='<td>'+v.type+'</td>';
					str+='<td align="center">';					
						if (v.n_status==1){						
							str+='<span class="orange">Publish</span>';
						}
						
						if (v.n_status==2){
							str+=' <span class="green">Unpublish</span>';
						}						
					str+='</td>';
					str+='<td align="center">';
						str+='<nobr>';
						str+='<a href="'+basedomain+''+pages+'/edit/'+v.id+'" class="green"> update </a>| <a href="'+basedomain+''+pages+'/hapus/'+v.id+'" class="red" onclick="return confirm("Are you sure you want to delete this?")">delete</a>';
						str+='</nobr>';
					str+='</td>';
			str+='</tr>';
			no++;
		});
		$('.notiflistpage').html(str);
		
	}else{
	   $('.notiflistpage').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
	 
	}
		}
	},"JSON");
}

/* paging news */
function load_news(method,start){
    var data = {};
    data.url=basedomain+'news/ajaxPaging';
    data.params={ajax:1,start:start};
    data.type="json";
    
    post_json(data).done(function(response){
        var str='';
            if(response.status==1){
				var no = 1;
                $.each(response.data.result,function(k,v){ 
					str+='<tr>';
						str+='<td width="10">'+no+' &nbsp;</td>';
						str+='<td>'+v.title+'</td>';
						str+='<td>'+v.brief+'</td>';
						str+='<td>'+v.content+'</td>';
						if (v.type==1){ 
							str+='<td>Event</td>';
						}
						str+='<td align="center"><nobr>'+v.created_date+'</nobr></td> ';						
						str+='<td align="center">';
							if (v.n_status==1) str+='<span class="green">Publish</span>';
							if (v.n_status==2) str+='<span class="orange">Unpublish</span>';
						str+='</td>';
						str+='<td align="center">';
							str+='<nobr>';
							
							str+='<a href="'+basedomain+'gallery/seegallery?id='+v.id+'" class="red" >Gallery</a>|';
							str+='<a href="'+basedomain+'news/newscontentedit?id='+v.id+'" class="red" >Update</a>';
							str+='| <a href="'+basedomain+'news/hapus?id='+v.id+'" class="red" onclick="return confirm("Are you sure you want to delete this?")">delete</a>';
							str+='</nobr>';
						str+='</td>';
					str+='</tr>';
                });
                $('#newspage tbody').html(str);
                if(start==0){
					
                    start=1;
                    kiPagination(response.data.total, start, 'pagingpostmoderation', data.result, 'load_news', 3);
                }
            }else{
               $('#newspage tbody').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
               $('#pagingpostmoderation').html('');
            }
        
    });
}

/* paging event */
function paging_ajax_event(fungsi,start){


$.post(basedomain+"event/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
		var no = start+1;
		var str="";
		$.each(response.data.result,function(k,v){ 
			str+='<tr>';
				str+='<td width="10">'+no+'&nbsp;</td>';
				str+='<td>'+v.title+'</td>';
				str+='<td>'+v.brief+'</td>';
				str+='<td>'+v.content+'</td>';
				str+='<td>';
					if (v.type==5) str+='Popup Zone';
					if (v.type==3) str+='Clue'; 
				str+='</td>';
				str+='<td><img height="70px" width="70px" src="'+basedomainpath+'public_assets/event/'+v.img+'"></td>';
				str+='<td align="center"><nobr>'+v.created_date+'</nobr></td> ';
				str+='<td align="center">';
					if (v.n_status==1) str+='<span class="green">Publish</span>';
					if (v.n_status==2) str+='<span class="orange">Unpublish</span>';
				str+='</td>';
				str+='<td align="center">';
					str+='<nobr> ';
					str+='<a href="'+basedomain+'gallery/seegallery?id='+v.id+'" class="red" >Gallery</a>|';
					str+='<a href="'+basedomain+'event/saveData?id='+v.id+'" class="red" >update</a>| ';
					str+='<a href="'+basedomain+'event/hapus?id='+v.id+'" class="red" onclick="return confirm("Are you sure you want to delete this?")">delete</a>';
					str+='</nobr>';
				str+='</td>';
			str+='</tr>';
			no++;
		});
		$('.eventpaginglist').html(str);
		if(start==0){
					
                    start=1;
                    kiPagination(response.data.total, start, 'pagingevent', data.result, 'paging_ajax_event', 3);
                }
	}else{
	   $('.eventpaginglist').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
	 
	}
		}
	},"JSON");
}

/* paging share and brag */
function paging_ajax_sharebrag(fungsi,start){
	
	$.post(basedomain+"shareandbrag/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			if(response.status==1){
				var no = 1;
				var selected = "";
				var str="";
				$.each(response.data.result,function(k,v){ 
					selected = "dump";
					str+='<tr>';
						str+='<td width="10">'+no+'&nbsp;</td>';
						str+='<td>'+v.name+' '+v.last_name+'</td>';
						str+='<td>'+v.title+'</td>';
						str+='<td><img src="'+basedomainpath+'public_assets/sharebrags/'+v.img+'" height="70px" width="70px" /></td> ';
						str+='<td align="center"><nobr>'+v.uploaddate+'</nobr></td>';
						str+='<td align="center">';
							if (v.n_status==1) {
								str+='<span class="green">Publish</span>';
								}
							if (v.n_status==2){
								str+='<span class="orange">Finalist</span>';
								}
							str+='</td>';		
							str+='<td align="center"><nobr>'+v.totalvote+'</nobr></td>';
							if (v.n_status==2){
									selected = "checked";
							} 
								
						str+='<td align="center">';
							str+='<input type="checkbox" class="status" value="'+v.n_status+'" data-user="'+v.userid+'" data-event="'+v.eventid+'"" prop="'+v.id+'" '+selected+'  > Check Finalist<br>';
						str+='</td>';						
					str+='</tr>';
					no++;
				});
				$('.sharebraglistpaging').html(str);
				
			}else{
			   $('.sharebraglistpaging').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
			 
			}
		}
	},"JSON");
}

/* paging generate code */
function load_generate_code(method,start){
    var data = {};
    data.url=basedomain+'generateCode/ajaxPaging';
    data.params={ajax:1,start:start};
    data.type="json";
    
    post_json(data).done(function(response){
	
		var str='';
            if(response.status==1){
				var no = 1;
				str+='<tr>';
						str+='<th>id</th>';
						str+='<th>code</th>';
						str+='<th>type</th>';
						str+='<th>code channel</th>';
						str+='<th> code sub channel</th>';
						str+='<th>code reused</th>';
						str+='<th>created date</th>';
					str+='</tr>';
                $.each(response.data.result,function(k,v){ 
					str+='<tr>';
						str+='<td>'+v.no+'</td>';
						str+='<td>'+v.code+'</td>';
						str+='<td>'+v.code_type+'</td>';
						str+='<td>'+v.code_channel+'</td>';
						str+='<td>'+v.code_sub_channel+'</td>';
						 str+='<td>'+v.code_reused+'</td>';
						str+='<td>'+v.created_date+'</td>';
					str+='</tr>';
					no++;
                });
                $('#generatepages').html(str);
                if(start==0){
					
                    start=1;
                    kiPagination(response.data.total, start, 'generatecodepaging', data.result, 'load_generate_code', 3);
                }
            }else{
               $('#generatepages').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
               $('#generatecodepaging').html('');
            }
        
    });
}

/* paging games code */
function load_games_code(method,start){
    var data = {};
    data.url=basedomain+'yellowCode/ajaxPaging';
    data.params={ajax:1,start:start};
    data.type="json";
    
    post_json(data).done(function(response){
	
		 var str='';
            if(response.status==1){
				var no = 1;
                $.each(response.data.result,function(k,v){ 
					str+='<tr>';
						str+='<td>'+v.id+'</td>';
						str+='<td>'+v.code+'</td>';
						str+='<td>'+v.code_channel+'</td>';
						str+='<td>'+v.code_sub_channel+'</td>';
						str+='<td>'+v.created_date+'</td>';
					str+='</tr>';
					no++;
                });
                $('#yellowcabcode tbody').html(str);
                if(start==0){
					
                    start=1;
                    kiPagination(response.data.total, start, 'paginggamescode', data.result, 'load_games_code', 3);
                }
            }else{
               $('#yellowcabcode tbody').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
               $('#paginggamescode').html('');
            }
        
    });
}

/* paging merchandise item */
function load_merchandise_item(method,start){
    var data = {};
    data.url=basedomain+'merchandise/ajaxPaging';
    data.params={ajax:1,start:start};
    data.type="json";
    
    post_json(data).done(function(response){
	log(response.data.result);
		 var str='';
            if(response.status==1){
				var no = 1;
                $.each(response.data.result,function(k,v){ 
					str+='<tr>';
						str+='<td width="10">'+no+'&nbsp;</td>';
						str+='<td>'+v.name+'</td>'; 
						str+='<td>'+v.detail+'</td>';
						str+='<td><img height="70px" width="70px" src="'+basedomainpath+'public_assets/merchandise/'+v.image+'" ></td>';
						str+='<td>'+v.stock+'</td>';
						str+='<td>'+v.point+'</td> ';
						str+='<td align="center">';
							if (v.n_status==1) str+='<span class="green">Publish</span>';
							if (v.n_status==2) str+='<span class="orange">Unpublish</span>';
						str+='</td>';
						str+='<td align="center">';
							str+='<nobr> ';
							str+='<a href="'+basedomain+'merchandise/merchandiseedit?id='+v.id+'" class="red" >update</a>| <a href="'+basedomain+'merchandise/hapus?id='+v.id+'" class="red" onclick="return confirm("Are you sure you want to delete this?")">delete</a>';
							str+='</nobr>';
						str+='</td>';
					str+='</tr>';
					no++;
                });
                $('#merchandiseList tbody').html(str);
                if(start==0){
					
                    start=1;
                    kiPagination(response.data.total, start, 'merchandisepaging', data.result, 'load_merchandise_item', 3);
                }
            }else{
               $('#merchandiseList tbody').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
               $('#merchandisepaging').html('');
            }
        
    });
}

function log(data)
{
	console.log(data);
}
	function getpaging(start,total_rows,contentPaging,pagingfunction,itemperpage){
			if(start == 0)start=1;
			if(total_rows == 0) total_rows=0;
			kiPagination(total_rows, start, contentPaging, pagingfunction,pagingfunction, itemperpage);
		}
		
	/* view ajax paging nyatambahan mulai dari sini */	
	function paging_ajax_merchandise(fungsi,start){
			
			$.post(basedomain+"merchandise/ajaxPaging",{start:start,ajax:1},function(response){
				if(response){
					  if(response.status==1){
				var no = 1;
				var str="";
                $.each(response.data.result,function(k,v){ 
					str+='<tr>';
						str+='<td width="10">'+no+'&nbsp;</td>';
						str+='<td>'+v.name+'</td>'; 
						str+='<td>'+v.detail+'</td>';
						str+='<td><img height="70px" width="70px" src="'+basedomainpath+'public_assets/merchandise/'+v.image+'" ></td>';
						str+='<td>'+v.stock+'</td>';
						str+='<td>'+v.point+'</td> ';
						str+='<td align="center">';
							if (v.n_status==1) str+='<span class="green">Publish</span>';
							if (v.n_status==2) str+='<span class="orange">Unpublish</span>';
						str+='</td>';
						str+='<td align="center">';
							str+='<nobr> ';
							str+='<a href="'+basedomain+'merchandise/merchandiseedit?id='+v.id+'" class="red" >update</a>| <a href="'+basedomain+'merchandise/hapus?id='+v.id+'" class="red" onclick="return confirm("Are you sure you want to delete this?")">delete</a>';
							str+='</nobr>';
						str+='</td>';
					str+='</tr>';
					no++;
                });
                $('.viewmerchandiselist').html(str);
                
            }else{
               $('.viewmerchandiselist').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
             
            }
				}
			},"JSON");
		}
		
function paging_ajax_redeem(fungsi,start){
	
	$.post(basedomain+"redeemItem/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
		var no = 1;
		var str="";
		var checked1="";
		$.each(response.data.result,function(k,v){ 
			str+='<tr>';
				str+='<td width="10">'+no+'&nbsp;<input type="hidden" name="id" value="'+v.id+'"></td>';
				str+='<td>'+v.name+' '+v.last_name+'</td>';
				str+='<td>'+v.email+'</td>';
				str+='<td>'+v.address+'</td>';
				str+='<td>'+v.merchname+'</td>';
				str+='<td>'+v.phonenumber+'</td>';
				str+='<td>'+v.redeemdate+'</td>';  
				str+='<td align="center">';
				
				if (v.n_status==1){
							checked1 = "checked";
						}
				
				str+='<input type="checkbox" class="status" prop="'+v.id+'" '+checked1+' ';
			str+='</tr>';
			no++;
		});
		$('.viewredeemlist').html(str);
		
	}else{
	   $('.viewredeemlist').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
	 
	}
		}
	},"JSON");
}

function paging_ajax_auction(fungsi,start){
	
	$.post(basedomain+"auction/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
		var no = 1;
		var str="";
		$.each(response.data.result,function(k,v){ 
			str+='<tr>';
				str+='<td width="10">'+no+'&nbsp;</td>';
				str+='<td>'+v.title+'</td> ';
				str+='<td>'+v.content+'</td>';
				str+='<td><img height="70px" width="70px" src="'+basedomain+'public_assets/auctions/'+v.img+'" ></td>';
				str+='<td align="center"><nobr>'+v.created_date+'</nobr></td> ';
				str+='<td align="center">';
					if(v.n_status==1) str+='<span class="green">Publish</span>';
					if(v.n_status==2) str+='<span class="orange">Unpublish</span>';
				str+='</td>';
				str+='<td align="center">';
					str+='<nobr> ';
					str+='<a href="{$basedomain}auction/auctionedit?id='+v.id+'" class="red">Update</a>| <a href="{$basedomain}auction/hapus?id='+v.id+'" class="red" onclick="return confirm("Are you sure you want to delete this?")">delete</a>';
					str+='</nobr>';
				str+='</td>';
			str+='</tr>';
			no++;
		});
		$('.auctionlistpaging').html(str);
		
	}else{
	   $('.auctionlistpaging').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
	 
	}
		}
	},"JSON");
}

function paging_ajax_auction_winner(fungsi,start){
	
	$.post(basedomain+"auctionWinner/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
		var no = 1;
		var str="";
		$.each(response.data.result,function(k,v){ 
			str+='<tr>';
				str+='<td width="10">'+no+'&nbsp;<input type="hidden" name="id" value="'+v.id+'"></td>';
				str+='<td>'+v.name+' '+v.last_name+'</td>';
				str+='<td>'+v.title+'</td>';
				str+='<td>'+v.winner_date+'</td>';
				str+='<td>'+v.currentBid+'</td>  ';
			str+='</tr>	';
			no++;
		});
		$('.auctionwinnerlist').html(str);
		
	}else{
	   $('.auctionwinnerlist').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
	 
	}
		}
	},"JSON");
}
				