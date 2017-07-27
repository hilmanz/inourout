
	function pastAuctionList(v)
	{
		
		
		var html = "";
		var listqueue = ["odd","even"];
		var current = $('#pastAuction').attr('lastqueue');
		if (current==listqueue[0])queue = listqueue[1];
		else queue = listqueue[0];
			
		$('#pastAuction').attr('lastqueue',queue);
		
		html += "<div class='box-prof'>";
		html += "	<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
		html += "	  <tr class='"+queue+"' id='listqueue'>";
		html += "		<td valign='top'>";
		html += "			<a href='#' class='thumbPrizes'><img src='"+v.auctions.image_full_path+"' /></a>";
		html += "		</td>";
		html += "		<td valign='top'>";
		html += "			<div class='prizeDesc'>";
		html += "				<p class='date'>"+v.start_date+"</p>";
		html += "				<h3>"+v.title+"</h3>";
		html += "				<p>"+v.content+"</p>";
		html += "			</div>";
		html += "			 <div class='auctionWinner'>";
		html += "				<h3>Auction winner:</h3>";
		html += "				<div class='userWinner'>";
		html += "					<span class='small-thumb'><img src='"+v.profile.image_full_path+"' /></span>";
		// html += "					<a href='"+basedomain+"profile/"+v.userid+"' class='small-thumb'><img src='"+v.profile.image_full_path+"' /></a>";
		html += "					<div class='fl'>";
		html += "						<h2 class='account-name'>"+v.name+" "+v.last_name+"</h2>";
		html += "					</div>";
		html += "				</div>";
		html += "			</div>";
		html += "		</td>";
		html += "	  </tr>";
		html += "	  </table>";
		html += "</div>";
		
		
		return html;
	}
	
	function todayAuctionList(v)
	{
		
		var html = "";
		var listqueue = ["odd","even"];
		var current = $('#todayAuction').attr('lastqueue');
		if (current==listqueue[0])queue = listqueue[1];
		else queue = listqueue[0];
		
		//auctionCountDown(v);
		
		$('#todayAuction').attr('lastqueue',queue);
		
		html += "<tr class='"+v.queue+"'>";
        html += "    <td valign='top'>";
        html += "    	<div class='prizeAuction'>";
        html += "        <a href='#' class='thumbPrizes '><img src='"+v.auctions.image_full_path+"' /></a>";
        html += "        </div>";
        html += "    <div style='position:relative;'>";
        html += "        <div class='prizeDesc'>";
        html += "            <h3>"+v.title+"</h3>";
        html += "            <p>"+v.content+"</p>";
        html += "        </div>";
        html += "        <div class='timeLeft'>";
        html += "            <h3>Time left for auction:</h3>";
        html += "            <div id='countdown_auction_"+v.id+"' class='countdown'>";
        html += "                <div class='dash hours_dash'>";
        html += "                    <div class='digit'>0</div>";
        html += "                    <div class='digit'>0</div>";
        html += "                    <span class='dash_title'>HR</span>";
        html += "                </div>";
        html += "                <div class='dash minutes_dash'>";
        html += "                    <div class='digit'>0</div>";
        html += "                    <div class='digit'>0</div>";
        html += "                    <span class='dash_title'>M</span>";
        html += "                </div>";
        html += "                <div class='dash seconds_dash'>";
        html += "                    <div class='digit'>0</div>";
        html += "                    <div class='digit'>0</div>";
        html += "                    <span class='dash_title'>S</span>";
        html += "                </div>";
        html += "            </div>";
        html += "        </div>";
        html += "        <div class='currentBid'>";
        html += "        	<div class='bidStart'>";
        html += "                <span class='iconArrowGrey'>&nbsp;</span>";
        html += "                <h3>bid starts from: </h3>";
        html += "                <h2 class='points'>"+v.minimalBid+"<span>points</span></h2>";
        html += "            </div>";
        html += "            <div class='currretHigh'>";
        html += "                <span class='iconArrowGrey'>&nbsp;</span>";
        html += "                <h3>current highest bid:</h3>";
        html += "                <h2 class='points'>"+v.currentBid+"<span>points</span></h2>";
        html += "            </div>";
        html += "        </div>";
		html += "		<input type='hidden' name='aid' value='"+v.id+"'/>";
		html += "		<input type='hidden' name='desc' value='"+v.title+"'/>";
			
			if(v.currentBid==0) cvalue = v.minimalBid;
			else cvalue = v.currentBid;
		
		html += "		<input type='hidden' name='currentbid' value='"+cvalue+"'/>";
		html += "		<input type='hidden' name='img' value='"+v.auctions.image_full_path+"'/>";
		html += "		<input type='hidden' name='token' value='1'/>";
		html += "         <div style='text-align:center'>";
        html += "		<input type='submit' name='increasebid' value='Increase Bid' class='btnIncrease sendauctionitem'/>";
        html += "         </div>";
        html += "    </div>";
        html += "    </td>";
        html += "  </tr>";
		  
		return html;
	}
	
	
	function auctionCountDown(v){
		
		var days = v.auctiondate.days;
		var month = v.auctiondate.month;
		var year = v.auctiondate.year;
		var hour = v.auctiondate.hour;
		var minute = v.auctiondate.minute;
		var sec = v.auctiondate.sec;
		var theindex = v.id;
		
		$('#countdown_auction_'+theindex).countDown({
			targetDate: {
				'day': 		days,
				'month': 	month,
				'year': 	year,
				'hour': 	hour,
				'min': 		minute,
				'sec': 		sec
			},omitWeeks:true
		});
		
	}
