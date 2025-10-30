<div class="col-sm-12">
  <div class="card mb-3">
    <div class="card-header">
      <div class="card-body">
        <div class="table-outer">
          <!-- Table start -->
          <div class="row gx-3">
            <div class="col-sm-12 col-12">
              <!-- Card start -->
              <div class="row gx-3">
                <div class="col-sm-12 col-12">
                  <!-- Card start -->
                  <div class="card">
                    <!-- Card start -->
                    <div class="card">
                      <div class="card-header">
                      
                      <hr>

                    <?php
if (@$_POST["Kirim"]) {
include "proses tambah.php";
}
include "koneksi.php";
?>
                  <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 " for="first-name">NISN <span class="required"></span>
											</label>
											<div class="input-group ">
												<input type="text" id="first-name" required="required" class="form-control " name="NIS">
											</div>

										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 " for="last-name">Nama <span class="required"></span>
											</label>
											<div class="input-group">
												<input type="text" id="last-name" required="required" class="form-control" name="Nama">
											</div>

										</div>
                    <label class="col-form-label col-md-3 col-sm-3 " for="last-name"> Jenkel <span class="required"></span>
                    </label>
                    <div class="from-check">
                        <input class="from-check-input" type="radio" name="Jenkel" value="bln">
                        <label class="from-check-label">Laki-laki</label>
                    </div>
                      <div class="from-check">
                        <input class="from-check-input" type="radio" name="Jenkel" value="thn">
                        <label class="from-check-label">Perempuan</label>
                    </div>

                    <div class="item form-group">
											<label for="exampleSelectJurusan" class="col-form-label col-md-3 col-sm-3 ">Jurusan</label>
											<div class="input-group">
												<select class="custom-select rounded-0" id="exampleSelectJurusan" name="Jurusan">
													<option value=".">-- Pilih Jurusan --</option>
                                                    <?php
													$SQL1 = "SELECT * FROM tbl_jurusan" or die ("data table tidak di temukan...!".
													mysqli_error($KONEKSI));

													$DATA1 = mysqli_query($KONEKSI,$SQL1);

													while ($JUR = mysqli_fetch_assoc($DATA1)) {
														echo '<option value="'.$JUR['kode_jurusan'].'">'.$JUR['nama_jur'].'</Option>';											
													}
													?>
                        </select>
                        </div>
                        </div>

                      <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 " for="last-name">Alamat <span class="required"></span>
											</label>
											<div class="input-group">
												<input type="text" id="last-name" required="required" class="form-control" name="Alamat">
											</div>
                      </div>

                      <div class="item form-group">
											<label for="exampleSelectJurusan" class="col-form-label col-md-3 col-sm-3 ">Status</label>
											<div class="input-group">
												<select class="custom-select rounded-0" id="exampleSelectJurusan" name="Status">
													<option value=".">-- Pilih Status --</option>
                                                    <?php
													$SQL2 = "SELECT * FROM tbl_status" or die ("data table tidak di temukan...!".
													mysqli_error($KONEKSI));

													$DATA2 = mysqli_query($KONEKSI,$SQL2);
													while ($STATUS = mysqli_fetch_assoc($DATA2)) {
														echo '<option value="'.$STATUS['kode_status'].'"> '.$STATUS['status'].'</option>';											
													}
                          ?> 
                            </select>
                            </div>
                          </div>

                                            <div class="ln_solid"></div>
                                            <div class="item form-group">
                                              <div class="col-md-6 col-sm-6">
                                                <br>
                                                <input type="submit" class="btn btn-primary" name="Kirim" value="Tambah">
                                                <input type="reset" class="btn btn-primary" name="Hapus" value="Reset">
                                                <a href="index.php?pages=crud_inner" class="btn btn-primary">Cencel</a>
											</div>
                      </div>

                      </form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>