<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/css/materialize.min.css">

<div class="container">
  <div class="row">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="#" class="brand-logo">Text to speech example</a>
        </div>
      </div>
    </nav>
  </div>
  <form class="col s8 offset-s2">
    <div class="row">
      <label>Choose voice</label>
      <select id="voices"></select>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="message" class="materialize-textarea"></textarea>
        <label>Write message</label>
      </div>
    </div>
    <a href="#" id="speak" class="waves-effect waves-light btn">Speak</a>
  </form>  
</div>

<div id="modal1" class="modal">
  <h4>Speech Synthesis not supported</h4>
  <p>Your browser does not support speech synthesis.</p>
  <p>We recommend you use Google Chrome.</p>
  <div class="action-bar">
    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Close</a>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       
        
      </div>
    </div>
  </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>
<script src="{{ url('js/modal.js') }}"></script>
<script>
    $(function(){
  if ('speechSynthesis' in window) {
    speechSynthesis.onvoiceschanged = function() {
      var $voicelist = $('#voices');

      if($voicelist.find('option').length == 0) {
        speechSynthesis.getVoices().forEach(function(voice, index) {
          var $option = $('<option>')
          .val(index)
          .html(voice.name + (voice.default ? ' (default)' :''));

          $voicelist.append($option);
        });

        $voicelist.material_select();
      }
    }

    $('#speak').click(function(){
      var text = $('#message').val();
      var msg = new SpeechSynthesisUtterance();
      var voices = window.speechSynthesis.getVoices();
      msg.voice = voices[$('#voices').val()];
      msg.text = text;

      msg.onend = function(e) {
        console.log('Finished in ' + event.elapsedTime + ' seconds.');
      };

      speechSynthesis.speak(msg);
    })
  } else {
    $('#modal1').openModal();
  }
});
</script>