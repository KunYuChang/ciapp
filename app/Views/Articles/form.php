<?
// old function : 表單提交之後，有錯誤返回此頁時要保留原本的輸入值
// esc : 防止 XSS
// old second parameter : 用於 edit 所傳入的資料，因此如果是 new 則必須傳空的陣列進來，才不會出錯。
?>

<label for="title">Title</label>
<input type="text" id="title" name="title" value="<?= old("title", esc($article["title"])) ?>">

<label for="content">Content</label>
<textarea id="content" name="content"><?= old("content", esc($article["content"])) ?></textarea>

<button>Save</button>