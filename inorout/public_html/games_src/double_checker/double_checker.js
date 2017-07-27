// Copyright © 2014 Erwin PS 
// Double Checker Version 1.2
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
		

	}
	function cheatLose(){	
		return;
		game.state.states.Play.cheatLose();
	}
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

}


//Double Checker Game
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


	game.load.image('bgTokyo',  gameassetspath+'bgTokyo.jpg');
	game.load.image('bgTargetTokyo',  gameassetspath+'bgTargetTokyo.png');
	game.load.image('1tokyoObjective',  gameassetspath+'tokyoOjective.jpg');
	game.load.image('holder1',  gameassetspath+'bgTargetTokyo.png');
	game.load.image('tas1',  gameassetspath+'tokyo/tas.png');

		game.load.image('target11',  gameassetspath+'tokyo/_target1.png');
		game.load.image('target12',  gameassetspath+'tokyo/_target2.png');
		game.load.image('target13',  gameassetspath+'tokyo/_target3.png');
		game.load.image('target14',  gameassetspath+'tokyo/_target4.png');
		game.load.image('target15',  gameassetspath+'tokyo/_target5.png');

		game.load.image('terpilih11',  gameassetspath+'tokyo/_terpilih1.png');
		game.load.image('terpilih12',  gameassetspath+'tokyo/_terpilih2.png');
		game.load.image('terpilih13',  gameassetspath+'tokyo/_terpilih3.png');
		game.load.image('terpilih14',  gameassetspath+'tokyo/_terpilih4.png');
		game.load.image('terpilih15',  gameassetspath+'tokyo/_terpilih5.png');

		game.load.image('xRay11',  gameassetspath+'tokyo/xRay1.png');
		game.load.image('xRay12',  gameassetspath+'tokyo/xRay2.png');
		game.load.image('xRay13',  gameassetspath+'tokyo/xRay3.png');
		game.load.image('xRay14',  gameassetspath+'tokyo/xRay4.png');
		game.load.image('xRay15',  gameassetspath+'tokyo/xRay5.png');

		game.load.image('item11',  gameassetspath+'tokyo/topi.png');
		game.load.image('item12',  gameassetspath+'tokyo/gesper.png');
		game.load.image('item13',  gameassetspath+'tokyo/jacketKupluk.png');
		game.load.image('item14',  gameassetspath+'tokyo/jamTangan.png');
		game.load.image('item15',  gameassetspath+'tokyo/object1.png');
		game.load.image('item16',  gameassetspath+'tokyo/object2.png');
		game.load.image('item17',  gameassetspath+'tokyo/parfume.png');
		game.load.image('item18',  gameassetspath+'tokyo/sepatuIjo.png');
		game.load.image('item19',  gameassetspath+'tokyo/sepatuKulit.png');
		game.load.image('item110',  gameassetspath+'tokyo/sweater&Kemeja.png');




	game.load.image('bgLondon',  gameassetspath+'bgLondon.jpg');
	game.load.image('bgTargetLondon',  gameassetspath+'bgTargetLondon.png');
	game.load.image('2londonObjective',  gameassetspath+'londonOjective.jpg');
	game.load.image('holder2',  gameassetspath+'bgTargetLondon.png');
	game.load.image('tas2',  gameassetspath+'london/tas.png');

		game.load.image('target21',  gameassetspath+'london/_target1.png');
		game.load.image('target22',  gameassetspath+'london/_target2.png');
		game.load.image('target23',  gameassetspath+'london/_target3.png');
		game.load.image('target24',  gameassetspath+'london/_target4.png');
		game.load.image('target25',  gameassetspath+'london/_target5.png');
		game.load.image('target26',  gameassetspath+'london/_target6.png');
		game.load.image('target27',  gameassetspath+'london/_target7.png');

		game.load.image('terpilih21',  gameassetspath+'london/_terpilih1.png');
		game.load.image('terpilih22',  gameassetspath+'london/_terpilih2.png');
		game.load.image('terpilih23',  gameassetspath+'london/_terpilih3.png');
		game.load.image('terpilih24',  gameassetspath+'london/_terpilih4.png');
		game.load.image('terpilih25',  gameassetspath+'london/_terpilih5.png');
		game.load.image('terpilih26',  gameassetspath+'london/_terpilih6.png');
		game.load.image('terpilih27',  gameassetspath+'london/_terpilih7.png');

		game.load.image('xRay21',  gameassetspath+'london/xRay1.png');
		game.load.image('xRay22',  gameassetspath+'london/xRay2.png');
		game.load.image('xRay23',  gameassetspath+'london/xRay3.png');
		game.load.image('xRay24',  gameassetspath+'london/xRay4.png');
		game.load.image('xRay25',  gameassetspath+'london/xRay5.png');
		game.load.image('xRay26',  gameassetspath+'london/xRay6.png');
		game.load.image('xRay27',  gameassetspath+'london/xRay7.png');


		game.load.image('item21',  gameassetspath+'london/celanaJeans.png');
		game.load.image('item22',  gameassetspath+'london/gesper.png');
		game.load.image('item23',  gameassetspath+'london/jeans.png');
		game.load.image('item24',  gameassetspath+'london/kacamata.png');
		game.load.image('item25',  gameassetspath+'london/kaosKaki.png');
		game.load.image('item26',  gameassetspath+'london/kemeja1.png');
		game.load.image('item27',  gameassetspath+'london/kemeja2.png');
		game.load.image('item28',  gameassetspath+'london/kemeja3.png');
		game.load.image('item29',  gameassetspath+'london/sarungTangan.png');
		game.load.image('item210',  gameassetspath+'london/sepatuKulit.png');
		game.load.image('item211',  gameassetspath+'london/shopBag.png');
		game.load.image('item212',  gameassetspath+'london/sweater.png');


	game.load.image('bgNewYork',  gameassetspath+'bgNewYork.jpg');
	game.load.image('bgTargetNewYork',  gameassetspath+'bgTargetNewYork.png');
	game.load.image('3newYorkObjective',  gameassetspath+'newYorkOjective.jpg');
	game.load.image('holder3',  gameassetspath+'bgTargetNewYork.png');
	game.load.image('tas3',  gameassetspath+'newYork/tas.png');


		game.load.image('target31',  gameassetspath+'newYork/_target1.png');
		game.load.image('target32',  gameassetspath+'newYork/_target2.png');
		game.load.image('target33',  gameassetspath+'newYork/_target3.png');
		game.load.image('target34',  gameassetspath+'newYork/_target4.png');
		game.load.image('target35',  gameassetspath+'newYork/_target5.png');
		game.load.image('target36',  gameassetspath+'newYork/_target6.png');
		game.load.image('target37',  gameassetspath+'newYork/_target7.png');
		game.load.image('target38',  gameassetspath+'newYork/_target8.png');
		game.load.image('target39',  gameassetspath+'newYork/_target9.png');
		game.load.image('target310',  gameassetspath+'newYork/_target10.png');

		game.load.image('terpilih31',  gameassetspath+'newYork/_terpilih1.png');
		game.load.image('terpilih32',  gameassetspath+'newYork/_terpilih2.png');
		game.load.image('terpilih33',  gameassetspath+'newYork/_terpilih3.png');
		game.load.image('terpilih34',  gameassetspath+'newYork/_terpilih4.png');
		game.load.image('terpilih35',  gameassetspath+'newYork/_terpilih5.png');
		game.load.image('terpilih36',  gameassetspath+'newYork/_terpilih6.png');
		game.load.image('terpilih37',  gameassetspath+'newYork/_terpilih7.png');
		game.load.image('terpilih38',  gameassetspath+'newYork/_terpilih8.png');
		game.load.image('terpilih39',  gameassetspath+'newYork/_terpilih9.png');
		game.load.image('terpilih310',  gameassetspath+'newYork/_terpilih10.png');

		game.load.image('xRay31',  gameassetspath+'newYork/xRay1.png');
		game.load.image('xRay32',  gameassetspath+'newYork/xRay2.png');
		game.load.image('xRay33',  gameassetspath+'newYork/xRay3.png');
		game.load.image('xRay34',  gameassetspath+'newYork/xRay4.png');
		game.load.image('xRay35',  gameassetspath+'newYork/xRay5.png');
		game.load.image('xRay36',  gameassetspath+'newYork/xRay6.png');
		game.load.image('xRay37',  gameassetspath+'newYork/xRay7.png');
		game.load.image('xRay38',  gameassetspath+'newYork/xRay8.png');
		game.load.image('xRay39',  gameassetspath+'newYork/xRay9.png');
		game.load.image('xRay310',  gameassetspath+'newYork/xRay10.png');


		game.load.image('item31',  gameassetspath+'newYork/dasi.png');
		game.load.image('item32',  gameassetspath+'newYork/gesper.png');
		game.load.image('item33',  gameassetspath+'newYork/headphone.png');
		game.load.image('item34',  gameassetspath+'newYork/jam.png');
		game.load.image('item35',  gameassetspath+'newYork/jeans.png');
		game.load.image('item36',  gameassetspath+'newYork/kaosdalem.png');
		game.load.image('item37',  gameassetspath+'newYork/kemeja1.png');
		game.load.image('item38',  gameassetspath+'newYork/kemeja2.png');
		game.load.image('item39',  gameassetspath+'newYork/kemeja3.png');
		game.load.image('item310',  gameassetspath+'newYork/kunci.png');
		game.load.image('item311',  gameassetspath+'newYork/object1.png');
		game.load.image('item312',  gameassetspath+'newYork/object2.png');
		game.load.image('item313',  gameassetspath+'newYork/object3.png');
		game.load.image('item314',  gameassetspath+'newYork/object4.png');
		game.load.image('item315',  gameassetspath+'newYork/object5.png');
		game.load.image('item316',  gameassetspath+'newYork/object6.png');
		game.load.image('item317',  gameassetspath+'newYork/object7.png');



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
		game.load.image('logo', gameassetspath+'logo.png');


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
		btnStart = game.add.button(364, 541, 'btnStartTheGame',this.onStartGame,2,1,0);
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
		if (currentLevel==1){
			background = game.add.sprite(0, 0, '1tokyoObjective');
			currentPoints=0;
		}
		if (currentLevel==2)
			background = game.add.sprite(0, 0, '2londonObjective');
		if (currentLevel==3)
			background = game.add.sprite(0, 0, '3newYorkObjective');

		var btnStart = game.add.button(430, 560, 'btnStart',onStartGame,2,1,0);

		showCloseButton();

		function onStartGame(){
			transitions.settings({duration: 1000,properties: {alpha: 0,scale: {x: 1.5,y: 1.5}}});
			removeCloseButton();
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
		$.post(serverurl+"savedata",{token:""+hashstring,userid:userId,win:win, gamesid:'2',level:leveltadi, point:currentPoints},function(data){
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



//Double Checker Game
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
		{ x:195 , y:28 },
		{ x:323 , y:28 },
		{ x:452 , y:28 },
		{ x:581 , y:28 },
		{ x:711 , y:28 }
	];

	var arLevel21=[
		{ x:108 , y:33 },
		{ x:225 , y:33 },
		{ x:341 , y:33 },
		{ x:455 , y:33 },
		{ x:572 , y:33 },
		{ x:690 , y:33 },
		{ x:805 , y:33 },
	];

	var arLevel31=[
		{ x:31 , y:41 },
		{ x:128 , y:41 },
		{ x:226 , y:41 },
		{ x:323 , y:41 },
		{ x:420 , y:41 },
		{ x:517 , y:41 },
		{ x:615 , y:41 },
		{ x:712 , y:41 },
		{ x:810 , y:41 },
		{ x:908 , y:41 },
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

	var currentCheck;
	var gameOverTimer=0; 


	var kamumendapatkanbadge;
	var selesaixlevellagi;
	var running=false;


Game.Play = function (game) { };

Game.Play.prototype = {



	create: function () {
		this.initGame();
		showCloseButton();
	},

	update: function() {
		if (running){
			txPoints.setText(""+currentPoints);
			this.updateTimer();
		}
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

		if (currentLevel==1) {
			bgName="bgTokyo";
			if (currentLevelType==1) arLevel=arLevel11;
			if (currentLevelType==2) arLevel=arLevel11;
			if (currentLevelType==3) arLevel=arLevel11;
		}
		if (currentLevel==2) {
			bgName="bgLondon";
			if (currentLevelType==1) arLevel=arLevel21;
			if (currentLevelType==2) arLevel=arLevel21;
			if (currentLevelType==3) arLevel=arLevel21;
		}
		if (currentLevel==3) {
			bgName="bgNewYork";
			if (currentLevelType==1) arLevel=arLevel31;
			if (currentLevelType==2) arLevel=arLevel31;
			if (currentLevelType==3) arLevel=arLevel31;
		}

		//console.log(bgName);
		InGameScreen = game.add.sprite(0, 0, bgName);
		InGameScreen.inputEnabled = true;
		InGameScreen.events.onInputDown.add(this.downSpriteMinus);
		grpInGame=game.add.group();
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


		targetArray=new Array();
		terpilihArray=new Array();
		itemArray=new Array();
		holderArray=new Array();

		//tas
		tas=game.add.sprite(510,418,'tas'+currentLevel);
		tas.x=510-(tas.width/2);
		tas.y=418-(tas.height/2);
		grpInGame.add(tas);

		for (i=0;i<arLevel.length;i++){
			var holder=game.add.sprite(arLevel[i].x,arLevel[i].y,'holder'+currentLevel);
			grpInGame.add(holder);
			holderArray.push(holder);
			var idx=i+1;

			var tg=game.add.sprite(arLevel[i].x,arLevel[i].y,'target'+currentLevel+idx);
			grpInGame.add(tg);
			targetArray.push(tg);

			var ite=game.add.sprite(0,0,'xRay'+currentLevel+idx);
			grpInGame.add(ite);
			ite.x=getRandomInt(266,266+(540-ite.width));
			ite.y=getRandomInt(311,311+(290-ite.height));
			ite.indeks=i;
			ite.inputEnabled = true;
			ite.events.onInputDown.add(downSprite, i);

		}

		ctrtest=0;

		for (it=1;it<numitem[currentLevel-1];it++){
			var ite=game.add.sprite(0,0,'item'+currentLevel+it);
			grpInGame.add(ite);
			ite.x=getRandomInt(266,266+(540-ite.width));
			ite.y=getRandomInt(311,311+(290-ite.height));
			itemArray.push(ite);
		}
		

		currentLevelTime=levelTime[currentLevel-1];
		currentCheck=0;
		penaltyTime=0;
		currentTime=currentLevelTime;
		startGameTime=game.time.time;
		//console.log("startGameTime " + startGameTime);
		this.updateTimer();



		function downSprite(obj){
			obj.kill();

			var idx=obj.indeks+1;
			var tp=game.add.sprite(arLevel[obj.indeks].x,arLevel[obj.indeks].y,'terpilih'+currentLevel+idx);
			grpInGame.add(tp);
			terpilihArray.push(tp);

			currentCheck++;
			if (currentCheck>=arLevel.length){
				txPoints.setText(""+currentPoints);
				game.state.states.Play.gameOverWin();
			}
		}


		running=true;
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
	}	,

	cheatLose: function(){
		this.gameOverTime();		
	},







};


//Double Checker Game
//Copyright © 2014 Erwin PS 
//version 0.8
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
var numitem=[4,6,8];
var score_style;
var score_style_content;
var currentPoints=0;

 // var basedomain = "http://preview.kanadigital.com/marlboro_inorout/public_html/";
 // var basedomainlocal = "http://192.168.1.99/";

 // var serverurl = basedomain+"service/games/";
 // var gameassetspath = basedomainlocal+'games_src/double_checker/assets/';

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



