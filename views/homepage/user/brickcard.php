<?php
if (!isset($_SESSION['user'])) {
  $_SESSION['error'] = "Vui lòng đăng nhập để tiếp tục";
  header("location: http://localhost/Project-team6/login");
}
?>

<br><br>
<h4 class="h4 fw-bold text-muted text-center">Nạp thẻ cào tự động</h4>
<br>
<div class="row">
  <div class="col-sm-6 mx-auto">
    <?php if (isset($_SESSION['error'])) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['error'];
        unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>
    <form method="post">
      <div class="form-group">
        <select name="type" class="form-select" required="">
          <option value="">Chọn loại thẻ</option>
          <option value="VIETTEL">Viettel</option>
          <option value="MOBIFONE">Mobifone</option>
          <option value="VINAPHONE">Vinaphone</option>
          <option value="GATE">Gate</option>
          <option value="ZING">Zing</option>
        </select>
      </div>
      <br>
      <div class="form-group">
        <select name="amount" class="form-select" required="">
          <option value="">Chọn mệnh giá</option>
          <option value="10000">10.000</option>
          <option value="20000">20.000</option>
          <option value="30000">30.000</option>
          <option value="50000">50.000</option>
          <option value="100000">100.000</option>
          <option value="200000">200.000</option>
          <option value="300000">300.000</option>
          <option value="500000">500.000</option>
          <option value="1000000">1.000.000</option>
        </select>
      </div>
      <br>
      <div class="form-group">
        <input type="number" class="form-control" name="seri" placeholder="Mã SERI" required="">
      </div>
      <br>
      <div class="form-group">
        <input type="number" class="form-control" name="code_card" placeholder="Mã thẻ" required="">
      </div>
      <br>
      <div class="form-group">
        <center><button type="submit" name="submit-doithe" class="btn btn-outline-primary">XÁC NHẬN</button></center>
      </div>
    </form>
    <br>
    
    <p></p>
  </div>
</div>
<hr>