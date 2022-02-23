function toggleMute() {

    var video=document.getElementById("myVideo")
    
    if(video.muted){
        video.muted = false;
    } else {
        video.muted = true;
    }
    
    }

    $('#audio-control').click(function(){
        if( $("#myVideo").prop('muted') ) {
              $("#myVideo").prop('muted', false);
              $(this).text('Mute');
          //ELSE VAR 
        } else {
          $("#myVideo").prop('muted', true);
          $(this).text('Unmute');
        }
    });

    var pauseBtn = document.getElementById("pause"),
    tl = new TimelineMax();

    pauseBtn.onclick = function() {
        tl.paused(!tl.paused());
        pauseBtn.innerHTML = tl.paused() ? "play" : "pause";
      }