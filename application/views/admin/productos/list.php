
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <input type="hidden" id="modulo" value="almacen/productos">
                <div class="row">
                    <div class="col-md-12">
                      
                        <a href="<?php echo base_url();?>almacen/productos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Producto</a>
                      
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table id="tableProductos" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cod. Barras</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Calidad</th>
                                    <th>Stock Minimo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($productos)):?>
                                    <?php foreach($productos as $producto):?>
                                         <tr>
                                            <td>
                                                <img src="<?php echo base_url().'assets/barcode/'.$producto->codigo_barras.".png";?>" alt="">
                                            </td>
                                            <td><img src="<?php echo base_url().'assets/imagenes_productos/'.$producto->imagen;?>" alt="<?php echo $producto->nombre?>" style="width: 100px; " class="img-responsive"></td>
                                            <td><?php echo $producto->nombre;?></td>
                                            <td><?php echo get_record("calidades", "id=".$producto->calidad_id)->nombre; ?></td>
                                            <td><?php echo $producto->stock_minimo;?></td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <button type="button" class="btn btn-default btn-view-barcode" data-toggle="modal" data-target="#modal-default" value="<?php echo $producto->codigo_barras;?>">
                                                        <span class="fa fa-barcode"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $producto->id;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>almacen/productos/edit/<?php echo $producto->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>almacen/productos/delete/<?php echo $producto->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>

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
        <h4 class="modal-title">Informacion del Producto</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"> 
            <span class="fa fa-print"></span>
            Imprimir
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
