<?php require_once "HeaderAdmin.php"; ?>

<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Thêm danh mục</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                      <input type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Mô tả danh mục</label>
                      <input type="text"  class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>
                </div>
              </div>
              <h5 class="card-title fw-semibold mb-4">Thêm sản phẩm</h5>
              <div class="card mb-0">
                <div class="card-body">
                  <form method="post" action="<?=BASE_PATH?>admin/postadmin" enctype="multipart/form-data">
                    <fieldset>
                      <div class="mb-3">
                        <label for="" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="TenSP" id="tensp" class="form-control" placeholder="Ex: BLACK NOTHING 2 FEAR SHORT">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Hình ảnh</label>
                        <input type="file" name="HinhAnhSP" id="hinhanhsp" class="form-control" placeholder="">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input type="text" name="GiaSP" id="giasp" class="form-control" placeholder="Ex: 100.000 vnd">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <input type="text" name="MotaSP" id="motasp" class="form-control" placeholder="Mô tả ....">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Form</label>
                        <input type="text" name="HangSP" id="hangsp" class="form-control" placeholder="Form .....">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Loại sản phẩm</label>

                        <select id="loaisp" name="LoaiSP" class="form-select">
                            <option value=" ">...</option>
                            <option value="Hot">Hot</option>
                            <option value="New">New</option>
                            <option value="Sale">Sale</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Danh mục</label>
                        <?php
                        $dsdm_admin = $data["danhmuc_all"];
                        $html_dsdm_admin="";
                        $i=1;
                        foreach ($dsdm_admin as $item) {
                            extract($item);
                            
                            $html_dsdm_admin.='
                            <option value="'.$item["IDDM"].'">'.$item["TenDM"].'</option>
                            ';
                            $i++;
                        }
                        ?>
                        <select id="iddm" name="MaDM" class="form-select">
                           <?= $html_dsdm_admin ?>
                        </select>
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Thêm</button>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<?php require_once "FooterAdmin.php"; ?>