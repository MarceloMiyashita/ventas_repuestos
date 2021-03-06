
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Proveedores
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>almacen/proveedores/store" method="POST">
                            
                            <div class="form-group <?php echo form_error('nombre') == true ? 'has-error':''?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required="required">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>

                             <div class="form-group <?php echo form_error('nombre') == true ? 'has-error':''?>">
                                <label for="nit">Nit:</label>
                                <input type="text" class="form-control" id="nit" name="nit" required="required" value="<?php set_value('nit')?:'';?>">
                                <?php echo form_error("nit","<span class='help-block'>","</span>");?>
                            </div>

                             <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php set_value('direccion')?:'';?>">
                            </div>
                             <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php set_value('telefono')?:'';?>">
                            </div>
                             <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php set_value('email')?:'';?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>" class="btn btn-danger btn-flat">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
