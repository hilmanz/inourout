//var ebRand = Math.random() + '';
//ebRand = ebRand * 1000000;
//document.write('<scr' + 'ipt src="HTTPS://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ActivityID=228911&amp;rnd=' + ebRand + '"></scr' + 'ipt>');


function callMediamind(actvitiyid) {
    if (actvitiyid != "") {

        var ebRand = Math.random() + '';
        ebRand = ebRand * 1000000;
        document.write('<scr' + 'ipt src="HTTPS://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ActivityID=' + actvitiyid + '&amp;rnd=' + ebRand + '"></scr' + 'ipt>');
    }
}