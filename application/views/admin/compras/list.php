
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Compras
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <input type="hidden" id="modulo" value="movimientos/compras">

                <div class="row">
                    <div class="col-md-12">
                      
                        <a href="<?php echo base_url();?>movimientos/compras/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Nueva Compra</a>
                      
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <?php if (!$this->session->userdata("sucursal")): ?>
                                        <th>Sucursal</th>
                                    <?php endif ?>
                                    <th>Fecha</th>
                                    <th>Comprobante</th>
                                    <th>Serie y No. Documento</th>
                                    <th>Proveedor</th>
                                    <th>NIT</th>
                                    <th>Tipo de Pago</th>
                                    <th>Total</th>          
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($compras)):?>
                                    <?php foreach($compras as $compra):?>
                                        <tr>
                                            <td><?php echo $compra->id;?></td>
                                            <?php if (!$this->session->userdata("sucursal")): ?>
                                                <td><?php echo get_record("sucursales","id=".$compra->sucursal_id)->nombre;?></td>
                                            <?php endif ?>

                                            <td><?php echo $compra->fecha;?></td>
                                            <td><?php echo get_record("comprobantes","id=".$compra->comprobante_id)->nombre;?></td>
                                            <td><?php echo $compra->serie." - ".$compra->numero_comprobante;?></td>
                                            <?php $proveedor = get_record("proveedores","id=".$compra->proveedor_id);?>
                                            <td><?php echo $proveedor->nombre;?></td>
                                            <td><?php echo $proveedor->nit;?></td>
                                            <td><?php echo $compra->tipo_pago == 1 ? "Efectivo":"Credito";?></td>
                                            <td><?php echo $compra->total;?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $compra->id;?>"><span class="fa fa-search"></span></button>
                                                    
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
        <h4 class="modal-title">Informacion de la Compra</h4>
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
