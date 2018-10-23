<div class="container">
    <h1>Contacts</h1>
    <?php echo form_open('contacts/create');?>
    <div class="form-group">
        <label for="formGroupExampleInput" id="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="add name">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Email</label>
        <textarea id="editor1" class="form-control" name="email" placeholder="add email"></textarea>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Message</label>
        <textarea id="editor1" class="form-control" name="message" placeholder="add message"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>