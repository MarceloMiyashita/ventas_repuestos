
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Proveedores
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <input type="hidden" id="modulo" value="almacen/proveedores">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($permisos->insert): ?>
                            <a href="<?php echo base_url();?>almacen/proveedores/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Proveedor</a>
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
                                    <th>Nit</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>E-mail</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($proveedores)):?>
                                    <?php foreach($proveedores as $proveedor):?>
                                        <tr>
                                            <td><?php echo $proveedor->id;?></td>
                                            <td><?php echo $proveedor->nombre;?></td>
                                            <td><?php echo $proveedor->nit;?></td>
                                            <td><?php echo $proveedor->direccion;?></td>
                                            <td><?php echo $proveedor->telefono;?></td>
                                            <td><?php echo $proveedor->email;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $proveedor->id;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <?php if ($permisos->update): ?>
                                                        <a href="<?php echo base_url()?>almacen/proveedores/edit/<?php echo $proveedor->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif ?>
                                                    <?php if ($permisos->delete): ?>
                                                        <?php if ($proveedor->estado): ?>
                                                            <a href="<?php echo base_url();?>almacen/proveedores/deshabilitar/<?php echo $proveedor->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url();?>almacen/proveedores/habilitar/<?php echo $proveedor->id;?>" class="btn btn-success btn-habilitar"><span class="fa fa-check"></span></a>
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
        <h4 class="modal-title">Informacion del Proveedor</h4>
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
