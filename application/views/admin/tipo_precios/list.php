
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Tipo de Precios
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <input type="hidden" id="modulo" value="almacen/tipo_precios">
                <div class="row">
                    <div class="col-md-6">
                        <?php if ($permisos->insert): ?>
                            <a href="<?php echo base_url();?>almacen/tipo_precios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Tipo de Precio</a>
                        <?php endif ?>
                    </div>

                    <div class="col-md-6">
                        <?php if ($permisos->update): ?>
                            <form action="<?php echo base_url();?>almacen/tipo_precios/set_precio_venta" method="POST">
                                <div class="input-group">
                                    <span class="input-group-addon">Indique el precio para ventas</span>
                                    <select name="precio_venta" id="precio_venta" class="form-control" required="required">
                                        <option value="">Seleccione..</option>
                                        <?php foreach ($precios as $precio): ?>
                                            <?php 
                                                $selected = '';
                                                if (isset($precio_venta) && $precio_venta->id == $precio->id){
                                                    $selected = 'selected';
                                                }
                                            ?>
                                            <option value="<?php echo $precio->id;?>" <?php echo $selected;?>><?php echo $precio->nombre;?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        <?php endif ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table id="tableSimple" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($precios)):?>
                                    <?php foreach($precios as $precio):?>
                                        <tr>
                                            <td><?php echo $precio->id;?></td>
                                            <td><?php echo $precio->nombre;?></td>
                                            <td><?php echo $precio->descripcion;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $precio->id;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <?php if ($permisos->update): ?>
                                                        <a href="<?php echo base_url()?>almacen/tipo_precios/edit/<?php echo $precio->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif ?>
                                                    <?php if ($permisos->delete): ?>
                                                        <?php if ($precio->estado): ?>
                                                            <a href="<?php echo base_url();?>almacen/tipo_precios/deshabilitar/<?php echo $precio->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url();?>almacen/tipo_precios/habilitar/<?php echo $precio->id;?>" class="btn btn-success btn-habilitar"><span class="fa fa-check"></span></a>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                  
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                       </div>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del Tipo de Precio</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
