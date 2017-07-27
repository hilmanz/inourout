/*AJAX global call function*/
// data consist of:
// 	data.url
// 	data.param
function post_json(data){
		var response = jQuery.ajax({
                    type: "POST",
                    url: data.url,
                    data: data.params,
                    dataType: data.type
	            });
		return response;
}


App = Ember.Application.create({
	LOG_TRANSITIONS: true
});

App.ApplicationAdapter = DS.RESTAdapter.extend();

App.Router.map(function() {
  this.route("ba", { path: "/ba" });
  this.route("user", { path: "/user" });
  this.route("ga", { path: "/ga" });
  this.route("badge", { path: "/badge" });
  this.route("topvisitedpage", { path: "/topvisitedpage" });
  this.route("game", { path: "/game" });
  this.route("redeem", { path: "/redeem" });
  this.route("auction", { path: "/auction" });
  this.route("device", { path: "/device" });
});


App.GaRoute = Ember.Route.extend({
	model: function(params){
		
	}

});
//badge page
App.BadgeRoute = Ember.Route.extend({
	model: function(params) {
		var data = {};
	    data.url='home/badgesRouteActivities';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){

		});
	},
	afterModel: function(params){
		setTimeout(loadDatePicker,3000);	
	}
});

//user page
App.UserRoute = Ember.Route.extend({
	model: function(params) {
		var data = {};
	    data.url='home/userActicity';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){
			try{
				if(response.top_10_participant.status==1){
					var result_data = response.top_10_participant.data;
					var htm='';
					htm+='<div class="row">';
						htm+='<div class="top-participant col-lg-12 ">';
							htm+='<div class="table-info">';
								htm+='<table class="table table-bordered table-hover tablesorter">';
									htm+='<thead class="tittle-table">';
										htm+='<tr><td class="orange" colspan="10"><span class="icon-star"></span><span class="title-table">TOP 10 PARTICIPANT</span></td></tr>';
									htm+='</thead>';
									htm+='<tbody>';
									htm+='<tr class="top_name centerText">';
									htm+='</tr>';
									htm+='<tr class="top_photo centerText">';
									htm+='</tr>';							
									htm+='</tbody>';
								htm+='</table>';
							htm+='</div>';
						htm+='</div>    ';   
					htm+='</div>';
					$("#users .content-chart").append(htm);
					var names='';
					var photos='';
					$.each(result_data,function(k,v){
						names+='<td>'+v.name+'</td>';
						photos+='<td><img width="65" src='+basedomain+'../public_assets/profile/'+v.img_profile+'></td>';
					});
					$("#users .content-chart").find('.top-participant').find('.top_name').html(names);
					$("#users .content-chart").find('.top-participant').find('.top_photo').html(photos);
				
					
				}

				
					//template
					var htm='';
					htm+='<div class="row">';
						htm+='<div class="demographic-data col-lg-12 ">';
							htm+='<div class="table-info">';
								htm+='<table class="table table-bordered table-hover tablesorter">';
									htm+='<thead class="tittle-table">';
										htm+='<tr><td class="orange" colspan="3"><span class="icon-pie"></span><span class="title-table">DEMOGRAPHIC DATA</span></td></tr>';
										htm+='<tr class="dyn_subtitle">';
										htm+='</tr>';
										htm+='</thead>';
										htm+='<tbody>';
										htm+='<tr class="dyn_data">';										
										htm+='</tr>';
									htm+='</tbody>';
								htm+='</table>';
							htm+='</div>';
						htm+='</div>';
					htm+='</div>';
					$("#users .content-chart").append(htm);
				if(response.age_percentage.status==1){
					//data
					var dyn_subtitle='<td>'+response.age_percentage.title+'</td>';
					var dyn_data='<td style="width:20%;"><div id="age_donut_chart" style="margin:0 auto;width:150px;height:150px;display:block;"></div></td>';
					$("#users .content-chart").find('.demographic-data').find('.dyn_subtitle').append(dyn_subtitle);
					$("#users .content-chart").find('.demographic-data').find('.dyn_data').append(dyn_data);

					var res = {};
					res.el='age_donut_chart';
					res.dat =response.age_percentage.data;
					var colors = Array();
					$.each(res.dat,function(k,v){
						colors.push(v.color);
					})
					res.col=colors,
					res.format="%";
					donut_chart(res);
				}
				if(response.gender_percentage.status==1){
					var dyn_subtitle='<td>'+response.gender_percentage.title+'</td>';
					var dyn_data='<td style="width:20%;"><div id="gender_donut_chart" style="margin:0 auto;width:150px;height:150px;display:block;"></div></td>';
					$("#users .content-chart").find('.demographic-data').find('.dyn_subtitle').append(dyn_subtitle);
					$("#users .content-chart").find('.demographic-data').find('.dyn_data').append(dyn_data);
					
					var res = {};
					res.el='gender_donut_chart';
					res.dat =response.gender_percentage.data;
					var colors = Array();
					$.each(res.dat,function(k,v){
						colors.push(v.color);
					})
					res.col=colors,
					res.format="%";
					donut_chart(res);
				}
				if(response.channel_bar.status==1){
					var dyn_subtitle='<td>Channel</td>';
					var dyn_data='<td style="width:60%;"><div id="channel_column_chart"></div></td>';
					$("#users .content-chart").find('.demographic-data').find('.dyn_subtitle').append(dyn_subtitle);
					$("#users .content-chart").find('.demographic-data').find('.dyn_data').append(dyn_data);


					var result_data={};
			        result_data.div = $("#users .content-chart").find('#channel_column_chart');
			        result_data.data = response.channel_bar.data;
			        result_data.height = 250;
			        single_column_chart(result_data);
				}

				if(response.city_bar.status==1){
					var htm='';
					htm+='<div class="row">';
						htm+='<div class="city-demo col-lg-12">';
							htm+='<div class="panel panel-primary">';
								htm+='<div class="panel-heading">';
									htm+='<h3 class="panel-title orange"><span class="icon-pie"></span>  '+response.city_bar.title+'</h3>';
								htm+='</div>';
								htm+='<div class="panel-body">';
								htm+='<div id="city_bar_chart"></div>';
								htm+='</div>';
							htm+='</div>';
						htm+='</div>';
					htm+='</div>';
					$("#users .content-chart").append(htm);
					var result_data={};
			        result_data.div = $("#users .content-chart").find('#city_bar_chart');
			        result_data.data = response.city_bar.data;
			        single_column_chart(result_data);
				}

				if(response.brand_bar.status==1){
					var htm='';
					htm+='<div class="row">';
						htm+='<div class="city-demo col-lg-12">';
							htm+='<div class="panel panel-primary">';
								htm+='<div class="panel-heading">';
									htm+='<h3 class="panel-title orange"><span class="icon-pie"></span>  '+response.brand_bar.title+'</h3>';
								htm+='</div>';
								htm+='<div class="panel-body">';
								htm+='<div id="brand_bar_chart"></div>';
								htm+='</div>';
							htm+='</div>';
						htm+='</div>';
					htm+='</div>';
					$("#users .content-chart").append(htm);
					var result_data={};
			        result_data.div = $("#users .content-chart").find('#brand_bar_chart');
			        result_data.data = response.brand_bar.data;
			        single_column_chart(result_data);
				}

				if(response.login_history.status==1){
					var htm='';
					htm+='<div class="row">';
						htm+='<div class="LoginHistory col-lg-12 ">';
							htm+='<div class="table-info">';
								htm+='<table class="table table-bordered table-hover tablesorter">';
									htm+='<thead class="tittle-table">';
										htm+='<tr><td class="orange" colspan="11"><span class="icon-database"></span><span class="title-table">'+response.login_history.title+'</span><div class="fr actionField">';
											htm+='<div id="ct-search" class="ct-search">';
											htm+='<div class="ct-search-input-wrap">';
											htm+='<input id="s" class="ct-search-input" type="text" name="s" value="" placeholder="Search...">';
											htm+='</div>';
											htm+='<input type="submit" value="" id="go" class="ct-search-submit">';
											htm+='<span class="ct-icon-search icon-search"></span>';
											htm+='</div> &nbsp; &nbsp; <a class="dateDownload icon-download" href="#"></a>';
											htm+='</div>';
										htm+='</td></tr>';
										htm+='<tr>';
											htm+='<th>User Name <i class="fa fa-sort"></i></th>';
											htm+='<th>First Login <i class="fa fa-sort"></i></th>';
											htm+='<th>Last Login <i class="fa fa-sort"></i></th>';
											htm+='<th>Total Login <i class="fa fa-sort"></i></th>';
											htm+='<th>Unique Login per Days <i class="fa fa-sort"></i></th>';
											htm+='<th>Average Visit Duration <i class="fa fa-sort"></i></th>';
										htm+='</tr>';
									htm+='</thead>';
									htm+='<tbody>';
										$.each(response.login_history.data,function(k,v){
											htm+='<tr>';
												htm+='<td>'+v.user_name+'</td>';
												htm+='<td>'+v.first_login+'</td>';
												htm+='<td>'+v.last_login+'</td>';
												htm+='<td>'+v.total_login+'</td>';
												htm+='<td>'+v.unique_login_per_days+'</td>';
												htm+='<td>'+Math.round((v.average_visit_duration)/60)+' Minutes</td>';
											htm+='</tr>';
										})
										
									htm+='</tbody>';
								htm+='</table>';
							htm+='</div>';
						htm+='</div>';    
					htm+='</div>';

					$("#users .content-chart").append(htm);
				}

				if(response.total_aspiration.status==1){
					var htm='';
					htm+='<div class="row">'; 
						htm+='<div class="totalAspiration col-lg-4">'; 
							htm+='<div class="panel panel-primary">'; 
								htm+='<div class="panel-heading">'; 
									htm+='<h3 class="panel-title orange"><span class="icon-bars"></span>&nbsp; '+response.total_aspiration.title+'</h3>'; 
								htm+='</div>'; 
								htm+='<div class="panel-body">'; 
									htm+='<h1>'+response.total_aspiration.data.total+'</h1>'; 
								htm+='</div>'; 
							htm+='</div>'; 
						htm+='</div>';   
					htm+='</div>';
					$("#users .content-chart").append(htm);
				}

				var htm='';
					htm+='<div class="row row_top_user">';
					htm+='</div>';
				$("#users .content-chart").append(htm);
				if(response.top_20_point.status==1){
					var htm='';				
						htm+='<div class="topuserPoint col-lg-6 ">';
							htm+='<div class="table-info">';
								htm+='<table class="table table-bordered table-hover tablesorter">';
									htm+='<thead class="tittle-table">';
										htm+='<tr><td class="orange" colspan="11"><span class="icon-star"></span><span class="title-table">'+response.top_20_point.title+'</span><div class="fr actionField"><a class="dateDownload icon-download" href="#"></a></div></td></tr>';
										htm+='<tr>';
											htm+='<th>Name <i class="fa fa-sort"></i></th>';
											htm+='<th>Total Point <i class="fa fa-sort"></i></th>';
										htm+='</tr>';
									htm+='</thead>';
									htm+='<tbody>';
									$.each(response.top_20_point.data,function(k,v){
										htm+='<tr>';
											htm+='<td>'+v.name+'</td>';
											htm+='<td>'+number_format(v.total_point)+'</td>';
										htm+='</tr>';
									});
									htm+='</tbody>';
								htm+='</table>';
							htm+='</div>';
						htm+='</div>';						     
					$("#users .content-chart").find('.row_top_user').append(htm);	
				}
				if(response.top_20_time.status==1){
					var htm='';				
						htm+='<div class="topuserPoint col-lg-6 ">';
							htm+='<div class="table-info">';
								htm+='<table class="table table-bordered table-hover tablesorter">';
									htm+='<thead class="tittle-table">';
										htm+='<tr><td class="orange" colspan="11"><span class="icon-star"></span><span class="title-table">'+response.top_20_time.title+'</span><div class="fr actionField"><a class="dateDownload icon-download" href="#"></a></div></td></tr>';
										htm+='<tr>';
											htm+='<th>Name <i class="fa fa-sort"></i></th>';
											htm+='<th>Total Average TimeSpent <i class="fa fa-sort"></i></th>';
										htm+='</tr>';
									htm+='</thead>';
									htm+='<tbody>';
									$.each(response.top_20_time.data,function(k,v){
										htm+='<tr>';
											htm+='<td>'+v.name+'</td>';
											htm+='<td>'+number_format(v.total_time)+' seconds</td>';
										htm+='</tr>';
									});
									htm+='</tbody>';
								htm+='</table>';
							htm+='</div>';
						htm+='</div>';						     
					$("#users .content-chart").find('.row_top_user').append(htm);					
				}

				var htm='';
					htm+='<div class="row total_login_daily">';
					htm+='</div>';
					$("#users .content-chart").append(htm);
				if(response.total_login_daily.status==1){
					var htm='';				
					htm+='<div class="totaluserlogin col-lg-12">';
						htm+='<div class="panel panel-primary">';
							htm+='<div class="panel-heading">';
								htm+='<h3 class="panel-title orange fl"><span class="icon-bars"></span>&nbsp; '+response.total_login_daily.title+'</h3>';
								htm+='<div class="fr actionField">';
									htm+='<div class="group-date fl">';
										htm+='<div class="input-daterange input-group innerInputDate" id="datepicker">';
											htm+='<div class="datefrom">';
												htm+='<input id="from3" type="text" class="input-sm form-control" name="start" /><span class="cal-icon icon-calendar"></span>';
											htm+='</div>';
											htm+='<span class="input-group-addon">to</span>';
											htm+='<div class="datefrom">';
												htm+='<input id="to3" type="text" class="input-sm form-control" name="end" /><span class="cal-icon icon-calendar"></span>';
											htm+='</div>';
										htm+='</div>';
									htm+='</div>';
								htm+='</div>';
							htm+='</div>';
							htm+='<div class="panel-body">';
								htm+='<div id="total_login_daily_chart"></div>';
							htm+='</div>';
						htm+='</div>';
					htm+='</div>';
					$("#users .content-chart").find('.total_login_daily').append(htm);	
					var result_data={};
			        result_data.div = $("#users .content-chart").find('#total_login_daily_chart');
			        result_data.data = response.total_login_daily.data;
			        single_column_chart(result_data);				
				}

				var htm='';
					htm+='<div class="row three_type_verified">';
					htm+='</div>';
					$("#users .content-chart").append(htm);
				if(response.verified_user_data.status==1){
					var htm='';				
					htm+='<div class="number-registration col-lg-12 ">';
						htm+='<div class="table-info">';
							htm+='<table class="table table-bordered table-hover tablesorter">';
								htm+='<thead class="tittle-table">';
									htm+='<tr><td class="orange" colspan="3"><span class="icon-pie"></span><span class="title-table">'+response.verified_user_data.title+'</span></td></tr>';
									htm+='<tr class="centerText">';
										htm+='<td>Verified User</td>';
										htm+='<td>Not Verified User</td>';
										htm+='<td>Total</td>';
										htm+='<td>Age</td>';
									htm+='</tr>';
								htm+='</thead>';
								htm+='<tbody>';
									htm+='<tr>';
										htm+='<td class="centerText" style="width:15%;">';
											htm+='<h1>'+number_format(response.verified_user_data.data.total.Verified)+'</h1>';
										htm+='</td>';
										htm+='<td class="centerText" style="width:15%;">';
											htm+='<h1>'+number_format(response.verified_user_data.data.total.Unverified)+'</h1>';
										htm+='</td>';
									htm+='<td style="width:50%;">';
										htm+='<div id="tyv_line"></div>';
									htm+='</td>';
									htm+='<td style="width:20%;"><div id="tyv_donut" style="height: 150px;margin: 0 auto;width: 150px;"></td>';
									htm+='</tr>';
								htm+='</tbody>';
							htm+='</table>';
						htm+='</div>';
					htm+='</div>';
					$("#users .content-chart").find('.three_type_verified').append(htm);	
					var result_data={};
			        result_data.div = $("#users .content-chart").find('#tyv_line');
			        result_data.data = response.verified_user_data.data.daily;
			        result_data.title = 'Total';
			        single_line_chart_utc(result_data);

			        var res = {};
					res.el='tyv_donut';
					res.dat =response.age_percentage.data;
					var colors = Array();
					$.each(res.dat,function(k,v){
						colors.push(v.color);
					})
					res.col=colors,
					res.format="%";
					donut_chart(res);		
				}
			}catch(e){}
		});
	},
	afterModel: function(params){
		setTimeout(loadDatePicker,3000);
		
		
	}
});	



//brand engagement/Index
App.IndexRoute = Ember.Route.extend({
	model: function(params) {
		var data = {};
	    data.url='home/loginActivity';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){
			try{
				if(response.login_total.status==1){
					var rdata = response.login_total.data;
					//Total
					var htm='';
						htm+='<div class="row">';
						htm+='<div class="numberOflogin col-lg-12 ">';
						htm+='<div class="table-info">';
						htm+='<table class="table table-bordered table-hover table-striped tablesorter">';
						htm+='<thead class="tittle-table orange">';
						htm+='<tr><td colspan="2"><span class="icon-graph"></span><span class="title-table">'+response.login_total.title+'</span></td></tr></thead>';
						htm+='<tbody>';
						htm+='<tr style="text-align:center;">';
						htm+='<td><h3 class="number-trade">'+rdata.unik_user.num+'</h3><h4 class="info-number orange">'+rdata.unik_user.title+'</h4></td>';
						htm+='<td><h3 class="number-trade">'+rdata.total.num+'</h3><h4 class="info-number orange">'+rdata.total.title+'</h4></td>';
						htm+='</tr>';
						htm+='</tbody>';
						htm+='</table>';
						htm+='</div>';
						htm+='</div>';
						htm+='</div>';
			        $("#brand_engagement .content-chart").append(htm);
					
					//Daily
					var htm='';
						htm+='<div class="row">';
							htm+='<div class="uniqVisitorLogin col-lg-12 ">';
								htm+='<div class="panel panel-primary">';
									htm+='<div class="panel-heading">';
									htm+='<h3 class="panel-title orange"><span class="icon-graph"></span>&nbsp; '+response.login_daily.data.title+'</h3>';
									htm+='</div>';
								htm+='<div class="panel-body">';
									htm+='<div id="daily_unique_visitor_login"></div>';
								htm+='</div>';
								htm+='</div>';
							htm+='</div>';
						htm+='</div>';
					
			        $("#brand_engagement .content-chart").append(htm);
			        
			        var result_data={};
			        result_data.div = $("#brand_engagement .content-chart").find('#daily_unique_visitor_login');
			        result_data.data = response.login_daily.data;
			        single_line_chart(result_data);
				}
			}catch(e){}
		});
		

		//Game Activity
		var data = {};
	    data.url='home/gameActivity';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){
			try{
				if(response.game_total.status==1){
					//Total
					var rdata = response.game_total.data;
					var htm='';
						htm+='<div class="row">';
							htm+='<div class="BadgesTrading col-lg-12">';
								htm+='<div class="game_total table-info">';
								
								htm+='</div>';
							htm+='</div>';  
						htm+='</div>';
					
			        $("#brand_engagement .content-chart").append(htm);
			        var table = "";
						table+='<table class="table table-bordered table-hover tablesorter">';
						table+='<thead class="tittle-table">';
						table+='<tr><td class="orange" colspan="6"><span class="icon-vcard"></span><span class="title-table">TOTAL GAME PLAYED BY UNIQUE VISITORS & USERS</span></td></tr>';
						
						table+='<tr>';
						$.each(rdata,function(k,v){
				        	table+='<td colspan="2">Game '+v.gamesid+'</td>';
				        });
						table+='</tr>';

						table+='<tr>';
						$.each(rdata,function(k,v){
							table+='<th>Unique <i class="fa fa-sort"></i></th>';
							table+='<th>Total <i class="fa fa-sort"></i></th>';
						});
						table+='</tr>';
						table+='</thead>';
						table+='<tbody>';
						table+='<tr class="centerText">';
						$.each(rdata,function(k,v){
					        table+='<td><h1>'+v.unik_user+'</h1></td>';
					        table+='<td><h1>'+v.total+'</h1></td>';
				    	});
						table+='</tr>';
						table+='</tbody>';
						table+='</table>';
			        
				    $("#brand_engagement .content-chart").find('.game_total').html(table);
				}
			}catch(e){}
		});

		//Badges and Trades Activity
		var data = {};
	    data.url='home/badgeActivity';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){
			try{
				if(response.total_trade.status==1){
				}
			}catch(e){}
		});

		//Auction Activity
		var data = {};
	    data.url='home/auctionActivity';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){
			try{
				if(response.auction.status==1){
					var result_data = response.auction.data;
					var htm='';
					htm+='<div class="row">';
				     	htm+='<div class="auction col-lg-12 ">';
				    		htm+='<div class="auction_table table-info">';
				          
				      		htm+='</div>';
				      	htm+='</div>';
				    htm+='</div>';
				    $("#brand_engagement .content-chart").append(htm);

					var table = "";
						table+='<table class="table table-bordered table-hover tablesorter">';
							table+='<thead class="tittle-table">';
								table+='<tr><td class="orange" colspan="6"><span class="icon-feather"></span><span class="title-table">'+response.auction.title+'</span></td></tr>';
								table+='<tr>';
								var ii=0;
								$.each(result_data,function(k,v){
									$.each(v,function(kk,vv){
										if(ii==0&&kk!='title'){
											table+='<td colspan="2">'+kk+'</td>';
										}
									});
									ii++;
								});
								table+='</tr>';
								table+='<tr>';
								var ii=0;
								$.each(result_data,function(k,v){
									$.each(v,function(kk,vv){
										if(ii==0&&kk!='title'){
											table+='<th>Auction <i class="fa fa-sort"></i></th>';
											table+='<th>Total <i class="fa fa-sort"></i></th>';
										}
									});
									ii++;
								});
								table+='</tr>';
							table+='</head>';
							table+='<tbody>';
								
								$.each(result_data,function(k,v){
									var ii=0;							
									table+='<tr class="centerText">';
									$.each(v,function(kk,vv){
										if(ii!=0&&kk!='title'){
											table+='<td>'+v.title+'</td>';
											table+='<td>'+vv+'</td>';
										}
										ii++;
									});
									
									table+='</tr>';
								});
							table+='</tbody>';
						table+='</table>';
					$("#brand_engagement .content-chart").find('.auction_table').html(table);
				}
			}catch(e){}
		});

		//Auction Activity
		var data = {};
	    data.url='home/redeemActivity';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){
			try{
				var htm='';
				htm+='<div class="row">';
					htm+='<div class="codeAndRedeem">';
			          
			      	htm+='</div>';
			    htm+='</div>';
			    $("#brand_engagement .content-chart").append(htm);
				if(response.redeem_code.status==1){
					var htm='';
					var result_data = response.redeem_code.data;
					htm+='<div class=" col-lg-6">';
						htm+='<div class="table-responsive">';
							htm+='<table class="table table-bordered table-hover tablesorter">';
								htm+='<thead class="tittle-table">';
									htm+='<tr><td class="orange"><span class="icon-language"></span><span class="title-table">'+response.redeem_code.title+'</span></td></tr>';
									htm+='<tr>';
									htm+='<td>'+response.redeem_code.subtitle+'</td>';
									htm+='</tr>';
								htm+='</thead>';
								htm+='<tbody class="centerText">';
									htm+='<tr><td><h1 style="font-size:92px;">'+result_data.total+'</h1></td></tr>';
								htm+='</tbody>';
							htm+='</table>';
						htm+='</div>';
					htm+='</div>';

					$("#brand_engagement .content-chart").find('.codeAndRedeem').append(htm);
				}

				if(response.redeem_merchandise.status==1){
					var htm='';
					var result_data = response.redeem_merchandise.data;
					htm+='<div class=" col-lg-6">';
						htm+='<div class="table-responsive">';
							htm+='<table class="table table-bordered table-hover tablesorter">';
								htm+='<thead class="tittle-table">';
									htm+='<tr><td class="orange"><span class="icon-tag"></span><span class="title-table">'+response.redeem_merchandise.title+'</span></td></tr>';
									htm+='<tr>';
									htm+='<td colspan="2">'+response.redeem_merchandise.subtitle+'</td>';
									htm+='</tr>';
									htm+='<tr>';
									htm+='<th>Item Name <i class="fa fa-sort"></i></th>';
									htm+='<th>Total<i class="fa fa-sort"></i></th>';
									htm+='</tr>';
								htm+='</thead>';
								htm+='<tbody class="centerText">';
									$.each(result_data,function(k,v){
										htm+='<tr><td>'+v.name+'</td><td>'+v.total+'</td></tr>';
									});
								htm+='</tbody>';
							htm+='</table>';
						htm+='</div>';
					htm+='</div>';

					$("#brand_engagement .content-chart").find('.codeAndRedeem').append(htm);
				}
			}catch(e){}
		})

 
		//Article Activity (note: structure ini yg gw pake)
		var data = {};
	    data.url='home/articleActivity';
	    data.params={ajax:1};
	    data.type="json";
		post_json(data).done(function(response){
			try{
				var htm='';
				htm+='<div class="row">';
		     		htm+='<div class="readArticle col-lg-12 ">';
		    			htm+='<div class="article_activity table-info">';
							htm+='<table class="table table-bordered table-hover tablesorter">';
					        	htm+='<thead class="tittle-table">';
					            	htm+='<tr><td class="orange" colspan="9"><span class="icon-book"></span><span class="title-table">READ ARTICLE (News Update)</span></td></tr>';
			          				htm+='<tr class="dyn_subtitle"></tr>';
			          			htm+='</thead>';
			          			htm+='<tbody class="centerText">';
			          			htm+='<tr class="dyn_data">';
			          			htm+='</tr>';
			          			htm+='</tbody>';
			          		htm+='</table>';
			      		htm+='</div>';
			      	htm+='</div>';
			    htm+='</div>';
			    $("#brand_engagement .content-chart").append(htm);

			    if(response.total_read_article.status==1){
			    	var subtitle='';
			    	subtitle+='<td>'+response.total_read_article.title+'</td>';		        	
			    	$("#brand_engagement .content-chart").find('.dyn_subtitle').append(subtitle);
			    	var total_read_article = '<td rowspan="5"><h1 style="font-size:82px;">'+response.total_read_article.data.total+'</h1></td>';
			    	$("#brand_engagement .content-chart").find('.article_activity').find('.dyn_data').append(total_read_article);
			    }
			    if(response.most_read.status==1){
			    	var subtitle='';
			    	subtitle+='<td colspan="2">'+response.most_read.title+'</td>';		        	
			    	$("#brand_engagement .content-chart").find('.article_activity').find('.dyn_subtitle').append(subtitle);
					var tbl_1 = '';
					var tbl = '';
					$.each(response.most_read.data,function(k,v){
						if(k==0){
							tbl_1+='<td>'+v.names+'</td>';
							tbl_1+='<td>'+v.total+'</td>';
						}else{
							tbl+='<tr>';
							tbl+='<td>'+v.names+'</td>';
							tbl+='<td>'+v.total+'</td>';
							tbl+='</tr>';
						}
					});		    	

			    	$("#brand_engagement .content-chart").find('.article_activity').find('.dyn_data').append(tbl_1);
			    	$("#brand_engagement .content-chart").find('.article_activity').find('.centerText').append(tbl);
			    }
			    if(response.least_read.status==1){
			    	var subtitle='';
			    	subtitle+='<td colspan="2">'+response.least_read.title+'</td>';		        	
			    	$("#brand_engagement .content-chart").find('.article_activity').find('.dyn_subtitle').append(subtitle);
					var tbl_1 = '';
					var tbl = '';
					$.each(response.least_read.data,function(k,v){
						if(k==0){
							tbl_1+='<td>'+v.names+'</td>';
							tbl_1+='<td>'+v.total+'</td>';
						}else{
							//tbl+='<tr>';
							tbl+='<td>'+v.names+'</td>';
							tbl+='<td>'+v.total+'</td>';
							//tbl+='</tr>';
							$("#brand_engagement .content-chart").find('.article_activity').find('.centerText').find('tr:eq('+k+')').append(tbl);
						}
					});		    	

			    	$("#brand_engagement .content-chart").find('.article_activity').find('.dyn_data').append(tbl_1);
			    	
			    }
			}catch(e){}
		});
	},
	afterModel: function(params){
		setTimeout(loadDatePicker,3000);
	}


});

//Draw Widgets
function draw_widgets(ID){
	var container = $('#'+ID.divID+' table tbody');
	container.html('<div style="width:100%;display:block;height:100px;text-align:center;"><img src="images/sos-loader.gif" width="142" height="18" style="margin: 50px auto;" /></div>');
	smac_api(smac_api_url+'?method=widgets&action=load',function(response){
		container.html('');
		if(response.data!=null){
			$.each(response.data,function(k,v){
				
				var table_data = {table:ID.divID,
									label:v.wLabel,
									report_type:v.wReportType,
									topic:v.wTopic,
									topic_isu:v.wTopicIsu,
									topic_multiple:v.wTopicMultiple,
									topic_multiple_2:v.wTopicMultiple2,
									topic_candidateNparty: v.wTopicPartyCandidate,
									channel:v.wChannel,
									channel2:v.wChannel2,
									sentiments:v.wSentiment,
									rangeTime: v.wRangeTime,
									dimension:{colspan:v.wColspan,rowspan:v.wRowspan},
									widget_id:v.widget_id,
									containerBox:v.wContainer};
				draw_table(table_data,true);
			});	
		}else{
			$('#home table tbody').html('<div style="width:100%;display:block;height:100px;text-align:center;"><p>WIDGET BELUM TERSEDIA.</p></div>');
		}
	});
}

function draw_table(table_data,load){
	var arrCol = [1,2,3,4,5];
	var rows = parseInt(table_data.dimension.rowspan);
	var columns = parseInt(table_data.dimension.colspan);
	var table = $('#'+table_data.table+' > .widgets > tbody');
	var tr = table.find('tr').length;
	var selected_col,selected_row;
	//////////////console.log(table_data.widget_id);
	if(tr==0){ //If there is no data on table
		var col_left  = 5-columns;
		selected_col=1;
		selected_row=1;
		for(var i=1;i<=rows;i++){
			table.append('<tr data-row="'+i+'" data-col="'+col_left+'"></tr>');
		}
		if(table_data.containerBox){
			global_widget_div = table_data.containerBox;
		}else{
			global_widget_div = table_data.table+'rt'+table_data.report_type+'x'+table_data.dimension.colspan+'y'+table_data.dimension.rowspan+'c'+selected_col+'r'+selected_row;
		}
		var td ='<td valign="top" data-col="'+selected_col+'" colspan="'+columns+'" rowspan="'+rows+'" width="'+(columns*20)+'%">';
			td+='<div class="box">';	
			td+='<div class="darkbox">';
			td+='<div class="entryBox" data-x="'+columns+'" data-y="'+rows+'" style="height:'+((rows==1)?100:(100+((rows-1)*150)))+'px;">';
				td+='<div class="titleBox">';
				td+='<h2>'+table_data.label+'</h2>';
				td+='</div>';
				td+='<div id="'+global_widget_div+'" class="widget_content" style="height:'+((rows==1)?100:(100+((rows-1)*150)))+'px;margin: -25px auto 0px;">';
				td+='</div>';
				td+='<div class="footBox">';
				td+='<a href="#widget/fullscreen/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_view fr">&nbsp;</a>';
				td+='<a href="#widget/edit/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_setting fr">&nbsp;</a>';
				td+='<a href="#widget/delete/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_setting icon_trash fr">&nbsp;</a>';
				td+='</div>';
			td+='</div>';
			td+='</div>';
			td+='</div></td>';
		table.find('tr').eq(0).append(td);
	}else{
		var checkTDisExist = {isExist:false,onRow:0};
		//////console.log(tr+'--'+rows);
		var newTR = tr;
		if(tr<rows){ //create new row
			var col_left  = 5-columns;
			for(var i=tr;i<rows;i++){
				table.append('<tr data-row="'+(i+1)+'" data-col="5"></tr>');
				// //////////////console.log(i);
				newTR = newTR+1;
			}
		}	
		
		for(var i=0;i<newTR;i++){ //check if column is available
			var checkTD = (table.find('tr').eq(i).data('col')) - columns;
			//////console.log(checkTD);
			if(checkTD>=0){
				checkTDisExist={isExist:true,onRow:i+1};
				break;
			}
			
		}
		
		if(checkTDisExist.isExist){ //if column exist
			//////console.log('if TD exist/false on existing row');
			var checkNextTD = true;
			if(rows>1){ //check if in every row  has 'TD' available/exist
				var nextTDRow = parseInt(checkTDisExist.onRow);
				for(var i=0;i<rows;i++){
					var checkTD = (table.find('tr').eq(nextTDRow-1).data('col')) - columns;
					nextTDRow++;
					if(checkTD<0){
						checkNextTD = false;
						break;
					}
				}
			}
			
			if(checkNextTD==false){
				var trLength = (table.find('tr').length)+1;
				checkTDisExist={isExist:true,onRow:trLength};
				var col_left  = 5-columns;
				for(var i=0;i<(rows-1);i++){
					table.append('<tr data-row="'+trLength+'" data-col="5"></tr>');
					trLength++;
				}
				
				checkNextTD=true;
			}
			
			
			if(checkNextTD){			
				selected_col = arrCol[table.find('tr').eq(checkTDisExist.onRow-1).data('col')];
				selected_row = checkTDisExist.onRow;
				if(table_data.containerBox){
					global_widget_div = table_data.containerBox;
				}else{
					global_widget_div = table_data.table+'rt'+table_data.report_type+'x'+table_data.dimension.colspan+'y'+table_data.dimension.rowspan+'c'+selected_col+'r'+selected_row;
				}
				var td = '<td valign="top" data-col="'+selected_col+'" colspan="'+columns+'" rowspan="'+rows+'" width="'+(columns*20)+'%">';
					td+='<div class="box">';
					td+='<div class="darkbox">';
					td+='<div class="entryBox" data-x="'+columns+'" data-y="'+rows+'" style="height:'+((rows==1)?100:(100+((rows-1)*150)))+'px;">';
						td+='<div class="titleBox">';
						td+='<h2>'+table_data.label+'</h2>';
						td+='</div>';
						td+='<div id="'+global_widget_div+'" class="widget_content" style="height:'+((rows==1)?100:(100+((rows-1)*150)))+'px;margin: -25px auto 0px;">';
						td+='</div>';
						td+='<div class="footBox">';
						td+='<a href="#widget/fullscreen/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_view fr">&nbsp;</a>';
						td+='<a href="#widget/edit/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_setting fr">&nbsp;</a>';
						td+='<a href="#widget/delete/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_setting icon_trash fr">&nbsp;</a>';
						td+='</div>';
					td+='</div>';
					td+='</div>';
					td+='</div></td>';
				//update data-log on row
				if(rows>1){
					var eqs = checkTDisExist.onRow;
					for(var i=0;i<rows;i++){
						var updateDataRow = table.find('tr').eq(eqs-1).data('col')-columns;
						table.find('tr').eq(eqs-1).data({'col':updateDataRow});
						eqs++;
					}
				}else{
					var updateDataRow = table.find('tr').eq((checkTDisExist.onRow-1)).data('col')-columns;
					
					table.find('tr').eq((checkTDisExist.onRow-1)).data({'col':updateDataRow})
				}
				table.find('tr').eq((checkTDisExist.onRow-1)).append(td);
			}
		}else{ //if TD not exist/false on existing row
			//////console.log('if TD not exist/false on existing row');
			var trLength = (table.find('tr').length)+1;
			var col_left  = 5-columns;
			selected_col = 1;
			selected_row=trLength;
			for(var i=0;i<rows;i++){
				table.append('<tr data-row="'+trLength+'" data-col="'+col_left+'"></tr>');
				trLength++;
			}
			if(table_data.containerBox){
				global_widget_div = table_data.containerBox;
			}else{
				global_widget_div = table_data.table+'rt'+table_data.report_type+'x'+table_data.dimension.colspan+'y'+table_data.dimension.rowspan+'c'+selected_col+'r'+selected_row;
			}
			var td ='<td valign="top" data-col="'+selected_col+'" colspan="'+columns+'" rowspan="'+rows+'" width="'+(columns*20)+'%">';
				td+='<div class="box">';
				td+='<div class="darkbox">';
				td+='<div class="entryBox" data-x="'+columns+'" data-y="'+rows+'" style="height:'+((rows==1)?100:(100+((rows-1)*150)))+'px;">';
					td+='<div class="titleBox">';
					td+='<h2>'+table_data.label+'</h2>';
					td+='</div>';
					td+='<div id="'+global_widget_div+'" class="widget_content" style="height:'+((rows==1)?100:(100+((rows-1)*150)))+'px;margin: -25px auto 0px;">';
					td+='</div>';
					td+='<div class="footBox">';
					td+='<a href="#widget/fullscreen/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_view fr">&nbsp;</a>';
					td+='<a href="#widget/edit/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_setting fr">&nbsp;</a>';
					td+='<a href="#widget/delete/'+global_widget_div+'/'+table_data.widget_id+'" class="icon_setting icon_trash fr">&nbsp;</a>';
					td+='</div>';
				td+='</div>';
				td+='</div>';
				td+='</div></td>';
			table.find('tr').eq((selected_row-1)).append(td);
		}
		
	}
	
	//load data on widget
	if(load==true){
		load_widget_data(global_widget_div,table_data);
	}
	
	var checkTable = $('#home table tbody').find('tr').length;
	if(checkTable==0){
		$('#home table tbody').html('<div class="nodata" style="width:100%;display:block;height:100px;text-align:center;"><p>WIDGET BELUM TERSEDIA.</p></div>');
	}else{
		$('.nodata').remove();
	}
	
	//temporary mute
	// dimensionAdjustment(true);
	
	//unbindHover and bind
	unbindHover();
	bindHover();
}

function load_widget_data(div,table_data){
	//////console.log(table_data);
	var content_div = $('#'+div);
	var icon="";
	var sentiment="";
	var arrGroupType = [0,0,0,1,2,3,5,0];
	if(table_data.report_type){
		if(table_data.report_type=='6'){
			var channel = parseInt(table_data.channel2);
		}else if(table_data.report_type=='7'){
			var channel = parseInt(table_data.channel2);
			if(table_data.sentiments=='0'){
				sentiment=' : <span style="color: #8DC44A;">positif</span>';
			}else{
				sentiment=' : <span style="color: #EE1C24;">negatif</span>';
			}
		}else{
			var channel = parseInt(table_data.channel);
		}
	}
	var siteType = "";
	////////console.log(div);
	content_div.html('<p style="text-align:center;margin-top:50px;"><img src="images/sos-loader.gif" width="142" height="18" style="margin: 0 auto;" /></p>');
	if(channel==1){
		icon='<img src="images/icon_twitter.png" width="30" style="margin: -7px 0 0;"></img> ';
	}else if(channel==2){
		icon='<img src="images/icon_facebook.png" width="30" style="margin: -7px 0 0;"></img> ';
	}else if(channel>2){
		if(arrGroupType[channel]==1){
			siteType=' <span style="text-transform: lowercase;">(<span style="color:#999;">blog</span>)</span>';
		}else if(arrGroupType[channel]==2){
			siteType=' <span style="text-transform: lowercase;">(<span style="color:#999;">forum</span>)</span>';
		}else if(arrGroupType[channel]==3){
			siteType=' <span style="text-transform: lowercase;">(<span style="color:#999;">berita</span>)</span>';
		}else if(arrGroupType[channel]==5){
			siteType=' <span style="text-transform: lowercase;">(<span style="color:#999;">ecommerce</span>)</span>';
		}else if(arrGroupType[channel]==0){
			siteType=' <span style="text-transform: lowercase;">(<span style="color:#999;">corporate/personal</span>)</span>';
		}
		
		icon='<img src="images/icon_rss.png" width="30" style="margin: -7px 0 0;"></img> ';
	}
	content_div.closest('.entryBox').find('.titleBox h2:eq(0)').html(icon+table_data.label+siteType+sentiment);
	content_div.closest('.entryBox').find('.titleBox h2:eq(1)').remove();
	//////console.log(table_data.report_type);
	////////////console.log('ffffff',table_data);
	switch(table_data.rangeTime){
		case 'd':
			table_data.rangeTime = intval(strtotime(date('Y-m-d') +' -1 day'));
		break;
		case 'w':
			table_data.rangeTime = intval(strtotime(date('Y-m-d') +' -7 day'));
		break;
		default:
			table_data.rangeTime = intval(table_data.rangeTime);
		break;
	}
	switch(table_data.report_type){
		case '1':
			widget_volume_summary(div,table_data);
			break;
		case '2':
			widget_daily_topic(div,table_data);
			break;
		case '3':
			$('#'+div).css({'margin':'0 auto'});
			widget_top_keywords(div,table_data);
			break;
		case '4':
			$('#'+div).css({'margin':'0 auto'});
			widget_conversations(div,table_data);
			break;
		case '5':
			widget_sentiment(div,table_data);
			break;
		case '6':
			widget_custom_bar_chart(div,table_data);
			break;
		case '7':
			widget_influencer(div,0,table_data);
			break;
		case '8':
			widget_potential_impact_index(div,table_data);
			break;
		case '9':
			widget_interaction_rate(div,table_data);
			break;
		case '10':
			$('#'+div).css({'margin':'0 auto'});
			load_map_live_track(div,table_data);
			break;
		case '11':
			$('#'+div).css({'margin':'0 auto'});
			load_map_tampilan(div,table_data);
			break;
		case '12':
			widget_compare(div,table_data);
			break;
		case '13':
			widget_perfomance_party_on_issues(div,table_data);
			break;
		case '14':
			widget_comparing_party(div,table_data);
			break;
		case '15':
			widget_comparing_candidate(div,table_data);
			break;
		case '16':
			widget_load_partyNcandidate(div,table_data);
			break;
		case '16_pie_control':
			widget_party_and_theCandidate(div,table_data);
			break;
		case '17':
			widget_perfomance_candidate_on_issues(div,table_data);
			break;
		default:
			//////////////console.log('foo');
	}
}

//hover on dynamic dom
function bindHover(){
	$('.entryBox').hover(function(){
		$(this).find('.footBox').animate({bottom:'0px'},{queue:false,duration:500});
	}, function(){
		$(this).find('.footBox').animate({bottom:'-40px'},{queue:false,duration:500});
	});
}
function unbindHover(){
	$('.entryBox').off('mouseenter mouseleave');
}


function donut_chart(response){
	Morris.Donut({
	  element: response.el,
	  data: response.dat,
	  colors:response.col,
	  formatter: function (y) { return y + response.format ;}
	});
}

function bar_chart(response){
	Morris.Bar ({
	  element: 'morris-chart-bar-channel',
	  data: [
		{device: 'iPhone', geekbench: 136},
		{device: 'iPhone 3G', geekbench: 137},
		{device: 'iPhone 3GS', geekbench: 275},
	  ],
	  xkey: 'device',
	  barColors:['#fca31d'],
	  ykeys: ['geekbench'],
	  labels: ['Geekbench'],
	  barRatio: 0.4,
	  hideHover: 'auto',
	});
}