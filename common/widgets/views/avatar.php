<style>
    .avatar-widget-your-avatar{
        width:200px;
    }
</style>


<image class="avatar-widget-your-avatar" src="<?=$avatar ?>" />
<form class="avatar-widget" enctype="multipart/form-data" method="post" action="">
    <input class="form-item" type="file" name="avatar" />
    <button class="form-item submit" style="display:none">OK</button>
    <image style="display:none" class="congirm" src="/images/Checkmark.png" />
</form>
