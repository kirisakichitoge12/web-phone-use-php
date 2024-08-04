<?php require_once "HeaderAdmin.php"; ?>

<?php
 $product = $data["item"];
 
?>
<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Sửa sản phẩm</h5>
              <div class="card mb-0">
                <div class="card-body">
                  <form method="post" action="<?=BASE_PATH?>admin/posteditadmin/<?=$product['IDSP']?>" enctype="multipart/form-data">
                    <fieldset>
                      <div class="mb-3">
                        <label for="" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="TenSP" id="tensp" class="form-control" placeholder="Ex: BLACK NOTHING 2 FEAR SHORT"  value="<?= $product['TenSP'] ?? '' ?>">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Hình ảnh</label>
                        <input type="file" name="HinhAnhSP" id="hinhanhsp" class="form-control" placeholder=""  value="<?= $product['HinhAnhSP'] ?? '' ?>">
                        <a href="#"><img style="max-width: 150px; max-height: 150px;" src="<?=BASE_PATH?>Public/template/assets/images/<?=$product['HinhAnhSP']?>" class="card-img-top rounded-3" alt="..."></a>
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input type="text" name="GiaSP" id="giasp" class="form-control" placeholder="Ex: 100.000 vnd" value="<?= $product['GiaSP'] ?? '' ?>">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <input type="text" name="MotaSP" id="motasp" class="form-control" placeholder="Mô tả ...." value="<?= $product['MotaSP'] ?? '' ?>">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Form</label>
                        <input type="text" name="HangSP" id="hangsp" class="form-control" placeholder="Form ....." value="<?= $product['HangSP'] ?? '' ?>">
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