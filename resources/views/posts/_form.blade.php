@csrf

<label class="uppercase text-gray-700 text-xs">Título</label>
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{ $post->title }}">
<br>
<span class="text-xs text-red-600">@error('title') {{ $message }} @enderror</span>
<br>

<label class="uppercase text-gray-700 text-xs">Slug</label>
<input type="text" name="slug" class="rounded border-gray-200 w-full mb-4" value="{{ $post->slug }}">
<br>
<span class="text-xs text-red-600">@error('slug') {{ $message }} @enderror</span>
<br>

<label class="uppercase text-gray-700 text-xs">Contenido</label>
<textarea name="body" rows="5" class="rounded border-gray-200 w-full mb-4">{{ $post->body }}</textarea>
<br>
<span class="text-xs text-red-600">@error('body') {{ $message }} @enderror</span>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="divide-indigo-600">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
