@csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}"> {{--この行のvalue属性を変更--}}
</div>
<!-- ArticleTag -->
<div class="form-group">
<article-tags-input
>
</article-tags-input>
</div>
<!-- ここまでArticleTag -->
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea> {{--この行のtextareaタグ内を編集--}}
</div>