// Copyright © 2014 Erwin PS 
// Spotted Version 1.6
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// debug.js

DebugFunc  = function (){

	key1 = game.input.keyboard.addKey(Phaser.Keyboard.ONE);
    key1.onDown.add(cheatWin, this);

	key2 = game.input.keyboard.addKey(Phaser.Keyboard.TWO);
    key2.onDown.add(cheatLose, this);

	function cheatWin(){	
		if (isdebug) 
			game.state.states.Play.cheatWin();
	}
	function cheatLose(){	
		if (isdebug) 
			game.state.states.Play.cheatLose();
	}
};


//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
//

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
};

function onAuthResponse(){
	if (httpq2.readyState == 4) {
		if(httpq2.status == 200) {
		}
	}
};

function showCloseButton(){
	if (!game.device.desktop)
		btCloseGame=game.add.button(game.width-45, 0, 'close',this.onCloseGame,2,1,0);

};

function onCloseGame(){
	self.location = backbutton;
};

function removeCloseButton(){
	if (!game.device.desktop)
		if (btCloseGame!=null){
			btCloseGame.destroy();
			btCloseGame=null;
		}

};



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
		preloadingshell.y = (768-preloading.height)/2+20;
		preloading.x = preloadingshell.x+2;
		preloading.y = preloadingshell.y+2;

		game.load.setPreloadSprite(preloading);


		game.load.image('titleScreen', gameassetspath+'titleScreen.jpg');
		game.load.spritesheet('btnStartTheGame', gameassetspath+'btnStartTheGame.png',309,178/3);		
		game.load.image('howToPlayScreen', gameassetspath+'howToPlayScreen.jpg');
		game.load.spritesheet('btnStartTheGame', gameassetspath+'btnStartTheGame.png',309,178/3);

		game.load.spritesheet('btnStart', gameassetspath+'btnStart.png',146,178/3);


	//	game.load.image('tokyo1GamePlay', gameassetspath+'tokyo/tokyo1GamePlay.jpg');
	//	game.load.image('tokyo2GamePlay', gameassetspath+'tokyo/tokyo2GamePlay.jpg');
	//	game.load.image('tokyo3GamePlay', gameassetspath+'tokyo/tokyo3GamePlay.jpg');
		game.load.image('1tokyoObjective', gameassetspath+'tokyo/1tokyoObjective.jpg');
		

		// game.load.image('london1GamePlay', gameassetspath+'london/london1GamePlay.jpg');
		// game.load.image('london2GamePlay', gameassetspath+'london/london2GamePlay.jpg');
		// game.load.image('london3GamePlay', gameassetspath+'london/london3GamePlay.jpg');
		 game.load.image('2londonObjective', gameassetspath+'london/2londonObjective.jpg');

		// game.load.image('newYork1GamePlay', gameassetspath+'newyork/newYork1GamePlay.jpg');
		// game.load.image('newYork2GamePlay', gameassetspath+'newyork/newYork2GamePlay.jpg');
		// game.load.image('newYork3GamePlay', gameassetspath+'newyork/newYork3GamePlay.jpg');
		 game.load.image('3newYorkObjective', gameassetspath+'newyork/3newYorkObjective.jpg');

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



		game.load.image('check', gameassetspath+'check.png');
		game.load.image('check2', gameassetspath+'check2.png');
		game.load.image('checked', gameassetspath+'checked.png');

		game.load.image('badge1', gameassetspath+'checked.png');

		game.load.image('scrollShell', gameassetspath+'scrollShell.png');
		game.load.image('scrollThumb', gameassetspath+'scrollThumb.png');
		game.load.image('close', gameassetspath+'close.png');



		

	},
	create: function () {
		debugFunc=new DebugFunc();
		transitions = game.plugins.add(Phaser.Plugin.StateTransition);
		doubletexture=game.add.renderTexture('cover', game.width,game.height);

		score_style={ font: "41px Arial", fill : "#ff0000", align : "left"};	
		score_style_content={ font: "41px Arial", fill : "#666666", align : "left"};		
		game.state.start('Title');
	},
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
		btnStart = game.add.button(364, 451, 'btnStartTheGame',this.onStartGame,2,1,0);
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
		game.add.button(886,65, 'btnDiSini',this.onbtnDiSini,2,1,0);
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
	},
};


//Spotted Game
//Copyright © 2014 Erwin PS 
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
// startplay.js

Game.StartPlay = function (game) { };

Game.StartPlay.prototype = {


	preload: function () {
		if (currentLevel==1){
			background = game.add.sprite(0, 0, '1tokyoObjective');
			currentPoints=0;
		}
		if (currentLevel==2)
			background = game.add.sprite(0, 0, '2londonObjective');
		if (currentLevel==3)
			background = game.add.sprite(0, 0, '3newYorkObjective');

		preloading = game.add.sprite(0,0, 'loading');
		preloadingshell.x = (1024-preloading.width)/2;
		preloadingshell.y = (768-preloading.height)/2+200;
		preloading.x = preloadingshell.x+2;
		preloading.y = preloadingshell.y+2;


		game.load.setPreloadSprite(preloading);



		if (currentLevel==1){
			game.load.image('tokyo1GamePlay', gameassetspath+'tokyo/tokyo1GamePlay_Bg.jpg');
			game.load.image('tokyo2GamePlay', gameassetspath+'tokyo/tokyo2GamePlay_Bg.jpg');
			game.load.image('tokyo3GamePlay', gameassetspath+'tokyo/tokyo3GamePlay_Bg.jpg');

			game.load.image('tokyo1_1', gameassetspath+'tokyo/tokyo1_1.jpg');
			game.load.image('tokyo1_2', gameassetspath+'tokyo/tokyo1_2.jpg');
			game.load.image('tokyo1_3', gameassetspath+'tokyo/tokyo1_3.jpg');
			game.load.image('tokyo1_4', gameassetspath+'tokyo/tokyo1_4.jpg');
			game.load.image('tokyo1_5', gameassetspath+'tokyo/tokyo1_5.jpg');
			game.load.image('tokyo1_6', gameassetspath+'tokyo/tokyo1_6.jpg');
			game.load.image('tokyo1_7', gameassetspath+'tokyo/tokyo1_7.jpg');
			game.load.image('tokyo1_8', gameassetspath+'tokyo/tokyo1_8.jpg');
			game.load.image('tokyo1_9', gameassetspath+'tokyo/tokyo1_9.jpg');
			game.load.image('tokyo1_10', gameassetspath+'tokyo/tokyo1_10.jpg');

			game.load.image('tokyo2_1', gameassetspath+'tokyo/tokyo2_1.jpg');
			game.load.image('tokyo2_2', gameassetspath+'tokyo/tokyo2_2.png');
			game.load.image('tokyo2_3', gameassetspath+'tokyo/tokyo2_3.jpg');
			game.load.image('tokyo2_4', gameassetspath+'tokyo/tokyo2_4.jpg');
			game.load.image('tokyo2_5', gameassetspath+'tokyo/tokyo2_5.jpg');
			game.load.image('tokyo2_6', gameassetspath+'tokyo/tokyo2_6.jpg');
			game.load.image('tokyo2_7', gameassetspath+'tokyo/tokyo2_7.jpg');
			game.load.image('tokyo2_8', gameassetspath+'tokyo/tokyo2_8.jpg');
			game.load.image('tokyo2_9', gameassetspath+'tokyo/tokyo2_9.jpg');
			game.load.image('tokyo2_10', gameassetspath+'tokyo/tokyo2_10.jpg');

			game.load.image('tokyo3_1', gameassetspath+'tokyo/tokyo3_1.jpg');
			game.load.image('tokyo3_2', gameassetspath+'tokyo/tokyo3_2.jpg');
			game.load.image('tokyo3_3', gameassetspath+'tokyo/tokyo3_3.jpg');
			game.load.image('tokyo3_4', gameassetspath+'tokyo/tokyo3_4.jpg');
			game.load.image('tokyo3_5', gameassetspath+'tokyo/tokyo3_5.jpg');
			game.load.image('tokyo3_6', gameassetspath+'tokyo/tokyo3_6.jpg');
			game.load.image('tokyo3_7', gameassetspath+'tokyo/tokyo3_7.jpg');
			game.load.image('tokyo3_8', gameassetspath+'tokyo/tokyo3_8.jpg');
			game.load.image('tokyo3_9', gameassetspath+'tokyo/tokyo3_9.jpg');
			game.load.image('tokyo3_10', gameassetspath+'tokyo/tokyo3_10.jpg');


		}
		if (currentLevel==2){
			game.load.image('london1GamePlay', gameassetspath+'london/london1GamePlay_Bg.jpg');
			game.load.image('london2GamePlay', gameassetspath+'london/london2GamePlay_Bg.jpg');
			game.load.image('london3GamePlay', gameassetspath+'london/london3GamePlay_Bg.jpg');


			game.load.image('london1_1', gameassetspath+'london/london1_1.jpg');
			game.load.image('london1_2', gameassetspath+'london/london1_2.jpg');
			game.load.image('london1_3', gameassetspath+'london/london1_3.jpg');
			game.load.image('london1_4', gameassetspath+'london/london1_4.jpg');
			game.load.image('london1_5', gameassetspath+'london/london1_5.jpg');
			game.load.image('london1_6', gameassetspath+'london/london1_6.jpg');
			game.load.image('london1_7', gameassetspath+'london/london1_7.jpg');
			game.load.image('london1_8', gameassetspath+'london/london1_8.jpg');
			game.load.image('london1_9', gameassetspath+'london/london1_9.jpg');
			game.load.image('london1_10', gameassetspath+'london/london1_10.jpg');
			game.load.image('london1_11', gameassetspath+'london/london1_11.jpg');
			game.load.image('london1_12', gameassetspath+'london/london1_12.jpg');

			game.load.image('london2_1', gameassetspath+'london/london2_1.jpg');
			game.load.image('london2_2', gameassetspath+'london/london2_2.jpg');
			game.load.image('london2_3', gameassetspath+'london/london2_3.jpg');
			game.load.image('london2_4', gameassetspath+'london/london2_4.jpg');
			game.load.image('london2_5', gameassetspath+'london/london2_5.jpg');
			game.load.image('london2_6', gameassetspath+'london/london2_6.jpg');
			game.load.image('london2_7', gameassetspath+'london/london2_7.jpg');
			game.load.image('london2_8', gameassetspath+'london/london2_8.jpg');
			game.load.image('london2_9', gameassetspath+'london/london2_9.jpg');
			game.load.image('london2_10', gameassetspath+'london/london2_10.jpg');
			game.load.image('london2_11', gameassetspath+'london/london2_11.jpg');
			game.load.image('london2_12', gameassetspath+'london/london2_12.jpg');

			game.load.image('london3_1', gameassetspath+'london/london3_1.jpg');
			game.load.image('london3_2', gameassetspath+'london/london3_2.jpg');
			game.load.image('london3_3', gameassetspath+'london/london3_3.jpg');
			game.load.image('london3_4', gameassetspath+'london/london3_4.jpg');
			game.load.image('london3_5', gameassetspath+'london/london3_5.jpg');
			game.load.image('london3_6', gameassetspath+'london/london3_6.jpg');
			game.load.image('london3_7', gameassetspath+'london/london3_7.jpg');
			game.load.image('london3_8', gameassetspath+'london/london3_8.jpg');
			game.load.image('london3_9', gameassetspath+'london/london3_9.jpg');
			game.load.image('london3_10', gameassetspath+'london/london3_10.jpg');
			game.load.image('london3_11', gameassetspath+'london/london3_11.jpg');
			game.load.image('london3_12', gameassetspath+'london/london3_12.jpg');


		}
		if (currentLevel==3){
			game.load.image('newYork1GamePlay', gameassetspath+'newyork/newYork1GamePlay_Bg.jpg');
			game.load.image('newYork2GamePlay', gameassetspath+'newyork/newYork2GamePlay_Bg.jpg');
			game.load.image('newYork3GamePlay', gameassetspath+'newyork/newYork3GamePlay_Bg.jpg');
		

			game.load.image('newYork1_1', gameassetspath+'newyork/newYork1_1.jpg');
			game.load.image('newYork1_2', gameassetspath+'newyork/newYork1_2.jpg');
			game.load.image('newYork1_3', gameassetspath+'newyork/newYork1_3.jpg');
			game.load.image('newYork1_4', gameassetspath+'newyork/newYork1_4.jpg');
			game.load.image('newYork1_5', gameassetspath+'newyork/newYork1_5.jpg');
			game.load.image('newYork1_6', gameassetspath+'newyork/newYork1_6.jpg');
			game.load.image('newYork1_7', gameassetspath+'newyork/newYork1_7.jpg');
			game.load.image('newYork1_8', gameassetspath+'newyork/newYork1_8.jpg');
			game.load.image('newYork1_9', gameassetspath+'newyork/newYork1_9.jpg');
			game.load.image('newYork1_10', gameassetspath+'newyork/newYork1_10.jpg');
			game.load.image('newYork1_11', gameassetspath+'newyork/newYork1_11.jpg');
			game.load.image('newYork1_12', gameassetspath+'newyork/newYork1_12.jpg');
			game.load.image('newYork1_13', gameassetspath+'newyork/newYork1_13.jpg');
			game.load.image('newYork1_14', gameassetspath+'newyork/newYork1_14.jpg');
			game.load.image('newYork1_15', gameassetspath+'newyork/newYork1_15.jpg');

			game.load.image('newYork2_1', gameassetspath+'newyork/newYork2_1.jpg');
			game.load.image('newYork2_2', gameassetspath+'newyork/newYork2_2.jpg');
			game.load.image('newYork2_3', gameassetspath+'newyork/newYork2_3.jpg');
			game.load.image('newYork2_4', gameassetspath+'newyork/newYork2_4.jpg');
			game.load.image('newYork2_5', gameassetspath+'newyork/newYork2_5.jpg');
			game.load.image('newYork2_6', gameassetspath+'newyork/newYork2_6.jpg');
			game.load.image('newYork2_7', gameassetspath+'newyork/newYork2_7.jpg');
			game.load.image('newYork2_8', gameassetspath+'newyork/newYork2_8.jpg');
			game.load.image('newYork2_9', gameassetspath+'newyork/newYork2_9.jpg');
			game.load.image('newYork2_10', gameassetspath+'newyork/newYork2_10.jpg');
			game.load.image('newYork2_11', gameassetspath+'newyork/newYork2_11.jpg');
			game.load.image('newYork2_12', gameassetspath+'newyork/newYork2_12.jpg');
			game.load.image('newYork2_13', gameassetspath+'newyork/newYork2_13.jpg');
			game.load.image('newYork2_14', gameassetspath+'newyork/newYork2_14.jpg');
			game.load.image('newYork2_15', gameassetspath+'newyork/newYork2_15.jpg');

			game.load.image('newYork3_1', gameassetspath+'newyork/newYork3_1.jpg');
			game.load.image('newYork3_2', gameassetspath+'newyork/newYork3_2.jpg');
			game.load.image('newYork3_3', gameassetspath+'newyork/newYork3_3.jpg');
			game.load.image('newYork3_4', gameassetspath+'newyork/newYork3_4.jpg');
			game.load.image('newYork3_5', gameassetspath+'newyork/newYork3_5.jpg');
			game.load.image('newYork3_6', gameassetspath+'newyork/newYork3_6.jpg');
			game.load.image('newYork3_7', gameassetspath+'newyork/newYork3_7.jpg');
			game.load.image('newYork3_8', gameassetspath+'newyork/newYork3_8.jpg');
			game.load.image('newYork3_9', gameassetspath+'newyork/newYork3_9.jpg');
			game.load.image('newYork3_10', gameassetspath+'newyork/newYork3_10.jpg');
			game.load.image('newYork3_11', gameassetspath+'newyork/newYork3_11.jpg');
			game.load.image('newYork3_12', gameassetspath+'newyork/newYork3_12.jpg');
			game.load.image('newYork3_13', gameassetspath+'newyork/newYork3_13.jpg');
			game.load.image('newYork3_14', gameassetspath+'newyork/newYork3_14.jpg');
			game.load.image('newYork3_15', gameassetspath+'newyork/newYork3_15.jpg');


		}
	},



	create: function () {
		preloading.destroy();
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
	},
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
		$.post(serverurl+"savedata",{token:""+hashstring,userid:userId,win:win, gamesid:'1',level:leveltadi, point:currentPoints},function(data){
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
	    	game.state.states.Win.showEndLevelBUtton();
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



//Spotted Game
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

var arLevel11=[
	{ x:254 , y:53 , x2:248 , y2:47 ,idx:1},
	{ x:0 , y:114 , x2:0 , y2:77 ,idx:2},
	{ x:318.5 , y:162 , x2:302 , y2:143 ,idx:3},
	{ x:21 , y:225.5 , x2:0 , y2:213 ,idx:4} ,
	{ x:267 , y:268 , x2:259 , y2:260 ,idx:5},
	{ x:79 , y:410.5 , x2:69 , y2:401 ,idx:6},
	{ x:320.5 , y:366.5 , x2:304 , y2:349 ,idx:7},
	{ x:190 , y:445 , x2:176 , y2:431 ,idx:8},
	{ x:449.5 , y:401 , x2:450 , y2:334 ,idx:9},
	{ x:234.5 , y:601.5 , x2:216 , y2:598 ,idx:10}
];


var arLevel12=[
	{ x:253 , y:-18 , x2:230 , y2:0 , idx:1},
	{ x:199 , y:40 , x2:0 , y2:23 , idx:2},
	{ x:251 , y:98 , x2:268 , y2:101 , idx:3},
	{ x:266 , y:149 , x2:270 , y2:154 , idx:4},
	{ x:438 , y:183 , x2:448 , y2:168 , idx:5},
	{ x:174.5 , y:220.5 , x2:181 , y2:229 , idx:6},
	{ x:210 , y:308 , x2:218 , y2:301 , idx:7},
	{ x:304.5 , y:352 , x2:316 , y2:366 , idx:8},
	{ x:13.5 , y:387 , x2:13 , y2:385 , idx:9},
	{ x:384.5 , y:475.5 , x2:356 , y2:448 , idx:10},
	];



var arLevel13=[
	{ x:216 , y:35 , x2:201 , y2:22 , idx:1},
	{ x:397.5 , y:37.5 , x2:370 , y2:39 , idx:2},
	{ x:356 , y:86.5 , x2:345 , y2:99 , idx:3},
	{ x:277 , y:208 , x2:260 , y2:207 , idx:4},
	{ x:81.5 , y:247.5 , x2:38 , y2:249 , idx:5},
	{ x:23 , y:359.5 , x2:28 , y2:357 , idx:6},
	{ x:457 , y:419 , x2:470 , y2:409 , idx:7},
	{ x:126.5 , y:504 , x2:119 , y2:502 , idx:8},
	{ x:368 , y:527.5 , x2:354 , y2:531 , idx:9},
	{ x:375.5 , y:605 , x2:364 , y2:607 , idx:10},
];

var arLevel21=[
	{ x:53 , y:47.5 , x2:0 , y2:0 , idx:1},
	{ x:53 , y:238 , x2:0 , y2:236 , idx:2},
	{ x:41 , y:328 , x2:38 , y2:329 , idx:3},
	{ x:297 , y:250.5 , x2:297 , y2:233 , idx:4},
	{ x:237 , y:328 , x2:246 , y2:319 , idx:5},
	{ x:465 , y:330 , x2:481 , y2:315 , idx:6},
	{ x:396.5 , y:365.5 , x2:380 , y2:377 , idx:7},
	{ x:76 , y:375 , x2:99 , y2:387 , idx:8},
	{ x:0 , y:444 , x2:0 , y2:444 , idx:9},
	{ x:300 , y:475.5 , x2:300 , y2:525 , idx:10},
	{ x:131.5 , y:457.5 , x2:128 , y2:441 , idx:11},
	{ x:328.5 , y:452.5 , x2:208 , y2:444 , idx:12},	
];
var arLevel22=[
	{ x:289 , y:173 , x2:290 , y2:163 , idx:1},
	{ x:157 , y:226.5 , x2:156 , y2:245 , idx:2},
	{ x:246.5 , y:263.5 , x2:264 , y2:271 , idx:3},
	{ x:42 , y:302 , x2:58 , y2:304 , idx:4},
	{ x:245 , y:336.5 , x2:244 , y2:359 , idx:5},
	{ x:445 , y:301.5 , x2:442 , y2:316 , idx:6},
	{ x:70 , y:440.5 , x2:55 , y2:446 , idx:7},
	{ x:172 , y:425 , x2:174 , y2:434 , idx:8},
	{ x:267 , y:437 , x2:277 , y2:444 , idx:9},
	{ x:426.5 , y:495.5 , x2:425 , y2:490 , idx:10},
	{ x:206.5 , y:498.5 , x2:211 , y2:509 , idx:11},
	{ x:78.5 , y:582.5 , x2:84 , y2:587 , idx:12},
];

var arLevel23=[
	{ x:190 , y:10 , x2:125 , y2:0 , idx:1},
	{ x:329 , y:1.5 , x2:322 , y2:0 , idx:2},
	{ x:162.5 , y:77.5 , x2:162 , y2:76 , idx:3},
	{ x:421 , y:61 , x2:393 , y2:51 , idx:4},
	{ x:264 , y:111.5 , x2:268 , y2:105 , idx:5},
	{ x:425.5 , y:174 , x2:402 , y2:134 , idx:6},
	{ x:225 , y:217.5 , x2:179 , y2:184 , idx:7},
	{ x:4 , y:311 , x2:6 , y2:295 , idx:8},
	{ x:273.5 , y:298 , x2:289 , y2:296 , idx:9},
	{ x:203 , y:472.5 , x2:216 , y2:474 , idx:10},
	{ x:438 , y:465 , x2:427 , y2:431 , idx:11},
	{ x:215 , y:596 , x2:166 , y2:587 , idx:12},
];

var arLevel31=[
	{ x:451 , y:-10 , x2:455 , y2:0 , idx:1},
	{ x:-6.5 , y:30.5 , x2:0 , y2:0 , idx:2},
	{ x:342 , y:39.5 , x2:304 , y2:57 , idx:3},
	{ x:334.5 , y:90.5 , x2:335 , y2:103 , idx:4},
	{ x:416.5 , y:105.5 , x2:432 , y2:107 , idx:5},
	{ x:111.5 , y:214 , x2:133 , y2:225 , idx:6},
	{ x:69 , y:259 , x2:42 , y2:280 , idx:7},
	{ x:193.5 , y:316 , x2:195 , y2:320 , idx:8},
	{ x:292.5 , y:280 , x2:299 , y2:296 , idx:9},
	{ x:190.5 , y:357 , x2:196 , y2:370 , idx:10},
	{ x:36 , y:410.5 , x2:49 , y2:418 , idx:11},
	{ x:135 , y:454.5 , x2:146 , y2:465 , idx:12},
	{ x:35.5 , y:576 , x2:31 , y2:593 , idx:13},
	{ x:368.5 , y:600 , x2:374 , y2:595 , idx:14},
	{ x:447 , y:480 , x2:449 , y2:439 , idx:15},
];

var arLevel32=[
	{ x:257.5 , y:16.5 , x2:254 , y2:0 , idx:1},
	{ x:426.5 , y:63 , x2:418 , y2:73 , idx:2},
	{ x:56.5 , y:62.5 , x2:26 , y2:60 , idx:3},
	{ x:335 , y:108.5 , x2:311 , y2:115 , idx:4},
	{ x:188 , y:112 , x2:161 , y2:117 , idx:5},
	{ x:28 , y:165 , x2:32 , y2:162 , idx:6},
	{ x:356.5 , y:160.5 , x2:341 , y2:166 , idx:7},
	{ x:453.5 , y:244.5 , x2:464 , y2:214 , idx:8},
	{ x:378.5 , y:289 , x2:392 , y2:216 , idx:9},
	{ x:92 , y:345 , x2:85 , y2:324 , idx:10},
	{ x:350 , y:364 , x2:371 , y2:369 , idx:11},
	{ x:455 , y:388 , x2:472 , y2:381 , idx:12},
	{ x:436 , y:496.5 , x2:440 , y2:454 , idx:13},
	{ x:368 , y:513.5 , x2:380 , y2:514 , idx:14},
	{ x:221 , y:523.5 , x2:203 , y2:501 , idx:15},
];

var arLevel33=[
	{ x:163 , y:36 , x2:65 , y2:0 , idx:1},
	{ x:386 , y:7.5 , x2:385 , y2:0 , idx:2},
	{ x:434.5 , y:102 , x2:437 , y2:109 , idx:3},
	{ x:121 , y:155 , x2:128 , y2:160 , idx:4},
	{ x:290 , y:174 , x2:284 , y2:160 , idx:5},
	{ x:438.5 , y:160.5 , x2:437 , y2:169 , idx:6},
	{ x:194 , y:231.5 , x2:193 , y2:241 , idx:7},
	{ x:132.5 , y:225 , x2:134 , y2:226 , idx:8},
	{ x:344 , y:292 , x2:356 , y2:291 , idx:9},
	{ x:467 , y:289.5 , x2:485 , y2:294 , idx:10},
	{ x:426 , y:336.5 , x2:439 , y2:334 , idx:11},
	{ x:-14 , y:372 , x2:0 , y2:375 , idx:12},
	{ x:35 , y:485.5 , x2:31 , y2:480 , idx:13},
	{ x:302.5 , y:494 , x2:313 , y2:456 , idx:14},
	{ x:402 , y:550.5 , x2:355 , y2:558 , idx:15},
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
	var arLevel;

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
	var basecity;
	var currentCheck;
	var gameOverTimer=0; 


	var kamumendapatkanbadge;
	var selesaixlevellagi;


Game.Play = function (game) { };

Game.Play.prototype = {



	create: function () {
		this.initGame();
		showCloseButton();
	},

	update: function() {
		txPoints.setText(""+currentPoints);
		this.updateTimer();
	},


	initGame: function (){
		var bgName="";

		if (lastpic[currentLevel-1]==0){
			currentLevelType=getRandomInt(1,3);
		}else{
			lastpic[currentLevel-1]++;
			if (lastpic[currentLevel-1]>3) lastpic[currentLevel-1]=1;
			currentLevelType=lastpic[currentLevel-1];
		}
		if (isdebug) currentLevelType=1;//debug
		if (currentLevel==1) {
			basecity="tokyo";
			bgName=basecity+currentLevelType+"GamePlay";
			if (currentLevelType==1) {arLevel=arLevel11;}
			if (currentLevelType==2) {arLevel=arLevel12;}
			if (currentLevelType==3) {arLevel=arLevel13;}
		}
		if (currentLevel==2) {
			basecity="london";
			bgName=basecity+currentLevelType+"GamePlay";
			if (currentLevelType==1) {arLevel=arLevel21;}
			if (currentLevelType==2) {arLevel=arLevel22;}
			if (currentLevelType==3) {arLevel=arLevel23;}
		}
		if (currentLevel==3) {
			basecity="newYork";
			bgName=basecity+currentLevelType+"GamePlay";
			if (currentLevelType==1) {arLevel=arLevel31;}
			if (currentLevelType==2) {arLevel=arLevel32;}
			if (currentLevelType==3) {arLevel=arLevel33;}
		}

		InGameScreen = game.add.sprite(0, 0, bgName);
		InGameScreen.inputEnabled = true;
		InGameScreen.events.onInputDown.add(this.downSpriteMinus);
		grpInGame=game.add.group();
		grpInGame.alpha=0;
		grpInGame.add(InGameScreen);


		lbLevel=game.add.text (22,700, "LEVEL", score_style);
		txLevel=game.add.text (162,700, currentLevel, score_style_content);
		lbTime=game.add.text (325,700, "TIME", score_style);
		txTime=game.add.text (453.3,700, "1", score_style_content);
		lbPoints=game.add.text (744,700, "POINTS", score_style);
		txPoints=game.add.text (906,700, "1", score_style_content);

		grpInGame.add(lbLevel);
		grpInGame.add(txLevel);
		grpInGame.add(lbTime);
		grpInGame.add(txTime);
		grpInGame.add(lbPoints);
		grpInGame.add(txPoints);

		checkArray=new Array();

		//	txPoints = game.add.text(200, 100, 'ss', { font: '64px BebasNeue', align: 'center' });
	//    	txPoints = game.add.bitmapText(200, 100, "stt",score_style);
		game.add.tween(grpInGame).to( { alpha: 1 }, 1000, Phaser.Easing.Linear.None, true, 0, 0,false);

		aracak=new Array();
		for (i=0;i<arLevel.length;i++){
			aracak.push(arLevel[i]);
		}
		//acak
		aracak=shuffle(aracak);

		//arjawab=new Array();
		//arjawab2=new Array();

		for (i=0;i<5;i++){
//		for (i=0;i<aracak.length;i++){ //debug
			var check=game.add.sprite(aracak[i].x2,aracak[i].y2,basecity+currentLevelType+"_"+aracak[i].idx);
			grpInGame.add(check);
			check.indeks=i;
			check.done=0;
			check.inputEnabled = true;
			check.events.onInputDown.add(downSprite, this);
			grpInGame.add(check);


			var check2=game.add.sprite(check.x+game.width*0.5,check.y,basecity+currentLevelType+"_"+aracak[i].idx);
			check2.alpha=0.02;
			grpInGame.add(check2);
			check2.indeks=i;
			check2.done=0;
			check2.inputEnabled = true;
			check2.events.onInputDown.add(downSprite, this);
		//	console.log("ths s : " + this);

			check.pasangan=check2;
			check2.pasangan=check;
			checkArray.push(check);
			checkArray.push(check2);


		//	var cc1=game.add.sprite(check.x+(check.width/2)-32,check.y+(check.height/2)-32,'checked');
		//	var cc2=game.add.sprite(check2.x+(check.width/2)-32,check2.y+(check.height/2)-32,'checked');
		//	cc1.alpha=0;
		//	cc2.alpha=0;
		//	arjawab.push(cc1);
		//	arjawab2.push(cc2);



		}
		currentCheck=0;
		currentLevelTime=levelTime[currentLevel-1];
		penaltyTime=0;
		currentTime=currentLevelTime;
		startGameTime=game.time.time;
	//	console.log("startGameTime " + startGameTime);
		this.updateTimer();

		function downSprite(obj){
			if (obj.done!=0) {
				//kurangi waktu
				this.downSpriteMinus();
				return;
			}
			obj.done=1;
			var c1=game.add.sprite(obj.x+(obj.width/2)-32,obj.y+(obj.height/2)-32,'checked');
			var c2=game.add.sprite(obj.pasangan.x+(obj.width/2)-32,obj.pasangan.y+(obj.height/2)-32,'checked');
			grpInGame.add(c1);
			grpInGame.add(c2);
			checkArray.push(c1);
			checkArray.push(c2);
			if (obj.alpha<1) obj.kill();
			if (obj.pasangan.alpha<1) obj.pasangan.kill();
		//	currentPoints++;
			currentCheck++;
			if (currentCheck>=5){
				txPoints.setText(""+currentPoints);
				//console.log("ths s : " + this);
				this.gameOverWin();
			}
		}


		function shuffle(array) {
		  var currentIndex = array.length
		    , temporaryValue
		    , randomIndex
		    ;

		  // While there remain elements to shuffle...
		  while (0 !== currentIndex) {

		    // Pick a remaining element...
		    randomIndex = Math.floor(Math.random() * currentIndex);
		    currentIndex -= 1;

		    // And swap it with the current element.
		    temporaryValue = array[currentIndex];
		    array[currentIndex] = array[randomIndex];
		    array[randomIndex] = temporaryValue;
		  }

		  return array;
		}

/*
		key3 = game.input.keyboard.addKey(Phaser.Keyboard.THREE);
	    key3.onDown.add(cheatView, this);


		function cheatView(){

			for (i=0;i<arjawab.length;i++){
				 game.add.tween(arjawab[i]).to( { alpha: 0 }, 500, Phaser.Easing.Bounce.In, true, 0, 1, true);
				 game.add.tween(arjawab2[i]).to( { alpha: 1 }, 500, Phaser.Easing.Bounce.In, true, 0, 1, true);
			}

		}

*/

	},

	downSpriteMinus: function (){
		penaltyTime+=2;

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
/*
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
*/
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
		this.addScore();
		setTimeout(this.realGameOverWin,200);
	},


	realGameOverWin: function (){
		//	console.log("realGameOverWin");
			while (checkArray.length>0){
				ch=checkArray.pop();
				grpInGame.remove(ch);
				ch.destroy();
			}

			doubletexture.renderXY(game.world, 0,0, true);
			removeCloseButton();
			transitions.to('Win');
	},

	cheatWin: function(){
		this.gameOverWin();
	}	,

	cheatLose: function(){
		this.gameOverTime();		
	},







};





//Spotted Game
//Copyright © 2014 Erwin PS 
//version 0.7
// Phaser5 , Copyright © 2014 Photon Storm  Photon Storm Ltd.
// State Transition Plugin for Phaser , Copyright © 2014 Cristian Bote
//game.js

var game = new Phaser.Game(1024,768, Phaser.AUTO, 'gameContainer');
//var game = new Phaser.Game(1024,768, Phaser.WEBGL, 'gameSpotted');
//var game = new Phaser.Game(1024,768, Phaser.CANVAS, 'gameSpotted');
//var game = new Phaser.Game(1024,768, Phaser.CANVAS, 'gameSpotted');

var transitions;
var currentLevel=1;
var levelTime=[60,45,30];
var lastpic=[0,0,0];

var score_style;
var score_style_content;
var currentPoints=0;

var basedomain = "http://preview.kanadigital.com/marlboro_inorout/public_html/";
var basedomainlocal = "http://192.168.1.99/";

var serverurl = basedomain+"service/games/";
var gameassetspath = basedomainlocal+'games_src/spotted/assets/';

var backbutton = basedomain+'games';


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





