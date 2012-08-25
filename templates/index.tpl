<form action="index.php" method="POST">
    <label for="title">Find pictures by title:</label>
    <input type="text" name="title" id="title" />
    <input type="submit" value="Search" name="submit" />
</form>


<br />

<div class="sort" >
    Sort by title:   
    <a href="?sort=title&order=ASC">[&uarr;]</a> 
    <a href="?sort=title&order=DESC">[&darr;]</a>  
</div>
<br />
<div class="sort" >
    Sort by date:  
    <a href="?sort=created&order=ASC">[&uarr;]</a> 
    <a href="?sort=created&order=DESC">[&darr;]</a>  
</div>

<div style="clear: both;"></div>
{$message}
{foreach $photos as $photo}
<a href="image_details.php?id={$photo->id}" class="pics" >
    <img src="{$photo->thumb_path()}"  />
    <div>{$photo->title|truncate:30}</div>
    <span>click</span>
</a>
{/foreach}
{if empty($photos)}
    <h4>No Results.</h4>
{/if}

<div id="pagination">

{if $pagination->total_pages() > 1}
    
    {if $pagination->has_previous_page()}
        <a href="index.php?page={$pagination->previous_page()}&sort={$order_by[1]}&order={$order_by[2]}">&laquo; Previous</a>
    {/if}
    
     
    {section name=foo loop=$pagination->total_pages()} 
        {if $smarty.section.foo.iteration == $current_page}
            <span class="selected">{$smarty.section.foo.iteration}</span>
        {else}
            <a href="index.php?page={$smarty.section.foo.iteration}&sort={$order_by[1]}&order={$order_by[2]}">{$smarty.section.foo.iteration}</a>
        {/if}
    {/section}
    
    {if $pagination->has_next_page()}
        <a href="index.php?page={$pagination->next_page()}&sort={$order_by[1]}&order={$order_by[2]}">Next &raquo;</a>
    {/if}
    
{/if}
</div>
<br />
<a href="photo_upload.php">Upload a new picture</a>
