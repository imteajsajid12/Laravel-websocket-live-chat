<template>
<div id="app" class="app">
   <h2>Recorder App</h2>
  <div>
    <button type="button" id="record">Record</button>
    <button type="button" id="stopRecord" disabled>Stop</button>
  </div>
  <div>
    <audio id=recordedAudio></audio>
  </div>


    <button type="button" @click="record()" id="record">Record</button>
    <button type="button" id="stopRecord" disabled>Stop</button>
  </div>

</template>
<script>
export default {
data() {
  return {
    recorder: null
  }
},
methods: {
record(data)
{
    ecord.onclick = e => {
        record.disabled = true;
        record.style.backgroundColor = "blue"
        stopRecord.disabled=false;
        audioChunks = [];
        rec.start();
}
    },
    mounted(){
  navigator.mediaDevices.getUserMedia({audio:true})
    .then(stream => {handlerFunction(stream)})

    function handlerFunction(stream) {
      rec = new MediaRecorder(stream);
      rec.ondataavailable = e => {
        audioChunks.push(e.data);
        if (rec.state == "inactive"){
          let blob = new Blob(audioChunks,{type:'audio/mp3'});
          recordedAudio.src = URL.createObjectURL(blob);
          recordedAudio.controls=true;
          recordedAudio.autoplay=true;
          sendData(blob)
          }
        }
      }

    function sendData(data) {}
      record.onclick = e => {
        record.disabled = true;
        record.style.backgroundColor = "blue"
        stopRecord.disabled=false;
        audioChunks = [];
        rec.start();
        }
      stopRecord.onclick = e => {
        record.disabled = false;
        stop.disabled=true;
        record.style.backgroundColor = "red"
        rec.stop();
        }
    }

}
}
</script>
