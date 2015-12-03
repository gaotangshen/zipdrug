<form action="/Zipdrug/blog/post" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile" name="file">
    <p class="help-block">upload image for your blog.</p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea class="form-control" rows="3"name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>