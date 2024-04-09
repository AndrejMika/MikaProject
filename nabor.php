<?php include_once 'includes/header.php'; ?>

  <main >
    <div style="max-width: 80% !important; margin-top: 45px; background-color:#192a80 ;padding: 0%;" class="container">
      <form class="row g-3 needs-validation" novalidate>
        <div style="margin-top: 10%; margin-left: 5%;" class="col-md-10 ">
          <label  for="validationCustom01" class="form-label">Meno:</label>
          <div style="width: 80%;" class="div">
            <input type="text" class="form-control" id="validationCustom01" placeholder="Jožo" required>
          </div>
          <div class="invalid-feedback">
            Musite zadať meno!
          </div>
        </div>
        <div style="margin-top: 5%; margin-left: 5%;" class="col-md-10">
          <label  for="validationCustom02" class="form-label">Priezvisko:</label>
          <div style="width: 80%;" class="div">
            <input type="text" class="form-control" id="validationCustom02"  required>
          </div>
          <div class="invalid-feedback ">
            Musite zadať Priezvisko!
          </div>      
        </div>
        <div style="margin: 5%;" class="col-md-10 ">
          <label style="padding-right: 13%;" for="validationCustomUsername" class="form-label">Mail:</label>
          <div class="input-group has-validation">
            <div style="width: 80%;" class="div">
              <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="vkslavianr@gmail.com" required>
            </div>  
            <div class="invalid-feedback ">
              Zadali ste nesprávnu emailovú adresu
            </div>       
          </div>
        </div>
        <div style="margin-top: 5%; margin-bottom: 5%; font-size: 200%; color: #F3F9FB;" class="col-8 ">
          <div class="form-check ">
            <label class="form-check-label" for="invalidCheck">
              Súhlas so spracovaním údajov
            </label>
            <input style="float: none; margin-left: 20px;" class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <div class="invalid-feedback ">
              Musis súhlasit pred tým ako budeš pokračovat.
            </div>     
          </div>
        </div>      
        <div style="margin-bottom: 20% !important; margin: 5%;" class="col-10 d-flex justify-content-end">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form> 
    </div>    
  </main>

  <?php include_once 'includes/footer.php'; ?>