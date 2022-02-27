 <!-- Main content -->
 <section class="content">
     <!-- Default box -->
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
             <?php echo form_open('FeaturedInitiatives/create', ['class' => 'email', 'id' => 'myform', 'enctype' => 'multipart/form-data']); ?>
             <div class="form-group">
                 <label for="fi_title">title</label>
                 <input type="text" id="fi_title" name="fi_title" class="form-control" />
             </div>
             <div class="form-group">
                 <label for="fi_desc">Description</label>
                 <textarea id="fi_desc" name="fi_desc" class="form-control"></textarea>
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