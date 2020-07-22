<!-- Modal -->
<div id="modal_dealer_etd" class="modal modalPart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Order to</h4>
            </div>
            <div class="modal-body">
                <table id="datatable_dealer_etd" class="table table-striped table-bordered table-hover table-condensed" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nama Dealer</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        datatable_dealer_etd = $('#datatable_dealer_etd').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: {
                                url: "<?= base_url('api/md/h3/dealer_etd') ?>",
                                dataSrc: "data",
                                data: function(d) {

                                },
                                type: "POST"
                            },
                            columns: [
                                { data: 'nama_dealer' },
                                { data: 'alamat' }, 
                                { data: 'action' }
                            ],
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<a data-toggle="modal" data-target="#modal-edit<?=$row->mod_id;?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>

                                      <a href="<?php echo site_url('Modal/hapus/'.$row->mod_id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?=$row->mod_name;?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>

                                    </div>

                                  </center>

                              </td>

                          </tr>

                          <?php endforeach; ?>

                      </tbody>

                  </table>

                  <!-- /.table-responsive -->

              </div>

              <!-- /.panel-body -->

          </div>

          <!-- /.panel -->

      </div>

      <!-- /.col-lg-12 -->

  </div>

 

 

<div id="modal-tambah" class="modal fade">

    <div class="modal-dialog">

      <form action="<?php echo site_url('Modal/add'); ?>" method="post">

      <div class="modal-content">

        <div class="modal-header bg-primary">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Tambah Data</h4>

        </div>

        <div class="modal-body">

          

          <div class="form-group">

            <label class='col-md-3'>Modal</label>

            <div class='col-md-9'><input type="text" name="mod_name" autocomplete="off" required placeholder="Masukkan Modal Name" class="form-control" ></div>

          </div>

          <br>

        </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>

          </div>

        </form>

    </div>

</div>    

</div>



 

<?php $no=0; foreach($all as $row): $no++; ?>

<div class="row">

  <div id="modal-edit<?=$row->mod_id;?>" class="modal fade">

    <div class="modal-dialog">

      <form action="<?php echo site_url('Modal/edit'); ?>" method="post">

      <div class="modal-content">

        <div class="modal-header bg-primary">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit Data</h4>

        </div>

        <div class="modal-body">

 

          <input type="hidden" readonly value="<?=$row->mod_id;?>" name="mod_id" class="form-control" >

 

          <div class="form-group">

            <label class='col-md-3'>Modal</label>

            <div class='col-md-9'><input type="text" name="mod_name" autocomplete="off" value="<?=$row->mod_name;?>" required placeholder="Masukkan Modal" class="form-control" ></div>

          </div>

          <br>

        </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>

          </div>

        </form>

    </div>

  </div>

</div>

<?php endforeach; ?>