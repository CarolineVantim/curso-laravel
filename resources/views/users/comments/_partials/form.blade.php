<div class="">

    @csrf
    <label for="">Título</label>
    <input type="text" name="title" placeholder="Insira um título" value="{{ $comment->title ?? old('title')}}">
    
    <label for="">Conteúdo</label>
    <textarea name="body" id="" cols="30" rows="10">{{ $comment->body ?? old('body') }}</textarea>

    <label for="visible">
        <input type="checkbox" name="visible"
            @if (isset($comment) && $comment->visible)
                checked="checked"
            @endif
        >
        Visível?
    </label>

    <button type="submit">Salvar</button>
</div>