// Copyright © 2014 Erwin PS 
// Badge Breaker Version 1.2
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// debug.js

DebugFunc  = function (){

	key1 = game.input.keyboard.addKey(Phaser.Keyboard.ONE);
    key1.onDown.add(cheatWin, this);

	key2 = game.input.keyboard.addKey(Phaser.Keyboard.TWO);
    key2.onDown.add(cheatLose, this);

	function cheatWin(){	
		return;
		game.state.states.Play.cheatWin();
	//		game.load.image('wew', 'http://www.vectortemplates.com/raster/superman-logo-012.png');

//			InGameScreen = game.add.sprite(0, 0, wew);	
		

	};
	function cheatLose(){	
		return;
		game.state.states.Play.cheatLose();
	};
};


//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// api.js

var userId;
var playingat;
var gameIsWin;
var isdebug=false;

function authServer()
{
	$.post(serverurl+"getUser","",function(data){
		try{
			userId=data.profile.id;
			playingat=data.playingat;
			game.state.start('Load');
		}catch(err){
			return;
		}
		return true;
    });
}

function onAuthResponse(){
	if (httpq2.readyState == 4) {
		if(httpq2.status == 200) {
		}
	}
}
	
function showCloseButton(){
	if (!game.device.desktop)
		btCloseGame=game.add.button(game.width-45, 0, 'close',this.onCloseGame,2,1,0);

}

function onCloseGame(){
	self.location = backbutton;
}

function removeCloseButton(){
	if (!game.device.desktop)
		if (btCloseGame!=null){
			btCloseGame.destroy();
			btCloseGame=null;
		}

}







//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// load.js

Game = {};

Game.Boot = function (game) { };

Game.Boot.prototype = {
	preload: function () {
		game.load.image('loadingbg', gameassetspath+'preloaderBg.jpg');
		game.load.image('loading', gameassetspath+'preloaderBar.png');
		game.load.image('loadingshell', gameassetspath+'preloaderBarShell.png');
		game.canvas.addEventListener('DOMMouseScroll',handleScroll,false);
		game.canvas.addEventListener('mousewheel',handleScroll,false);
	},
	create: function() {
		if (!game.device.desktop){
			//game.stage.scale.startFullScreen();
			//game.scale.pageAlignHorizontally = true;
		}else{
			resizeGame();
		}
		authServer();
	},

};

var handleScroll = function(evt){
	return evt.preventDefault() && false;
};


var resizeGame = function () {
		game.stage.scaleMode = Phaser.StageScaleMode.SHOW_ALL;
		conta=document.getElementById ("gameContainer");
//		if (conta=="undefined")
		xscale=game.width/conta.clientWidth;
	 	yscale=game.height/conta.clientHeight;
		game.input.scale.setTo(xscale,yscale);
		game.stage.scale.startFullScreen();
};



$(window).resize(function() { window.resizeGame(); } );


Game.Load = function (game) { };

Game.Load.prototype = {
	preload: function () {
	    game.stage.backgroundColor = '#FFFFFF';
	    w=game.stage.width;
		preloadingbg = game.add.sprite(0,0, 'loadingbg');
		preloadingshell = game.add.sprite(0,0, 'loadingshell');
		preloading = game.add.sprite(0,0, 'loading');
		preloadingshell.x = (1024-preloading.width)/2;
		preloadingshell.y = (768-preloading.height)/2;
		preloading.x = preloadingshell.x+2;
		preloading.y = preloadingshell.y+2;

		game.load.setPreloadSprite(preloading);


		game.load.image('titleScreen', gameassetspath+'titleScreen.jpg');
		game.load.spritesheet('btnStartTheGame', gameassetspath+'btnStartTheGame.png',309,178/3);		
		game.load.image('howToPlayScreen', gameassetspath+'howToPlayScreen.jpg');
		game.load.spritesheet('btnStartTheGame', gameassetspath+'btnStartTheGame.png',309,178/3);

		game.load.spritesheet('btnStart', gameassetspath+'btnStart.png',146,178/3);


		game.load.image('bgTokyo', gameassetspath+'bgTokyo.jpg');
		game.load.image('bgTokyoBack', gameassetspath+'bgTokyoBack.png');
		game.load.image('1tokyoObjective', gameassetspath+'tokyoObjective.jpg');

		game.load.image('biji11', gameassetspath+'tokyo/lantern1.png');
		game.load.image('biji12', gameassetspath+'tokyo/lantern2.png');
		game.load.image('biji13', gameassetspath+'tokyo/lantern3.png');
		game.load.image('biji14', gameassetspath+'tokyo/lantern4.png');
		game.load.image('biji15', gameassetspath+'tokyo/lantern5.png');

		game.load.image('bgLondon', gameassetspath+'bgLondon.jpg');
		game.load.image('bgLondonBack', gameassetspath+'bgLondonBack.png');
		game.load.image('2londonObjective', gameassetspath+'londonObjective.jpg');

		game.load.image('biji21', gameassetspath+'london/phonebooth1.png');
		game.load.image('biji22', gameassetspath+'london/phonebooth2.png');
		game.load.image('biji23', gameassetspath+'london/phonebooth3.png');
		game.load.image('biji24', gameassetspath+'london/phonebooth4.png');
		game.load.image('biji25', gameassetspath+'london/phonebooth5.png');

		game.load.image('bgNewYork', gameassetspath+'bgNewYork.jpg');
		game.load.image('bgNewYorkBack', gameassetspath+'bgNewYorkBack.png');
		game.load.image('3newYorkObjective', gameassetspath+'newYorkObjective.jpg');

		game.load.image('biji31', gameassetspath+'newyork/apple1.png');
		game.load.image('biji32', gameassetspath+'newyork/apple2.png');
		game.load.image('biji33', gameassetspath+'newyork/apple3.png');
		game.load.image('biji34', gameassetspath+'newyork/apple4.png');
		game.load.image('biji35', gameassetspath+'newyork/apple5.png');


		game.load.image('selamat1', gameassetspath+'selamat1.png');
		game.load.image('selamat2', gameassetspath+'selamat2.png');
		game.load.image('selesai2levellagi', gameassetspath+'selesai2levellagi.png');
		game.load.image('selesai1levellagi', gameassetspath+'selesai1levellagi.png');
		game.load.image('kamumendapatkanbadge', gameassetspath+'kamumendapatkanbadge.png');	


		game.load.spritesheet('btnLevelSelanjutnya', gameassetspath+'btnLevelSelanjutnya.png',348,179/3);
		game.load.spritesheet('btnSelesai', gameassetspath+'btnSelesai.png',178,180/3);

		game.load.image('popUp1', gameassetspath+'popUp1.jpg');
		//game.load.image('judulPopUp2', gameassetspath+'judulPopUp2.jpg');
		game.load.image('textPopUp2', gameassetspath+'textPopUp2.png');
		game.load.image('bgPopUp2', gameassetspath+'bgPopUp2.jpg');
		game.load.image('bgPopUp2b', gameassetspath+'bgPopUp2b.jpg');



		game.load.spritesheet('btnCloseX', gameassetspath+'btnCloseX.png',71,59/3);
		game.load.spritesheet('btnIn', gameassetspath+'btnIn.png',164,211/3);
		game.load.spritesheet('btnOut', gameassetspath+'btnOut.png',164,211/3);
		game.load.spritesheet('btnDiSini', gameassetspath+'btnDiSini.png',50,75/3);

		game.load.spritesheet('btnImIn', gameassetspath+'btnImIn.png',178,180/3);
		game.load.spritesheet('btnImOut', gameassetspath+'btnImOut.png',178,180/3);




		game.load.image('timesUp', gameassetspath+'timesUp.png');
		game.load.spritesheet('btnCobaLagi', gameassetspath+'btnCobaLagi.png',219,180/3);

		game.load.image('selectKotak', gameassetspath+'selectKotak.png');

		game.load.image('scrollShell', gameassetspath+'scrollShell.png');
		game.load.image('scrollThumb', gameassetspath+'scrollThumb.png');
		game.load.image('star', gameassetspath+'bintang.png');
		game.load.image('close', gameassetspath+'close.png');




	},
	create: function () {
		debugFunc=new DebugFunc();
		transitions = game.plugins.add(Phaser.Plugin.StateTransition);
		doubletexture=game.add.renderTexture('cover', game.width,game.height);

		score_style={ font: "41px Arial", fill : "#ff0000", align : "left"};	
		score_style_content={ font: "41px Arial", fill : "#666666", align : "left"};		
		game.state.start('Title');
	}
};




//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// title.js

Game.Title = function (game) { };

Game.Title.prototype = {


	create: function () {
	
		grpTitleScreen=game.add.group();
		background = game.add.sprite(0, 0, 'titleScreen');
		btnStart = game.add.button(364, 481, 'btnStartTheGame',this.onStartGame,2,1,0);
	//	logo = game.add.sprite(620, 560, 'logo');

		grpTitleScreen.add(background);
		grpTitleScreen.add(btnStart);
	//	grpTitleScreen.add(logo);
		grpTitleScreen.alpha=0;
		grpTitleScreen.scale=0.2;
		tw=game.add.tween(grpTitleScreen).to( { alpha: 1 }, 1000, Phaser.Easing.Linear.None, true, 0, 0,false);
		showCloseButton();
	},

	onStartGame: function() {
		currentLevel=1;
		doubletexture.renderXY(game.world, 0,0, true);
		removeCloseButton();
		transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
		transitions.to('HowToPlay');
		background.destroy();
		btnStart.destroy();
		grpTitleScreen.removeAll();
	},


};


//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// howtoplay.js

Game.HowToPlay = function (game) { };

Game.HowToPlay.prototype = {


	
	create: function () {
		game.add.sprite(0, 0, 'howToPlayScreen');
		game.add.button(200, 580, 'btnStartTheGame',onStartGame,2,1,0);
		game.add.button(910,45, 'btnDiSini',this.onbtnDiSini,2,1,0);
		showCloseButton();

		function onStartGame(){
			transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
			removeCloseButton();
			transitions.to('StartPlay');
		}

	},
/*
	onbtnDiSini: function (){
		$("#onbtnDiSiniExt").trigger('click');
	},
	*/

	onbtnDiSini: function (){
		doubletexture.renderXY(game.world, 0,0, true);
		removeCloseButton();
		prevState="HowToPlay";
		transitions.settings({duration: 400,properties: {alpha: 0}});
		transitions.to("Info");
	},

	update: function() {
	}
};



//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// startplay.js

Game.StartPlay = function (game) { };

Game.StartPlay.prototype = {

	create: function () {
		if (currentLevel==1) {background = game.add.sprite(0, 0, '1tokyoObjective');currentPoints=0;}
		if (currentLevel==2) background = game.add.sprite(0, 0, '2londonObjective');
		if (currentLevel==3) background = game.add.sprite(0, 0, '3newYorkObjective');

		var btnStart = game.add.button(430, 560, 'btnStart',onStartGame,2,1,0);

		showCloseButton();


		function onStartGame(){
			removeCloseButton();
			transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
			transitions.to('Play');
			background.destroy();	
			btnStart.destroy();
		}

	},

	update: function() {
	}
};


//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// win.js

Game.Win = function (game) { };

Game.Win.prototype = {



	create: function () {
		game.add.sprite(0, 0, doubletexture);

		if (currentLevel==3){
				scrSelamat=game.add.sprite(0, 0, 'selamat2');
			}else{
				scrSelamat=game.add.sprite(0, 0, 'selamat1');				
			}
	
		currentLevel++;
		showCloseButton();
		$.post(serverurl+"getUser","", game.state.states.Win.onGetUser);
	},

	update: function() {
	},


	onGetUser: function(data){
			try{
				userId=data.profile.id;
				playingat=data.playingat;
				game.state.states.Win.saveDataBadges(true);
			}catch(err){
				console.log("error saving data" + err);
			}
	},



	saveDataBadges:function (win){
		var mystring = userId + playingat + "true{gameapihelper}";
		hashstring = CryptoJS.SHA1(mystring);
		var leveltadi=currentLevel-1;
		$.post(serverurl+"savedata",{token:""+hashstring,userid:userId,win:win, gamesid:'3',level:leveltadi, point:currentPoints},function(data){
			try{
		        if (data.result==false){
			    	game.state.states.Win.GameOverWinButton(false);
		        	return;
		        }

		        if (data.badges==false){
			    	game.state.states.Win.GameOverWinButton(false);
		        }else{
			        if (data.image_badges!=false)
				    	game.state.states.Win.GameOverWinButton(true,data.images_badges);
				    else
				    	game.state.states.Win.GameOverWinButton(false);

		        }
		        if (data.double_next_url!=false){
		        	double_next_url = data.double_next_url;
		        }else{
		        	double_next_url="";
		        }
		    }catch(err){
		    	removeCloseButton();
				transitions.to('Title');
		    }
	    });
	},


	GameOverWinButton: function (gotbadges,imgurl){
			gotBadges=gotbadges;
			if (gotbadges){
				if (currentLevel==2){
					selesaixlevellagi=game.add.sprite(289, 469, 'selesai2levellagi');
				}
				if (currentLevel==3){
					selesaixlevellagi=game.add.sprite(289, 469, 'selesai1levellagi');
				}

				game.state.states.Win.loadBadge(imgurl);
				return;

			}else{
				if (currentLevel==2){
					selesaixlevellagi=game.add.sprite(289, 369, 'selesai2levellagi');
				}
				if (currentLevel==3){
					selesaixlevellagi=game.add.sprite(289, 369, 'selesai1levellagi');
				}

			}
			this.showEndLevelBUtton();
	},

	showEndLevelBUtton: function (){
			if (currentLevel<=3){
				btnSelamat=game.add.button(345, 553, 'btnLevelSelanjutnya',this.onbtnLevelSelanjutnya,2,1,0);
			}else{
				btnSelamat=game.add.button(420, 553, 'btnSelesai',this.onbtnSelesai,2,1,0);

			}
			btnSelamat.x=(game.width-btnSelamat.width)/2;

	},

	loadBadge: function (urlimage){
		if (isdebug) urlimage="http://192.168.1.99/badges/Camera.png";
		 var file = {
            type: 'image',
            key: 'example',
            url: urlimage,
            data: null,
            error: false,
            loaded: false
        };
        file.data = new Image();
        file.data.name = file.key;

        file.data.onload = function () {
			kamumendapatkanbadge=game.add.sprite(356, 292, 'kamumendapatkanbadge');
			game.state.states.Win.showEndLevelBUtton();


            file.loaded = true;
            var img=game.cache.addImage(file.key, file.url, file.data);
			imgBadge = game.add.sprite(0, 0, file.key);	
	        imgBadge.width=150;
	        imgBadge.height=150;
	        imgBadge.x=512-(imgBadge.width*0.5);
	        imgBadge.y=400-(imgBadge.height*0.5);

        };

        file.data.onerror = function () {
	    	game.state.states.Win.GameOverWinButton(false);
            file.error = true;
        };

        file.data.crossOrigin = '';
        file.data.src = file.url;
	},

	onbtnLevelSelanjutnya: function (){
		removeCloseButton();
		transitions.to('StartPlay');
	},

	onbtnSelesai: function (){
		removeCloseButton();
		if (gotBadges)
			transitions.to('PopUp');
		else
			transitions.to('Title');
	},


};



//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// lose.js

Game.Lose = function (game) { };

Game.Lose.prototype = {



	create: function () {
		game.add.sprite(0, 0, doubletexture);
		poptimesUp=game.add.sprite(0, 0, 'timesUp');
		popbtnCobaLagi=game.add.button(406, 422, 'btnCobaLagi',this.onbtnCobaLagi,2,1,0);
		showCloseButton();
	},

	onbtnCobaLagi: function() {
		removeCloseButton();
		transitions.to('Title');

	},




};

//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// popup.js

Game.PopUp = function (game) { };

Game.PopUp.prototype = {



	create: function () {
		game.add.sprite(0, 0, doubletexture);
		scrpop=game.add.sprite(0, 0, "popUp1");
		scrpop.x=(game.width-scrpop.width) /2;
		scrpop.y=(game.height-scrpop.height) /2;


		game.add.button(257, 485, 'btnIn',this.onbtnIn,2,1,0);
		game.add.button(570, 485, 'btnOut',this.onbtnOut,2,1,0);
		game.add.button(822,100, 'btnCloseX',this.onbtnCloseX,2,1,0);
		game.add.button(614,582, 'btnDiSini',this.onbtnDiSini,2,1,0);
		



	},

	update: function() {
	},

	onbtnIn: function (){
		transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
		transitions.to("Title");
	  	if (double_next_url!=""){
			self.location = double_next_url;
		}
	},

	onbtnOut: function (){
		transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
		transitions.to("Title");
	},

	onbtnCloseX: function (){
		transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
		transitions.to("Title");
	},

	onbtnDiSini: function (){
		prevState="PopUp";
		transitions.to("Info");
	},

};


//Badges breaker Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// info.js

Game.Info = function (game) { };

Game.Info.prototype = {



	create: function () {
		game.add.sprite(0, 0, doubletexture);
		bg=game.add.sprite((game.width-800) /2, (game.height-768) /2, "bgPopUp2");



		topclip=game.add.renderTexture('topcover',1024,170);
		topclip.renderXY(game.world, 0,0, false);

		//bottomclip=game.add.renderTexture('bottomcover',1024,100);
		//bottomclip.renderXY(game.world, 0,400, true);


		btext=game.add.sprite(0, 0, "textPopUp2");
		btext.x=bg.x+((bg.width-btext.width)/2);
		btext.y=0;

  		btext.inputEnabled = true;
		btext.input.start(0,true);
		btext.y=180;
	  	rc=new Phaser.Rectangle(0,-150,1024,1000);
		btext.input.boundsRect=rc;
	    btext.input.enableDrag();
	    btext.input.allowHorizontalDrag = false;


		running=false;
	    if (prevState=="PopUp"){
			btIns=game.add.button(257, 485, 'btnIn',this.onbtnIn,2,1,0);
			btOuts=game.add.button(570, 485, 'btnOut',this.onbtnOut,2,1,0);
			running=true;

		}


		game.add.sprite(0,0, topclip);
		//game.add.sprite(0,90, bottomclip);

		game.add.button(822,12, 'btnCloseX',this.onbtnCloseX,2,1,0);

		bottomshade=game.add.sprite(0, 0, "bgPopUp2b");
		bottomshade.x=(game.width-800) /2;
		bottomshade.y=game.height-bottomshade.height;


		shell=game.add.sprite(bg.x+bg.width-20,bg.y+220  , "scrollShell");
		thumb=game.add.sprite(bg.x+bg.width-20,bg.y+220, "scrollThumb");
  		thumb.inputEnabled = true;
		thumb.input.boundsSprite=shell;
	    thumb.input.enableDrag();

	    isThumbDragging=false;
	    isContentDragging=false;


		thumb.events.onDragStart.add(thumbonDragStart, this);
		thumb.events.onDragStop.add(thumbonDragStop, this);
		function thumbonDragStart() {
			isThumbDragging=true;
		}
		function thumbonDragStop() {
			isThumbDragging=false;
		}

		btext.events.onDragStart.add(contentonDragStart, this);
		btext.events.onDragStop.add(contentonDragStop, this);
		function contentonDragStart() {
			isContentDragging=true;
		}
		function contentonDragStop() {
			isContentDragging=false;
		}
		showCloseButton();
		game.canvas.addEventListener('DOMMouseScroll',this.handleScroll,false);
		game.canvas.addEventListener('mousewheel',this.handleScroll,false);

	},

	handleScroll : function(evt){
		var delta = evt.wheelDelta ? evt.wheelDelta/40 : evt.detail ? -evt.detail : 0;
		thumb.y-=delta;
		if (thumb.y<shell.y) thumb.y=shell.y;
		if (thumb.y>shell.y+shell.height-thumb.height) thumb.y=shell.y+shell.height-thumb.height;
		btext.y=180-((thumb.y-220)/2.54)*3.3;
		return evt.preventDefault() && false;
	},
	onbtnIn: function (){
	  if (double_next_url!=""){
			self.location = double_next_url;
		}
	},

	onbtnOut: function (){
		running=false;
	//	btext.mask=null;
//		btext.destroy();
		transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
		transitions.to("Title");
	},


	update: function() {
	    if (running){
	    	if (btIns!=null) btIns.y=btext.y+740;
	    	if (btOuts!=null) btOuts.y=btext.y+740;
		}
		if (isThumbDragging){
			btext.y=180-((thumb.y-220)/2.54)*3.3;
		}
	    if (isContentDragging){
			thumb.y=220-((btext.y-180)/3.3)*2.54;

	    }
	},

	onbtnCloseX: function (){
		running=false;
		if (prevState=="PopUp"){
			btIns.destroy();
			btOuts.destroy();
		}		
		btext.destroy();
		this.graphics=null;
		transitions.settings({duration: 400,properties: {alpha: 0}});

		if (prevState=="PopUp"){
			transitions.to('PopUp');
		}else{
			transitions.to('HowToPlay');

		}
	},



};	


//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// play.js


var arLevel1=[

		{ x:100 , y:58},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:820 , y:58},

		{ x:-1 , y:-1},
		{ x:180 , y:138},
		{ x:260 , y:138},
		{ x:340 , y:138},
		{ x:420 , y:138},
		{ x:500 , y:138},
		{ x:580 , y:138},
		{ x:660 , y:138},
		{ x:740 , y:138},
		{ x:-1 , y:-1},

		{ x:100 , y:218},
		{ x:180 , y:218},
		{ x:260 , y:218},
		{ x:340 , y:218},
		{ x:420 , y:218},
		{ x:500 , y:218},
		{ x:580 , y:218},
		{ x:660 , y:218},
		{ x:740 , y:218},
		{ x:820 , y:218},

		{ x:100 , y:298},
		{ x:180 , y:298},
		{ x:260 , y:298},
		{ x:340 , y:298},
		{ x:420 , y:298},
		{ x:500 , y:298},
		{ x:580 , y:298},
		{ x:660 , y:298},
		{ x:740 , y:298},
		{ x:820 , y:298},

		{ x:100 , y:378},
		{ x:180 , y:378},
		{ x:260 , y:378},
		{ x:340 , y:378},
		{ x:420 , y:378},
		{ x:500 , y:378},
		{ x:580 , y:378},
		{ x:660 , y:378},
		{ x:740 , y:378},
		{ x:820 , y:378},

		{ x:-1 , y:-1},
		{ x:180 , y:458},
		{ x:260 , y:458},
		{ x:340 , y:458},
		{ x:420 , y:458},
		{ x:500 , y:458},
		{ x:580 , y:458},
		{ x:660 , y:458},
		{ x:740 , y:458},
		{ x:-1 , y:-1},

		{ x:100 , y:538},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:820 , y:538},



	];



var arLevel2=[
		{ x:94 , y:55},
		{ x:175 , y:55},
		{ x:255 , y:55},
		{ x:335 , y:55},
		{ x:415 , y:55},
		{ x:495 , y:55},
		{ x:575 , y:55},
		{ x:655 , y:55},
		{ x:735 , y:55},
		{ x:815 , y:55},

		{ x:94 , y:135},
		{ x:175 , y:135},
		{ x:255 , y:135},
		{ x:335 , y:135},
		{ x:415 , y:135},
		{ x:495 , y:135},
		{ x:575 , y:135},
		{ x:655 , y:135},
		{ x:735 , y:135},
		{ x:815 , y:135},

		{ x:-1 , y:-1},
		{ x:175 , y:215},
		{ x:255 , y:215},
		{ x:335 , y:215},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:575 , y:215},
		{ x:655 , y:215},
		{ x:735 , y:215},
		{ x:-1 , y:-1},

		{ x:-1 , y:-1},
		{ x:175 , y:295},
		{ x:255 , y:295},
		{ x:335 , y:295},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:575 , y:295},
		{ x:655 , y:295},
		{ x:735 , y:295},
		{ x:-1 , y:-1},

		{ x:-1 , y:-1},
		{ x:175 , y:375},
		{ x:255 , y:375},
		{ x:335 , y:375},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:575 , y:375},
		{ x:655 , y:375},
		{ x:735 , y:375},
		{ x:-1 , y:-1},

		{ x:94 , y:455},
		{ x:175 , y:455},
		{ x:255 , y:455},
		{ x:335 , y:455},
		{ x:415 , y:455},
		{ x:495 , y:455},
		{ x:575 , y:455},
		{ x:655 , y:455},
		{ x:735 , y:455},
		{ x:815 , y:455},

		{ x:94 , y:535},
		{ x:175 , y:535},
		{ x:255 , y:535},
		{ x:335 , y:535},
		{ x:415 , y:535},
		{ x:495 , y:535},
		{ x:575 , y:535},
		{ x:655 , y:535},
		{ x:735 , y:535},
		{ x:815 , y:535}



	];







var arLevel3=[
		{ x:94 , y:54},
		{ x:174 , y:54},
		{ x:254 , y:54},
		{ x:334 , y:54},
		{ x:414 , y:54},
		{ x:494 , y:54},
		{ x:574 , y:54},
		{ x:654 , y:54},
		{ x:734 , y:54},
		{ x:814 , y:54},

		{ x:94 , y:134},
		{ x:174 , y:134},
		{ x:254 , y:134},
		{ x:334 , y:134},
		{ x:414 , y:134},
		{ x:494 , y:134},
		{ x:574 , y:134},
		{ x:654 , y:134},
		{ x:734 , y:134},
		{ x:814 , y:134},
		
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},
		{ x:-1 , y:-1},


		{ x:94 , y:294},
		{ x:174 , y:294},
		{ x:-1 , y:-1},
		{ x:334 , y:294},
		{ x:414 , y:294},
		{ x:494 , y:294},
		{ x:574 , y:294},
		{ x:-1 , y:-1},
		{ x:734 , y:294},
		{ x:814 , y:294},

		{ x:94 , y:374},
		{ x:174 , y:374},
		{ x:-1 , y:-1},
		{ x:334 , y:374},
		{ x:414 , y:374},
		{ x:494 , y:374},
		{ x:574 , y:374},
		{ x:-1 , y:-1},
		{ x:734 , y:374},
		{ x:814 , y:374},


		{ x:94 , y:454},
		{ x:174 , y:454},
		{ x:-1 , y:-1},
		{ x:334 , y:454},
		{ x:414 , y:454},
		{ x:494 , y:454},
		{ x:574 , y:454},
		{ x:-1 , y:-1},
		{ x:734 , y:454},
		{ x:814 , y:454},

		{ x:94 , y:534},
		{ x:174 , y:534},
		{ x:-1 , y:-1},
		{ x:334 , y:534},
		{ x:414 , y:534},
		{ x:494 , y:534},
		{ x:574 , y:534},
		{ x:-1 , y:-1},
		{ x:734 , y:534},
		{ x:814 , y:534},

	];


	var currentTime;
	var currentLevelTime;
	var currentLevelType;
	var startGameTime;
	var penaltyTime;
	var lbLevel;
	var txLevel;
	var lbTime;
	var txTime;
	var lbPoints;
	var txPoints;
	var lbMove;
	var txMove;


	var arLevel;
	var grid;
	var selectKotak;

	var poptimesUp;
	var popbtnCobaLagi;
	var scrSelamat;
	var txMsgNextLevel;
	var btnSelamat;
	var imgBadge;
	var scrPopup;
	var btn1Popup;
	var btn2Popup;
	var checkArray;

	var currentCheck;
	var gameOverTimer=0; 


	var kamumendapatkanbadge;
	var selesaixlevellagi;

	var selected=null;
	var selTile1;
	var selTile2;


	var startdroptime;
	var currentdroptime;
	var keylock=false;
	var nomoredrop=false;
	var gstate=0;
	var dropcountertest=2;
		/*
		0=idle
		1=drop
		*/
	var doownspeed=600;
	var emitters;
	var emittersctr;
	var move;


Game.Play = function (game) { };

Game.Play.prototype = {



	create: function () {
		this.initGame();
		showCloseButton();
	},

	update: function() {
		this.updateGrid();
		txPoints.setText(""+currentPoints);
		txMove.setText(""+move);
		if (move<0) {
			move=0;
		}
		if (gstate==0) return;
		this.updateTimer();

	},


	initGame: function (){
		var bgName="";
		selected=null;
		gstate=0;
		startdroptime=game.time.time;
		this.updateGrid();

		move=levelmove[currentLevel-1];



		if (lastpic[currentLevel-1]==0){
			currentLevelType=getRandomInt(1,3);
		}else{
			lastpic[currentLevel-1]++;
			if (lastpic[currentLevel-1]>3) lastpic[currentLevel-1]=1;
			currentLevelType=lastpic[currentLevel-1];
		}

 		if (currentLevel==1) {bgName="bgTokyo";arLevel=arLevel1;}
 		if (currentLevel==2) {bgName="bgLondon";arLevel=arLevel2;}
 		if (currentLevel==3) {bgName="bgNewYork";arLevel=arLevel3;}

		InGameScreen = game.add.sprite(0, 0, bgName);
		InGameScreen = game.add.sprite(0, 0, bgName+"Back");

		lbLevel=game.add.text (22,700, "LEVEL", score_style);
		txLevel=game.add.text (162,700, currentLevel, score_style_content);
		
		lbTime=game.add.text (225,700, "TIME", score_style);
		txTime=game.add.text (353.3,700, "1", score_style_content);

		lbMove=game.add.text (525,700, "MOVE", score_style);
		txMove=game.add.text (653.3,700, move, score_style_content);


		lbPoints=game.add.text (764,700, "POINTS", score_style);
		txPoints=game.add.text (926,700, "1", score_style_content);

		//creting grid
		grid=new Array();
		for (i=0;i<arLevel.length;i++){
			var obgrid=new Object();
			obgrid.x=arLevel[i].x;
			obgrid.y=arLevel[i].y;
			obgrid.index=i;
			obgrid.lx=i%10;
			obgrid.ly=Math.floor(i/10);
			obgrid.item=null;
			obgrid.target=null;
			if (arLevel[i].x==-1) obgrid.valid=false; else obgrid.valid=true;

			grid.push(obgrid);
		}

		

		currentLevelTime=levelTime[currentLevel-1];
		penaltyTime=0;
		currentTime=currentLevelTime;
		startGameTime=game.time.time;
		this.updateTimer();
		keylock=false;


	},

	
	updateGrid: function () {
		switch(gstate){

			case 0:
				currentdroptime=game.time.time;
				if (currentdroptime-startdroptime>700){
					startGameTime=game.time.time;
					gstate=1;
					emitters=new Array();
					for (ii=0;ii<10;ii++){
						var em = game.add.emitter(0, 0, 200);
			   		 	em.makeParticles('star');
			   		 	em.gravity = 200;
			   		 	emitters.push(em);
					}
					emittersctr=0;

				}
				break;
			case 1:
				//fill all
				
				this.isifull();
				gstate=2;
				break;
			case 2:
				//mark all tris
				//check horz
					this.markGrid();
					startdroptime=game.time.time;
					gstate=3;
				break;

			case 3:
				//wait
				currentdroptime=game.time.time;
				if (currentdroptime-startdroptime>doownspeed*0.2){
					gstate=4;
				}
				break;
			
			case 4:
				//destroy items
				nomoredrop=true;
				for (ix=0;ix<grid.length;ix++){
					if (grid[ix].value>0){
						nomoredrop=false;
						//console.log("destroy " + ix);
						if (grid[ix].item!=null)
							grid[ix].item.destroy();
						grid[ix].item=null;
						grid[ix].target=null;		
						grid[ix].type=-1;
						grid[ix].value=0;
						//currentPoints++;
						this.particleBurst(grid[ix].x,grid[ix].y);
					}
				}
				if (nomoredrop==false) move--;
				gstate=5;
				break;
			
			case 5:
				//drop em
				for (ix=0;ix<10;ix++){	
					this.scanup(ix);	
				}
				gstate=6;

			case 6:
				currentdroptime=game.time.time;
				if (currentdroptime-startdroptime>doownspeed){
					gstate=7;
				}
				break;

			case 7:
				if (nomoredrop){
					gstate=8;
					if (move<=0) this.gameOverWin();
					keylock=false;
				}else{
					gstate=2;
				}
				break;
			case 8:
				break;


		}

	},


	scanup:function(ix) {
		for (iy=6;iy>=0;iy--){
			curgrid=grid[ix+(iy*10)];
		//	console.log("Scan " + curgrid.lx + "," + curgrid.ly + " item : " + curgrid.item);
			if (curgrid.type==-1){
				//search up to fill this empty grid
				found=false;
				for (iup=iy-1;iup>0;iup--){
					ugrid=grid[ix+(iup*10)];
					if (ugrid.valid==true)
					if (ugrid.type!=-1){
						//console.log("====== from " + ugrid.lx + "," + ugrid.ly  +  " to " + curgrid.lx + "," + curgrid.ly  + " item : " + ugrid.item);
						curgrid.item=ugrid.item;
						curgrid.item.index=curgrid.index;
						curgrid.type=ugrid.type;
						ugrid.type=-1;
						ugrid.item=null;
						ugrid.target=null;
						game.add.tween(curgrid.item).to( { x:curgrid.x, y:curgrid.y},doownspeed,Phaser.Easing.Linear.In, true,0,0,false);
						found=true;
						break;
					}
				}
				if (!found){
					for (ic=iy;ic>=0;ic--){
						
						curgrid=grid[ix+(ic*10)];
						if (curgrid.valid && curgrid.type==-1){
							curgrid.type=Math.floor(Math.random()*4)+1;
							var check=game.add.sprite(curgrid.x,(58-80)-(80*(iy-ic)),'biji'+currentLevel+curgrid.type);
							check.inputEnabled = true;
							check.events.onInputDown.add(this.downSprite, this);
							check.index=curgrid.index;
							curgrid.item=check;
							curgrid.target=null;
							game.add.tween(check).to( { x:curgrid.x, y:curgrid.y},doownspeed,Phaser.Easing.Linear.In, true,0,0,false);
						}
					}
					break;
				}

			}
		}
	},



	markGrid:function(){
			this.clearGridValue();
					for (ix=0;ix<grid.length;ix++){
						curgrid=grid[ix];
						//console.log("A" + curgrid.lx + "," + curgrid.ly);
						if (curgrid.lx>0&&curgrid.lx<9){
							lgrid=grid[ix-1];
							rgrid=grid[ix+1];
							if (rgrid.type==curgrid.type && lgrid.type==curgrid.type ) {
								lgrid.value++;
								rgrid.value++;
								curgrid.value++;
							}
						}
					}
				//checkk vert			
					for (ix=0;ix<grid.length;ix++){
						curgrid=grid[ix];
						//console.log("A" + curgrid.lx + "," + curgrid.ly);
						if (curgrid.ly>0 && curgrid.ly<6){
							ugrid=grid[ix-10];
							dgrid=grid[ix+10];
							if (ugrid.type==curgrid.type && dgrid.type==curgrid.type ) {
								ugrid.value++;
								dgrid.value++;
								curgrid.value++;
							}
						}
					}
	},


	clearGridValue:function(){
	//	dropcountertest--;if(dropcountertest<0) return;
		for (ix=0;ix<grid.length;ix++){
			if (grid[ix].valid){
				grid[ix].value=0;
			}
		}
	},
	isifull:function(){
	//	dropcountertest--;if(dropcountertest<0) return;
		for (ix=0;ix<grid.length;ix++){
			if (grid[ix].valid){
				this.addBiji(ix);
			}
		}
	},

	addtop:function(){
	//	dropcountertest--;if(dropcountertest<0) return;
		for (ix=0;ix<10;ix++){
			if (grid[ix].item==null){
				this.addBiji(ix);
			}
		}
	},

	
	addBiji: function (idx){

		obgrid=grid[idx];
		if (obgrid.valid){
			obgrid.type=Math.floor(Math.random()*4)+1;
			var check=game.add.sprite(obgrid.x,obgrid.y-80,'biji'+currentLevel+obgrid.type);
			check.inputEnabled = true;
			check.events.onInputDown.add(this.downSprite, this);
			check.index=idx;
			obgrid.item=check;
			obgrid.target=null;
			game.add.tween(check).to( { x:obgrid.x, y:obgrid.y},doownspeed,Phaser.Easing.Linear.In, true,0,0,false);
		}
	},

	adjacent: function (ob1,ob2){
	//		console.log(ob2.ly+"=="+ob1.ly+"&&"+ob2.lx+"=="+ob1.lx+1);
		if (ob2.ly==ob1.ly && ob2.lx==ob1.lx+1) return true;
		if (ob2.ly==ob1.ly && ob2.lx==ob1.lx-1) return true;
		if (ob2.lx==ob1.lx && ob2.ly==ob1.ly-1) return true;
		if (ob2.lx==ob1.lx && ob2.ly==ob1.ly+1) return true;
		return false;
	},	



	downSprite:function(obj){
			if (keylock) return;
			if (selected==null){
				selected=game.add.sprite(obj.x,obj.y,'selectKotak');
				selected.item=obj;
				selTile1=obj.index;
				//console.log("selTile1 " + selTile1 + " type: " + obj.type);
			}else{
				selTile2=obj.index;
				if (!this.adjacent(grid[selTile1],grid[selTile2])) {
					selected.destroy();
					selected=null;
					return;
				}

				keylock=true;
				game.add.tween(selected.item).to( { x:obj.x, y:obj.y},doownspeed*0.2,Phaser.Easing.Linear.In, true,0,0,false);
				tw1=game.add.tween(obj).to( { x:selected.item.x, y:selected.item.y},doownspeed*0.2,Phaser.Easing.Linear.In, true,0,0,false);
				tw1.onComplete.add(finishTweenAwal, this);
				



				var it1=grid[selTile1].item;
				grid[selTile1].item=grid[selTile2].item;
				grid[selTile2].item=it1;

				var ty=grid[selTile1].type;
				grid[selTile1].type=grid[selTile2].type;
				grid[selTile2].type=ty;	

				grid[selTile1].item.index=grid[selTile1].index;
				grid[selTile2].item.index=grid[selTile2].index;


				selected.destroy();
				selected=null;
			}

			function finishTweenAwal (){
				this.markGrid();
				clean=true;
				for (ix=0;ix<grid.length;ix++){
					if (grid[ix].value>0){
						clean=false;
						break;
					}
				}
				if (clean){
					//balikin lagi
					game.add.tween(grid[selTile1].item).to( { x:grid[selTile2].item.x, y:grid[selTile2].item.y},doownspeed*0.2,Phaser.Easing.Linear.In, true,0,0,false);
					game.add.tween(grid[selTile2].item).to( { x:grid[selTile1].item.x, y:grid[selTile1].item.y},doownspeed*0.2,Phaser.Easing.Linear.In, true,0,0,false);

					var it1=grid[selTile1].item;
					grid[selTile1].item=grid[selTile2].item;
					grid[selTile2].item=it1;

					var ty=grid[selTile1].type;
					grid[selTile1].type=grid[selTile2].type;
					grid[selTile2].type=ty;	

					grid[selTile1].item.index=grid[selTile1].index;
					grid[selTile2].item.index=grid[selTile2].index;


				}else{
					move--;
				}

				gstate=2;
			}


	},


	particleBurst: function (ox,oy) {
	    emitters[emittersctr].x = ox+40;
	    emitters[emittersctr].y = oy+40;
	    emitters[emittersctr].start(true, 1200, null, 4);
		emittersctr++;if (emittersctr>=10) emittersctr=0;
	},


	updateTimer: function () {
		currentTime=Math.floor(currentLevelTime-game.time.elapsedSecondsSince(startGameTime)-penaltyTime);
	//	console.log("updateTimer " + currentTime);
		if (currentTime<=0) {
			this.gameOverTime();
			return;
		}
		minutes = Math.floor(currentTime / 60) % 60;
		seconds = Math.floor(currentTime) % 60;
		if (seconds < 10)
			seconds = '0' + seconds;
		if (minutes < 10)
			minutes = '0' + minutes;
		txTime.setText(minutes + ':'+ seconds);
	},


	addScore: function (){
		minutes = Math.floor(currentTime / 60) % 60;
		seconds = Math.floor(currentTime) % 60;
		currentPoints+=((minutes*60)+seconds);
	},

	clearGrpInGame: function (){
			if (kamumendapatkanbadge){
				grpInGame.remove(kamumendapatkanbadge);kamumendapatkanbadge.destroy();
			}
			if (selesaixlevellagi){
				grpInGame.remove(selesaixlevellagi);selesaixlevellagi.destroy();
			}
			grpInGame.remove(scrSelamat);scrSelamat.destroy();
			grpInGame.remove(btnSelamat);btnSelamat.destroy();
			if (imgBadge) {
				grpInGame.remove(imgBadge);imgBadge.destroy();
			}
	},

	gameOverTime: function (){
			this.addScore();

			doubletexture.renderXY(game.world, 0,0, true);
			removeCloseButton();
			transitions.to('Lose');


	},

	onbtnCobaLagi: function (){
		//	grpInGame.remove(poptimesUp);poptimesUp.destroy();
	//		grpInGame.remove(popbtnCobaLagi);popbtnCobaLagi.destroy();
			//setState("endgame","init");
	},

	gameOverWin: function (){
		//console.log("onbponponponpon");
		this.addScore();
		setTimeout(this.realGameOverWin,200);
	},


	realGameOverWin: function (){
			doubletexture.renderXY(game.world, 0,0, true);
			removeCloseButton();
			transitions.to('Win');
	},



	cheatWin: function(){
		this.gameOverWin();
	},

	cheatLose: function(){
		this.gameOverTime();		
	},







};



//Badge Breaker Game
//Copyright © 2014 Erwin PS 
//version 0.4
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// game.js

var game = new Phaser.Game(1024,768, Phaser.AUTO, 'gameContainer');
//var game = new Phaser.Game(1024,768, Phaser.WEBGL, 'gameSpotted');
//var game = new Phaser.Game(1024,768, Phaser.CANVAS, 'gameSpotted');
//var game = new Phaser.Game(1024,768, Phaser.CANVAS, 'gameSpotted');

var transitions;
var currentLevel=1;
var levelTime=[60,45,30];
var lastpic=[0,0,0];
var levelmove=[30,20,10];
var score_style;
var score_style_content;
var currentPoints=0;

 // var basedomain = "http://preview.kanadigital.com/marlboro_inorout/public_html/";
 // var basedomainlocal = "http://192.168.1.99/";

 // var serverurl = basedomain+"service/games/";
 // var gameassetspath = basedomainlocal+'games_src/badge_breaker/assets/';

 // var backbutton = basedomain+'games';

var double_next_url;
var doubletexture;
var topclip;
var bottomclip;
var gotBadges;
var prevState;


game.state.add('Boot', Game.Boot);
game.state.add('Load', Game.Load);
game.state.add('Title', Game.Title);
game.state.add('HowToPlay', Game.HowToPlay);
game.state.add('StartPlay', Game.StartPlay);
game.state.add('Win', Game.Win);
game.state.add('Lose', Game.Lose);
game.state.add('PopUp', Game.PopUp);
game.state.add('Info', Game.Info);
game.state.add('Play', Game.Play);

game.state.start('Boot');
