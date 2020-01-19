
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Inventario de Productos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <input type="hidden" id="modulo" value="inventario/productos">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($permisos->insert): ?>
                            <a href="<?php echo base_url();?>inventario/productos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Producto(s)</a>
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
                                    <?php if (!$this->session->userdata("sucursal")): ?>
                                        <th>Sucursal</th>
                                    <?php endif ?>
                                    <th>Bodega</th>
                                    <th>Codigo Barras</th>
                                    <th>Producto</th>
                                    <th>Stock</th>
                                    <th>Localizacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($productos)):?>
                                    <?php foreach($productos as $p):?>
                                        <tr>
                                            <td><?php echo $p->id;?></td>
                                            <?php if (!$this->session->userdata("sucursal")): ?>
                                                <td><?php echo get_record("sucursales","id=".$p->sucursal_id)->nombre;?></td>
                                            <?php endif ?>
                                            <td><?php echo get_record("bodegas","id=".$p->bodega_id)->nombre;?></td>
                                            <?php $producto = get_record("productos","id=".$p->producto_id);?>
                                            <td><?php echo $producto->codigo_barras;?></td>
                                            <td><?php echo $producto->nombre;?></td>

                                            <td><?php echo $p->stock;?></td>
                                            <td><?php echo $p->localizacion;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url() ?>inventario/productos/barcode/<?php echo $p->id ?>" class="btn btn-default btn-sm" target="_blank">
                                                        <span class="fa fa-barcode"></span>
                                                    </a>
                                                    <button type="button" class="btn btn-info btn-view btn-sm" data-toggle="modal" data-target="#modal-default" value="<?php echo $p->id;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <?php if ($permisos->update): ?>
                                                        <a href="<?php echo base_url()?>inventario/productos/edit/<?php echo $p->id;?>" class="btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
                                                    <?php endif ?>
                                                    <?php if ($permisos->delete): ?>
                                                        <?php if ($p->estado): ?>
                                                            <a href="<?php echo base_url();?>inventario/productos/deshabilitar/<?php echo $p->id;?>" class="btn btn-danger btn-remove btn-sm"><span class="fa fa-remove"></span></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url();?>inventario/productos/habilitar/<?php echo $p->id;?>" class="btn btn-success btn-habilitar btn-sm"><span class="fa fa-check"></span></a>
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
        <h4 class="modal-title">Informacion de la Calidad</h4>
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
