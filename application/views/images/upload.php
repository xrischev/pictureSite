<div class="container">
    <?php echo form_open_multipart('uploadImage/upload'); ?>
    <div class="form-group">
        <label>Upload Image</label>
        <input type="file" name="userfile" size="20">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>