
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Menus
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
                        <form action="<?php echo base_url();?>administrador/menus/store" method="POST">
                            <div class="form-group <?php echo form_error('nombre') == true ? 'has-error':''?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre')?:''?>" required="required">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="url">URL:</label>
                                <input type="text" class="form-control" id="url" name="url" value="<?php echo set_value('url')?:''?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="icono">Icono:</label>
                                <input type="text" class="form-control" id="icono" name="icono" value="<?php echo set_value('icono')?:''?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="parent">Menú Padre:</label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value="0">Ninguno</option>
                                    <?php foreach ($menus as $menu): ?>
                                        <?php 
                                            $selected = '';
                                            if (set_value('parent') && $menu->id == set_value('parent')){
                                                $selected = 'selected';
                                            }
                                        ?>
                                        <option value="<?php echo $menu->id;?>" <?php echo $selected?>><?php echo $menu->nombre?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="orden">Orden:</label>
                                <input type="number" class="form-control" id="orden" name="orden" value="<?php echo set_value('orden')?:''?>" required="required">
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
