 <!-- Main content -->
 <section class="content">
     <!-- Default box -->
     <!-- alert message -->
     <!-- alert message -->
     <?php if ($this->session->flashdata('message') != null) {  ?>
         <div class="alert alert-info alert-dismissable">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <?php echo $this->session->flashdata('message'); ?>
         </div>
     <?php } ?>
     <div class="card-body row">
         <div class="col-7">
             <!-- <form action="" method="post" enctype="multipart/form-data"> -->
             <?php echo form_open('banner/create', ['class' => 'email', 'id' => 'myform', 'enctype' => 'multipart/form-data']); ?>
             <div class="form-group">
                 <label for="title">title</label>
                 <input type="text" id="title" name="b_title" class="form-control" />
             </div>
             <div class="form-group">
                 <label for="b_img_path">Image</label>
                 <input type="file" id="b_img_path" name="b_img_path" class="form-control" />
             </div>
             <div class="form-group">
                 <label for="b_isvisible">Visible</label>
                 <input type="checkbox" id="b_isvisible" name="b_isvisible" class="form-control" />
             </div>
             <div class="form-group">
                 <input type="submit" class="btn btn-primary" value="Submit">
             </div>
             </form>
         </div>
     </div>
     </div>

     <!-- /.card -->
 </section>
 <!-- /.content -->