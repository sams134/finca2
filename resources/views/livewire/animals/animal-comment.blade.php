<div class="list-group">
  
    <form class="list-group-item form-group" wire:submit.prevent="save">
        <label for="message">Escriba un comentario</label>
        <div class="input-group mb-3"><span class="input-group-text fa fa-comment-dots fs-2 p-2" id="basic-addon1"></span>
            <input class="form-control" type="text" placeholder="Comentario" aria-label="Username" aria-describedby="basic-addon1" wire:model.defer="comment"/>
            <button class="btn btn-primary" >Guardar</button>
          </div>
        </form>
    @foreach ($animal->comments as $comment)
        <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300 list-group-item d-flex list-group-item-action" href="#!">
            <div class="notification-avatar">
            <div class="avatar avatar-xl me-3">
                <i class="{{$comment->comment_type->icon}} fs-4"></i>
            </div>
            </div>
            <div class="notification-body">
            <p class="mb-1"><strong>{{$comment->user->name}}</strong> </p>
              <p> {{$comment->comment}}</p>
            <span class="notification-time">{{$comment->created_at->diffForHumans()}}</span>

            </div>
        </a>
    @endforeach
    
   
</div>