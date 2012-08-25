
<a href="index.php">&laquo; Back</a><br />
<br />

<div style="margin-left: 20px;">
    <p><b>Uploaded:</b> {$photo->created|date_as_text}</p>
    <p><b>Title:</b> {$photo->title}</p>
    <img src="{$photo->image_path()}" />
    <br />
    <br />
    <b><a href="delete_picture.php?id={$photo->id}" onclick="return confirm('Are you sure?')" >Delete this picture</a></b>
    
    <hr />
    <p><h3>Decription:</h3> {$photo->description}</p>
</div>


