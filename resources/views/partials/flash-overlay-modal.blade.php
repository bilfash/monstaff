@if (Session::has('message'))
<div class="modal fade" id="flash-overlay-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          @if (Session::has('message_title'))
            {{ Session::get('message_title') }}
          @else
            Pemberitahuan
          @endif
        </h4>
      </div>
      <div class="modal-body">
        @if (is_array($messages = Session::get('message')))
          <ul>
            @foreach($messages as $message)
              <li>{{ $message }}</li>
            @endforeach
          </ul>
        @else
          {{ Session::get('message') }}
        @endif
      </div>
    </div>
  </div>
</div>
@endif