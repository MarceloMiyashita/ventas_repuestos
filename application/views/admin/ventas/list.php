
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ventas
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <input type="hidden" id="ventas" value="ventas">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($cajas_abiertas): ?>
                            <a href="<?php echo base_url();?>movimientos/ventas/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Venta</a>
                        <?php endif ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Cliente</th>
                                    <th>Tipo Comprobante</th>
                                    <th>Numero del Comprobante</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Sucursal</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ventas)): ?>
                                    <?php foreach($ventas as $venta):?>

                                            <tr>
                                                <td><?php echo $venta->id;?></td>
                                                <td><?php echo get_record("clientes","id=".$venta->cliente_id)->nombres;?></td>
                                                <td><?php echo get_record("comprobantes","id=".$venta->comprobante_id)->nombre;?></td>
                                                <td><?php echo $venta->numero_comprobante;?></td>
                                                <td><?php echo $venta->fecha;?></td>
                                                <td><?php echo $venta->total;?></td>
                                                <td>
                                                    <?php if ($venta->estado == "1") {
                                                        echo '<span class="label label-success">Procesada</span>';
                                                    } else {
                                                        echo '<span class="label label-danger">Anulado</span>';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-info-venta" value="<?php echo $venta->id;?>" data-toggle="modal" data-target="#modal-venta"><span class="fa fa-search"></span></button>
                                                    
                                                        
                                                    
                                                    
                                                        <a href="<?php echo base_url()?>movimientos/ventas/edit/<?php echo $venta->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    
                                                        <a href="<?php echo base_url();?>movimientos/ventas/delete/<?php echo $venta->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                    
                                                </td>
                                            </tr>
                                                
                                        
                                        
                                      
                                    <?php endforeach;?>
                                <?php endif ?>
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

<div class="modal fade" id="modal-venta">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-flat btn-print"><span class="fa fa-print"></span> Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->